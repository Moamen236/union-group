<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CertificateRequest;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Certificate::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name_en', 'like', "%{$search}%")
                  ->orWhere('name_ar', 'like', "%{$search}%")
                  ->orWhere('issuer_en', 'like', "%{$search}%")
                  ->orWhere('issuer_ar', 'like', "%{$search}%");
            });
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $certificates = $query->ordered()->paginate(10)->withQueryString();

        return view('admin.pages.certificates.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.certificates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificateRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('certificates', 'public');
        }

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('certificates/logos', 'public');
        }

        $data['status'] = $request->boolean('status', true);
        $data['order'] = $data['order'] ?? Certificate::max('order') + 1;

        Certificate::create($data);

        return redirect()
            ->route('admin.certificates.index')
            ->with('success', 'Certificate created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        return view('admin.pages.certificates.show', compact('certificate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        return view('admin.pages.certificates.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CertificateRequest $request, Certificate $certificate)
    {
        $data = $request->validated();

        if ($request->hasFile('file')) {
            // Delete old file
            if ($certificate->file) {
                Storage::disk('public')->delete($certificate->file);
            }
            $data['file'] = $request->file('file')->store('certificates', 'public');
        }

        if ($request->hasFile('logo')) {
            if ($certificate->logo) {
                Storage::disk('public')->delete($certificate->logo);
            }
            $data['logo'] = $request->file('logo')->store('certificates/logos', 'public');
        }

        $data['status'] = $request->boolean('status', false);

        $certificate->update($data);

        return redirect()
            ->route('admin.certificates.index')
            ->with('success', 'Certificate updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        if ($certificate->file) {
            Storage::disk('public')->delete($certificate->file);
        }
        if ($certificate->logo) {
            Storage::disk('public')->delete($certificate->logo);
        }

        $certificate->delete();

        return redirect()
            ->route('admin.certificates.index')
            ->with('success', 'Certificate deleted successfully.');
    }

    /**
     * Toggle certificate status.
     */
    public function toggleStatus(Certificate $certificate)
    {
        $certificate->update(['status' => !$certificate->status]);

        return response()->json([
            'success' => true,
            'status' => $certificate->status,
            'message' => 'Status updated successfully.',
        ]);
    }
}
