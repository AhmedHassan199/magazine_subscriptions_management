<?php

namespace App\Services;

use App\Repositories\CommentRepository;

class CommentService
{
    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function create(array $data)
    {
        return $this->commentRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->commentRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->commentRepository->delete($id);
    }

    public function getAll()
    {
        return $this->commentRepository->all();
    }

    public function getById($id)
    {
        return $this->commentRepository->find($id);
    }
}
