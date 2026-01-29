<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Slider::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title_en', 'like', "%{$search}%")
                  ->orWhere('title_ar', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $sliders = $query->ordered()->paginate(10)->withQueryString();

        return view('admin.pages.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Validate file
            if (!$file->isValid()) {
                return back()
                    ->withInput()
                    ->withErrors(['image' => 'Invalid image file. Please try again.']);
            }

            $imagePath = $file->store('sliders', 'public');

            // Ensure we have a valid path (not empty, not false, not '0')
            if (empty($imagePath) || $imagePath === false || $imagePath === '0') {
                return back()
                    ->withInput()
                    ->withErrors(['image' => 'Failed to upload image. Please check storage permissions.']);
            }

            $data['image'] = (string) $imagePath; // Explicitly cast to string
        }

        $data['status'] = $request->boolean('status', true);
        $data['order'] = $data['order'] ?? Slider::max('order') + 1;

        Slider::create($data);

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return view('admin.pages.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.pages.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Validate file
            if (!$file->isValid()) {
                return back()
                    ->withInput()
                    ->withErrors(['image' => 'Invalid image file. Please try again.']);
            }

            // Delete old image
            if ($slider->image) {
                Storage::disk('public')->delete($slider->image);
            }

            $imagePath = $file->store('sliders', 'public');

            // Ensure we have a valid path
            if (empty($imagePath) || $imagePath === false || $imagePath === '0') {
                return back()
                    ->withInput()
                    ->withErrors(['image' => 'Failed to upload image. Please check storage permissions.']);
            }

            $data['image'] = (string) $imagePath; // Explicitly cast to string
        }

        $data['status'] = $request->boolean('status', false);

        $slider->update($data);

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        if ($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider deleted successfully.');
    }

    /**
     * Toggle slider status.
     */
    public function toggleStatus(Slider $slider)
    {
        $slider->update(['status' => !$slider->status]);

        return response()->json([
            'success' => true,
            'status' => $slider->status,
            'message' => 'Status updated successfully.',
        ]);
    }

    /**
     * Update slider order.
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:sliders,id',
            'items.*.order' => 'required|integer|min:0',
        ]);

        foreach ($request->items as $item) {
            Slider::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Order updated successfully.',
        ]);
    }
}
