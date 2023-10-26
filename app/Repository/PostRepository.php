<?php

namespace App\Repository;

use App\Models\Post;

class PostRepository
{
    public static function getListWithPagination(?int $userId = null, int $limit = 10)
    {
        $q = Post::query();

        if (!is_null($userId)) {
            $q->where('user_id', $userId);
        }

        return $q
            ->orderBy('id', 'DESC')
            ->paginate($limit);
    }
}
