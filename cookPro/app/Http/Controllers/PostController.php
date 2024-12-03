<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->input('category'); 

        $posts = Post::with(['category', 'tags'])
            ->when($selectedCategory, function ($query, $categoryId) {
                return $query->where('category_id', $categoryId); 
            })
            ->paginate(10); 

        $categories = Category::all(); 

        return view('blog.blog', compact('posts', 'categories', 'selectedCategory'));
    }

    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('blog.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image',
            'tags' => 'nullable|array',
            'new_tags' => 'nullable|string'
        ]);
    
        $post = new Post($request->only('title', 'content', 'category_id'));
        
        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('images');
        }
    
        $post->save();
    
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }
    
        if ($request->new_tags) {
            $newTags = explode(',', $request->new_tags);
            $tagIds = [];
            foreach ($newTags as $tag) {
                $tag = trim($tag);
                $tagModel = Tag::firstOrCreate(['name' => $tag]);
                $tagIds[] = $tagModel->id; 
            }
            $post->tags()->sync($tagIds);
        }
    
        return redirect()->route('blog.index');
    }

    public function show($id){
        $post = Post::with('category', 'tags', 'comments')->findOrFail($id);
        return view('blog.show', compact('post'));
    }
}
