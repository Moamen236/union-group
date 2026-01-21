<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ContactMessage::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            if ($request->status === 'read') {
                $query->read();
            } elseif ($request->status === 'unread') {
                $query->unread();
            }
        }

        $messages = $query->latest()->paginate(15)->withQueryString();
        $unreadCount = ContactMessage::unread()->count();

        return view('admin.pages.contact-messages.index', compact('messages', 'unreadCount'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactMessage $contactMessage)
    {
        // Mark as read when viewing
        if (!$contactMessage->is_read) {
            $contactMessage->markAsRead();
        }

        return view('admin.pages.contact-messages.show', compact('contactMessage'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()
            ->route('admin.contact-messages.index')
            ->with('success', 'Message deleted successfully.');
    }

    /**
     * Toggle message read status.
     */
    public function toggleRead(ContactMessage $contactMessage)
    {
        if ($contactMessage->is_read) {
            $contactMessage->markAsUnread();
        } else {
            $contactMessage->markAsRead();
        }

        return response()->json([
            'success' => true,
            'is_read' => $contactMessage->is_read,
            'message' => $contactMessage->is_read ? 'Marked as read.' : 'Marked as unread.',
        ]);
    }

    /**
     * Mark all messages as read.
     */
    public function markAllRead()
    {
        ContactMessage::unread()->update(['is_read' => true]);

        return redirect()
            ->route('admin.contact-messages.index')
            ->with('success', 'All messages marked as read.');
    }
}
