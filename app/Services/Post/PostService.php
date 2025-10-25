<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PostService
{
    // getAll method with pagination
    // public function getAll(): LengthAwarePaginator
    // {
    //     $query = Post::latest();
    //     return $query->paginate(Post::PAGINATE);
    // }

    // getAll method with pagination and filters
    public function getAll(array $filters = []): LengthAwarePaginator
    {
        $query = Post::latest();

        if(!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        return $query->paginate(Post::PAGINATE);
    }

    public function getById(int $id): Post
    {
        return Post::findOrFail($id);
    }

    public function createPost(array $data): Post
    {
        return Post::create($data);
    }

    public function updatePost(int $id, array $data): bool
    {
        return Post::where('id', $id)->update($data);
    }

    public function deletePost(int $id): bool
    {
        return Post::where('id', $id)->delete();
    }
}
