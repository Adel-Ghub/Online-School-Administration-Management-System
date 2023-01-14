<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CourseRepository;
use App\Models\Course;

class CourseController extends Controller
{
    protected $courseRepository;

    public function __construct(courseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function index()
    {
        $courses = $this->courseRepository->all();
        return response()->json($courses, 200);


        // return view('courses.index', compact('courses'));
    }

     public function store(Request $request)
    {
        $course = $this->courseRepository->create($request->all());
        return response()->json([
            'message' => 'Successfully created new course',$course]);
        //return redirect()->route('courses.index')->with('success', 'course created successfully.');
    } 
  /*   public function store(Request $request)(this is much organized than the above store)
    {
        $data = $request->all();

        // Process data and create new course
        $course = $this->courseRepository->create($data);

        return response()->json([
            'message' => 'Successfully created new course',
            'data' => $course
        ], 201);
    } */

    public function show($id)
    {
        $course = $this->courseRepository->find($id);
return response()->json($course);
       // return view('course.show', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = $this->courseRepository->update($request->all(), $id);

        return response()->json(['course updated successfully.']);
    }

    public function destroy($id)
    {
        $this->courseRepository->delete($id);

        return response()->json('Course deleted successfully.');
    }
}
