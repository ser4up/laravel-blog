<?php

namespace App\Repository;

use App\Models\User;

class UserRepository
{
    public static function getListWithPagination(int $limit = 10)
    {
        return User::query()
            ->orderBy('id', 'DESC')
            ->paginate($limit);
    }
}
