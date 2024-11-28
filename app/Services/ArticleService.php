<?php

namespace App\Services;

use App\Repositories\ArticleRepository;

class ArticleService
{
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function create(array $data)
    {
        return $this->articleRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->articleRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->articleRepository->delete($id);
    }

    public function getAll()
    {
        return $this->articleRepository->all();
    }

    public function getById($id)
    {
        return $this->articleRepository->find($id);
    }
}
