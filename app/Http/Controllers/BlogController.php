<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller implements HasMiddleware
{

    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['create', 'myBlogs']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('theme.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        try {
            $data = $request->validated();

            // image uploading
            if($request->hasFile('image')){
                // save new name to database record
                $data['image'] = $this->handleImageUpload($request->image);
                $data['user_id'] = auth()->user()->id;
            }

            Blog::create($data);

            return back()->with('status-add-blog', 'Blog created successfully');
        } catch (\Exception $e) {
            Log::error('Blog creation failed', ['error' => $e->getMessage()]);
            return back()->with('error-add-blog', 'There was an issue creating the blog.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view("theme.single-blog", compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        Gate::authorize('update', $blog);
        $categories = Category::get();
        return view('theme.blogs.edit', compact('blog', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        // Authorize the action
        Gate::authorize('update', $blog);

        $data = $request->validated();

        if($request->hasFile('image'))
        {
            // delete old image
            Storage::delete("public/blogs/$blog->image");
            // save new name to database record
            $data['image'] = $this->handleImageUpload($request->image);
        }


        // create new blog record
        $blog->update($data);

        return back()->with('status-edit-blog', 'Your blog has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        Gate::authorize('delete', $blog);
        Storage::delete("public/blogs/$blog->image");
        $blog->delete();
        return back()->with('status-delete-blog', 'Your blog has been deleted!');

    }

    public function myBlogs()
    {
        $blogs = Blog::where("user_id", auth()->user()->id)->get();
        return view('theme.blogs.my-blogs', compact('blogs'));
    }

    private function handleImageUpload($image)
    {
        // change it's current name
        $imageNewName = time() . '-' . $image->getClientOriginalName();
        // move image to storage
        $image->storeAs('blogs', $imageNewName, 'public');
        return $imageNewName;
    }
}
