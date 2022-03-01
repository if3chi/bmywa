<?php

namespace App\Actions\User;

use App\Models\TempUser;

class CreateTempUser
{
    public function __invoke(array $data): TempUser
    {
        $data['role_id'] = $data['role'];
        return TempUser::create($data);
    }
}
