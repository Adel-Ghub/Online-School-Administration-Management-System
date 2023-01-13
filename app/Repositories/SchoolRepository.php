<?php

namespace App\Repositories;

use App\Models\School;

class SchoolRepository
{
    protected $school;

    public function __construct(School $school)
    {
        $this->school = $school;
    }

    public function all()
    {
        return $this->school->all();
    }

    public function create(array $data)
    {
        return $this->school->create($data);
    }

    public function update(array $data, $id)
    {
        $school = $this->school->find($id);
        return $school->update($data);
    }

    public function find($id)
    {
        return $this->school->find($id);
    }

    public function delete($id)
    {
        return $this->school->destroy($id);
    }
}
