<?php

namespace App\Services;

use App\Repositories\MagazineRepository;

class MagazineService
{
    protected $magazineRepo;

    public function __construct(MagazineRepository $magazineRepo)
    {
        $this->magazineRepo = $magazineRepo;
    }

    public function create(array $data)
    {
        return $this->magazineRepo->create($data);
    }

    public function update($id, array $data)
    {
        return $this->magazineRepo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->magazineRepo->delete($id);
    }

    public function getAll()
    {
        return $this->magazineRepo->all();
    }

    public function getById($id)
    {
        return $this->magazineRepo->find($id);
    }
}
