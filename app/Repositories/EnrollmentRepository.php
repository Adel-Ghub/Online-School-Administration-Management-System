<?php

namespace App\Repositories;

use App\Models\Enrollment;

class EnrollmentRepository
{
    protected $enrollment;

    public function __construct(Enrollment $enrollment)
    {
        $this->enrollment = $enrollment;
    }

    public function all()
    {
        return $this->enrollment->all();
    }

    public function create(array $data)
    {
        return $this->enrollment->create($data);
    }

    public function update(array $data, $id)
    {
        $enrollment = $this->enrollment->find($id);
        return $enrollment->update($data);
    }

    public function find($id)
    {
        return $this->enrollment->find($id);
    }

    public function delete($id)
    {
        return $this->enrollment->destroy($id);
    }
}
