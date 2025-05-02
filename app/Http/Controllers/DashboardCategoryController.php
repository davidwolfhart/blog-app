<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Display a listing of the deleted resource.
     */
    public function deleted()
    {
        return view('backend.categories.deleted', [
            'categories' => Category::onlyTrashed()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::onlyTrashed()->where('slug', $request->slug)->first();

        if ($category) {
            // Restore the soft-deleted category
            $category->restore();

            return redirect('/dashboard/categories')->with('success', 'Category ' . $category->name . ' has been restored.');
        } else {
            // Create a new category
            $validatedData = $request->validate([
                "name" => ['required','min:5', 'max:255', 'unique:categories'],
                "slug" => ['required', 'unique:categories'],
                "category" => []
            ]);

            Category::create($validatedData);

            return redirect('/dashboard/categories')->with('success', 'Category ' . $validatedData['name'] . ' has been created.');
        }
    }

    // Restore a soft-deleted category
    public function restore($slug)
    {
        $category = Category::onlyTrashed()->where('slug', $slug)->first();
        $category->restore();

        return redirect('/dashboard/categories')->with('success', 'Category ' . $category['name'] . ' has been restored.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('backend.categories.show', [
            'category' => $category,
            'posts' => $category->posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('backend.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // if($request->name != $category->name) {
        //     $validatedData = $request->validate([
        //         "name" => ['required','min:5', 'max:255', 'unique:categories'],
        //         "slug" => ['required', 'unique:categories'],
        //     ]);
            
        //     Category::where('id', $category->id)->update($validatedData);

        //     return redirect('/dashboard/categories')->with('success', 'Category ' . $request->name . ' has been updated.');
        // }
        // else {
        //     return redirect('/dashboard/categories');
        // }

        $validatedData = $request->validate([
            "name" => ['required','min:5', 'max:255', 'unique:categories,name,' . $category->id],
            "slug" => ['required', Rule::unique('categories', 'slug')->ignore($category->id)],
            "category" => []
        ]);
        
        Category::where('id', $category->id)->update($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Category ' . $request->name . ' has been updated.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/dashboard/categories')->with('success', 'Category ' . $category->name . ' has been deleted.');
    }
}
