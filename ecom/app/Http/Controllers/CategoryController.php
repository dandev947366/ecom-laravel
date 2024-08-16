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
        $cats = Category::orderBy('id','DESC')->paginate(2);
        return view('admin.category.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:categories',
        'status' => 'required|in:active,inactive',
    ]);

    // Convert status from string to integer
    $status = $request->status === 'active' ? 1 : 0;

    Category::create([
        'name' => $request->name,
        'status' => $status,
    ]);

    return redirect()->route('category.index');
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
    return view('admin.category.edit', compact('category'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
{
    // Validate the request
    $request->validate([
        'name' => 'required|unique:categories,name,' . $category->id, // Correctly validate unique except current ID
        'status' => 'required|in:active,inactive' // Ensure the status is either 'active' or 'inactive'
    ]);

    // Prepare the data for updating
    $data = $request->only(['name', 'status']);
    $data['status'] = $data['status'] === 'active' ? 'active' : 'inactive'; // Ensure status is set correctly

    // Update the category
    $category->update($data);

    // Redirect to the category index
    return redirect()->route('category.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }

}
