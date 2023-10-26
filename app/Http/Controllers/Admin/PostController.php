<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostStoreRequest;
use App\Http\Requests\Admin\PostUpdateRequest;
use App\Models\Post;
use App\Repository\PostRepository;
use App\Repository\TagRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $currentUserId = $request->user()->id;

        return view('admin.post.index', [
            'posts' => PostRepository::getListWithPagination($currentUserId)
        ]);
    }

    public function create()
    {
        $tags = TagRepository::listForSelect();

        return view('admin.post.add', [
            'tags' => $tags,
        ]);
    }

    public function store(PostStoreRequest $postRequest)
    {
        $data = $postRequest->validated();
        $data['image'] = $postRequest->image->store('images');
        $data['user_id'] = auth()->user()->id;

        // Here we separate tag ids from post data
        $tagIds = $data['tags'];
        unset($data['tags']);

        DB::transaction(function () use ($data, $tagIds) {
            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
        });

        return redirect()->route('admin.posts.index');
    }

    public function show(Post $post)
    {
        // skip this method
    }

    public function edit(Post $post)
    {
        Gate::authorize('owner', $post);

        $tags = TagRepository::listForSelect();

        return view('admin.post.edit', [
            'post' => $post,
            'tags' => $tags,
        ]);
    }

    public function update(PostUpdateRequest $postRequest, Post $post)
    {
        Gate::authorize('owner', $post);

        $data = array_filter($postRequest->validated());
        if (isset($data['image'])) {
            if (!empty($post->image) && Storage::exists($post->image)) {
                Storage::delete($post->image);
            }

            $data['image'] = $postRequest->image->store('images');
        }

        // Here we separate tag ids from post data
        $tagIds = $data['tags'];
        unset($data['tags']);

        DB::transaction(function () use ($post, $data, $tagIds) {
            $post->update($data);
            $post->tags()->sync($tagIds);
        });

        return redirect()->route('admin.posts.edit', $post->id)
            ->with('alert', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        Gate::authorize('owner', $post);

        if (!empty($post->image) && Storage::exists($post->image)) {
            Storage::delete($post->image);
        }

        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
