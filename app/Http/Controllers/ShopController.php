<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Shop::orderBy('created_at', 'desc')->get();
        return view('adminside.shop.list_items', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('adminside.shop.add_items', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'item_name' => 'required|string',
            'category_id' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'max:2048',
        ]);

        $items = new Shop;
        $items->item_name = $validate_data['item_name'];
        $items->category_id = $validate_data['category_id'];
        $items->price = $validate_data['price'];
        $items->description = $request->input('description', null);
        $items->featured = $request->input('featured', 1);
        $items->visibility = $request->input('visibility',1);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $items->item_name . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('service', $imageName, 'public');
            $items->image = $imageName; 
        }

        $items->save();

        return redirect()->route('shop.index')->with('success', [
            'message' => 'Item added successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        $categories = Category::all();
        return view('adminside.shop.update_items', compact('shop', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        $validate_data = $request->validate([
            'item_name' => 'required|string',
            'category_id' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'max:2048',
            'visibility' => 'required|in:0,1',
            'featured' => 'required|in:0,1'
        ]);

        $shop->item_name = $request->item_name;
        $shop->category_id = $request->category_id;
        $shop->price = $request->price;
        $shop->description = $request->description;
        $shop->featured = $request->featured;
        $shop->visibility = $request->visibility;

        if ($request->hasFile('image')) {
            if ($shop->image && Storage::disk('public')->exists($shop->image)) {
                Storage::disk('public')->delete($shop->image);
            }
        
            $imageName = $shop->id . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('service', $imageName, 'public');
            $shop->image = $path;
            $validated['image'] = $path;
        }

        $shop->update();

        return redirect()->route('shop.index')->with('success', [
            'message' => 'Item updated successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        if ($shop->image && Storage::disk('public')->exists('service/' . $shop->image)) {
            Storage::disk('public')->delete('service/' . $shop->image);
        }

        $shop->delete();

        return redirect()->route('shop.index')->with('success', [
            'message' => 'Item deleted successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }
}
