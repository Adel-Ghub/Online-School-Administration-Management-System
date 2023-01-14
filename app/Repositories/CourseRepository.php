<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    protected $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function all()
    {
        return $this->course->all();
    }

    public function create(array $data)
    {
        return $this->course->create($data);
    }

    public function update(array $data, $id)
    {
        $course = $this->course->find($id);
        return $course->update($data);
    }

    public function find($id)
    {
        return $this->course->find($id);
    }

    public function delete($id)
    {
        return $this->course->destroy($id);
    }
}
