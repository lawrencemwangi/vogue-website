<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('adminside.category.list_category');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminside.category.add_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated_date = $request->validate([
            'category' => 'required|string',
        ]);

        $categories = new Category;
        $categories->category = $validated_date['category'];
        $categories->save();

        return back()->with('success', [
            'message' =>'Categroy added Successfully',
            'duration' =>$this->alert_message_duration,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
