<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;

class ThemeController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(2);
        $sliderBlogs = Blog::latest()->get();
        return view('theme.index', compact('blogs', 'sliderBlogs'));
    }

    public function category($id)
    {
        $categoryName = Category::findOrFail($id)->name;
        $blogs = Blog::where("category_id", $id)->paginate(2);
        return view('theme.category', compact('categoryName', 'blogs'));
    }

    public function contact()
    {
        return view('theme.contact');
    }

}
