<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;

class CategoryController extends Controller
{
    // Show category page
    public function category()
    {
        $categories =Category::all();
        return view('category.category',compact('categories'));
    }
    // Add a new category
    public function category_add(CategoryRequest $request)
    {
        Category::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Category added successfully!');
    }

   


}
