<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();

        return view('blog.blog', [
            'title' => 'Blog - IKBKSY',
            'blogs' => $blogs,
        ]);
    }

    /**
     * Display a listing of the resource on admin.
     */
    public function all()
    {
        $blogs = Blog::all();
        // $blogs = Blog::paginate(10);
        // $members = Member::with('department')->get();

        return view('admin.blog.index', [
            'title' => 'Data Struktur Pengurus - IKBKSY',
            'blogs' => $blogs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.blog.add-posts', [
            'title' => 'Add Blog - IKBKSY',
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publication' => 'required|date',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'description' => 'required',
            'id_category' => 'required',
        ]);

        // Membuat slug secara otomatis berdasarkan title
        $slug = Str::slug($request->title);

        // Menyimpan gambar pada storage
        $fileName = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('Blog', $fileName);

        Blog::create([
            'title' => $request->title,
            'slug' => $slug,
            'author' => $request->author,
            'publication' => $request->publication,
            'image' => $image,
            'description' => $request->description,
            'id_category' => $request->id_category,
        ]);

        return redirect()->route('allBlog')->with('success', 'Success add new blog !');
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
        $categories = Category::all();
        $blog = Blog::find($id);

        return view('admin.blog.edit-posts', [
            'title' => 'Edit Your Blog - IKBKSY',
            'categories' => $categories,
            'blog' => $blog,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publication' => 'required|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'description' => 'required',
            'id_category' => 'required',
        ]);

        $blog = Blog::find($id);

        // Cek file gambar baru apakah diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }

            // Simpan gambar baru
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $image = $request->image->storeAs('Blog', $fileName);
            $blog->image = $image;
        }

        // Slug
        $slug = Str::slug($request->title);

        // Update data
        $blog->title = $request->title;
        $blog->slug = $slug;
        $blog->author = $request->author;
        $blog->publication = $request->publication;
        $blog->description = $request->description;
        $blog->id_category = $request->id_category;

        // Siimpan perubahan
        $blog->save();

        return redirect()->route('allBlog')->with('success', 'Success update blog !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);

        // Cek blog
        if ($blog) {
            // Cek apakah ada gambar blog
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                // Hapus gambar
                Storage::disk('public')->delete($blog->image);
            }
            // Hapus data user
            $blog->delete();
        }


        return redirect()->route('allBlog')->with('success', 'Success delete blog');
    }
}
