<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin_panel.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin_panel.blog.create');
    }

    public function store(Request $request)
    {
        $request->merge(['slug' => Str::slug($request->title)]);
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|unique:blogs,slug',
            'content' => 'required|string',
            'is_published' => 'required|boolean',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'slug' => $request->slug, // Use the validated slug
            'content' => $request->content,
            'author_id' => auth()->id(),
            'is_published' => $request->is_published,
            'published_at' => $request->is_published ? now() : null,
        ];

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('blog_images', 'public');
            $data['featured_image'] = $imagePath;
        }

        $blog = Blog::create($data);

        $admins = \App\Models\User::where('user_type', 'A')->get();
        \Illuminate\Support\Facades\Notification::send($admins, new \App\Notifications\NewBlogNotification($blog));

        return redirect()->route('admin.blog.index')->with('success', 'Blog post created successfully.');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin_panel.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $request->merge(['slug' => Str::slug($request->title)]);
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => ['required', Rule::unique('blogs')->ignore($blog->id, 'id')],
            'content' => 'required|string',
            'is_published' => 'required|boolean',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'slug' => $request->slug, // Use the validated slug
            'content' => $request->content,
            'is_published' => $request->is_published,
            'published_at' => $request->is_published ? now() : null,
        ];

        if ($request->hasFile('featured_image')) {
            if ($blog->featured_image) {
                Storage::disk('public')->delete($blog->featured_image);
            }
            $imagePath = $request->file('featured_image')->store('blog_images', 'public');
            $data['featured_image'] = $imagePath;
        }

        $blog->update($data);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->featured_image) {
            Storage::disk('public')->delete($blog->featured_image);
        }
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog post deleted successfully.');
    }
}