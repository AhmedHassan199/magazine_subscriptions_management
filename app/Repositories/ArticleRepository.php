<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    public function create(array $data)
    {
        return Article::create($data);
    }

    public function find($id)
    {
        return Article::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $article = $this->find($id);
        $article->update($data);
        return $article;
    }

    public function delete($id)
    {
        $article = $this->find($id);
        return $article->delete();
    }

    public function all()
    {
        return Article::all();
    }
}
