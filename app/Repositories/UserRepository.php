<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        return $this->user->all();
    }

    public function create(array $data)
    {
        return $this->user->create($data);
    }

    public function update(array $data, $id)
    {
        $user = $this->user->find($id);
        return $user->update($data);
    }

    public function find($id)
    {
        return $this->user->find($id);
    }

    public function delete($id)
    {
        return $this->user->destroy($id);
    }
}
