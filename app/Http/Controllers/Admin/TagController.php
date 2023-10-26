<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Models\Tag;
use App\Repository\TagRepository;

class TagController extends Controller
{
    public function index()
    {
        return view('admin.tag.index', [
            'tags' => TagRepository::getListWithPagination()
        ]);
    }

    public function create()
    {
        return view('admin.tag.add');
    }

    public function store(TagRequest $tagRequest)
    {
        $data = $tagRequest->validated();
        Tag::firstOrCreate($data);

        return redirect()->route('admin.tags.index');
    }

    public function show(Tag $tag)
    {
        // skip this method
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', [
            'tag' => $tag
        ]);
    }

    public function update(TagRequest $tagRequest, Tag $tag)
    {
        $data = $tagRequest->validated();
        $tag->update($data);

        return redirect()->route('admin.tags.edit', $tag->id)
            ->with('alert', 'Tag updated!');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index');
    }
}
