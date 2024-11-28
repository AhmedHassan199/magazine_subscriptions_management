<?php

namespace App\Repositories;

use App\Models\Magazine;

class MagazineRepository
{
    public function create(array $data)
    {
        return Magazine::create($data);
    }

    public function find($id)
    {
        return Magazine::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $magazine = $this->find($id);
        $magazine->update($data);
        return $magazine;
    }

    public function delete($id)
    {
        $magazine = $this->find($id);
        return $magazine->delete();
    }

    public function all()
    {
        return Magazine::all();
    }
}
