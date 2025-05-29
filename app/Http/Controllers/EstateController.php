<?php

namespace App\Http\Controllers;

use App\Models\Estate;

use Illuminate\Http\Request;


class EstateController extends Controller
{
    public function index(Request $request)
    {
        $query = Estate::query();
        if ($request->filled('address')) $query->where('address', 'like', '%'.$request->address.'%');
        if ($request->filled('type')) $query->where('type', $request->type);
        if ($request->filled('price')) $query->where('price', '<=', $request->price);
        $estates = $query->latest()->get();

        return view('home', compact('estates'));
    }

    public function show(Estate $estate)
    {
        return view('estates.show', compact('estate'));
    }

    public function create()
    {
        return view('estates.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'address' => 'required',
        'type' => 'required',
        'price' => 'required|numeric',
        'description' => 'nullable',
        'image' => 'nullable|image|max:2048',
    ]);

    $imagePath = $request->file('image') ? $request->file('image')->store('estates', 'public') : null;

    $estate = new Estate();
    $estate->user_id = auth()->id();
    $estate->title = $request->input('title');
    $estate->address = $request->input('address');
    $estate->type = $request->input('type');
    $estate->price = $request->input('price');
    $estate->description = $request->input('description');
    $estate->image_path = $imagePath;
    $estate->save();

    return redirect()->route('dashboard')->with('success', 'Estate created.');
}


    public function edit(Estate $estate)
    {
        $this->authorize('update', $estate);
        return view('estates.edit', compact('estate'));
    }

    public function update(Request $request, Estate $estate)
    {
        $this->authorize('update', $estate);

        $data = $request->validate([
            'title' => 'required', 'address' => 'required',
            'type' => 'required', 'price' => 'required|numeric',
            'description' => 'nullable', 'image' => 'nullable|image|max:2048'
        ]);

        if ($request->file('image')) {
            $data['image_path'] = $request->file('image')->store('estates', 'public');
        }

        $estate->update($data);
        return redirect()->route('dashboard')->with('success', 'Estate updated.');
    }

    public function destroy(Estate $estate)
    {
        $this->authorize('delete', $estate);
        $estate->delete();
        return redirect()->route('dashboard')->with('success', 'Estate deleted.');
    }
}
