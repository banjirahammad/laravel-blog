<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all()->sortDesc();
        return view('pages.backend.category.all_category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.category.add_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:categories,name|max:255',
            'slug'=>'required|unique:categories,slug|max:255',
            'image'=>'image|max: 512|mimes:jpg,webp,png,svg',
        ]);
        $img_name = NULL;
        if ($image = $request->file('image'))
        {
            $img_name =     "category_".time().".".$image->getClientOriginalExtension();
            $image->move('upload/categories',$img_name);
            $img_name = 'upload/categories/'.$img_name;
        }

        Category::create([
            'user_id'=>Auth::id(),
            'name'=>$request->name,
            'slug'=>$request->slug,
            'details'=>$request->details,
            'image'=>$img_name,
        ]);
        return redirect()->back()->with('success','Category created successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if(file_exists($category->image)){
            unlink($category->image);
        };
        $category->delete();
        return back();

    }
}
