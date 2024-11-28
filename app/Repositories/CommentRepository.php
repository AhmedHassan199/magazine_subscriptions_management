<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    public function create(array $data)
    {
        return Comment::create($data);
    }

    public function find($id)
    {
        return Comment::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $comment = $this->find($id);
        $comment->update($data);
        return $comment;
    }

    public function delete($id)
    {
        $comment = $this->find($id);
        return $comment->delete();
    }

    public function all()
    {
        return Comment::all();
    }
}
