<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use App\Services\Post\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(protected PostService $service) {}

    public function index(Request $request)
    {
        $posts = $this->service->getAll($request->only('status'));
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.form', ['post' => new Post()]);
    }

    public function store(CreatePostRequest $request)
    {
        $this->service->createPost($request->validated());
        return redirect()->route('posts.index')->with('message', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(int $id)
    {
        $post = $this->service->getById($id);
        return view('posts.form', compact('post'));
    }

    public function update(UpdatePostRequest $request, int $id)
    {
        $this->service->updatePost($id, $request->validated());
        return redirect()->route('posts.index')->with('message', 'Post updated successfully.');
    }

    public function destroy(int $id)
    {
        $this->service->deletePost($id);
        return redirect()->route('posts.index')->with('message', 'Post deleted successfully.');
    }
}
