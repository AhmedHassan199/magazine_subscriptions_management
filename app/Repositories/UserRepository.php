<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    // Create User
    public function create(array $data)
    {
        return User::create($data);
    }

    // Read User by ID
    public function find($id)
    {
        return User::findOrFail($id);
    }

    // Update User
    public function update($id, array $data)
    {
        $user = $this->find($id);
        $user->update($data);
        return $user;
    }

    // Delete User
    public function delete($id)
    {
        $user = $this->find($id);
        return $user->delete();
    }

    // Get all Users
    public function all()
    {
        return User::all();
    }
}
