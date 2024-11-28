<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function create(array $data)
    {
        return $this->userRepo->create($data);
    }

    public function update($id, array $data)
    {
        return $this->userRepo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->userRepo->delete($id);
    }

    public function getAll()
    {
        return $this->userRepo->all();
    }

    public function getById($id)
    {
        return $this->userRepo->find($id);
    }
}
