<?php

namespace App\Repository;

use App\Models\Tag;

class TagRepository
{
    public static function getListWithPagination(int $limit = 10)
    {
        return Tag::query()
            ->orderBy('id', 'DESC')
            ->paginate($limit);
    }

    public static function listForSelect()
    {
        return Tag::query()
            ->orderBy('created_at', 'ASC')
            ->get();
    }

    public static function getById(int $id): Tag
    {
        return Tag::query()->findOrFail($id);
    }
}
