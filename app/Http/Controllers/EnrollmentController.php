<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EnrollmentRepository;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    protected $enrollmentRepository;

    public function __construct(enrollmentRepository $enrollmentRepository)
    {
        $this->enrollmentRepository = $enrollmentRepository;
    }

    public function index()
    {
        $enrollments = $this->enrollmentRepository->all();
        return response()->json($enrollments, 200);


        // return view('enrollments.index', compact('enrollments'));
    }

     public function store(Request $request)
    {
        $enrollment = $this->enrollmentRepository->create($request->all());
        return response()->json([
            'message' => 'Successfully created new enrollment',$enrollment]);
        //return redirect()->route('enrollments.index')->with('success', 'enrollment created successfully.');
    } 
  /*   public function store(Request $request)(this is much organized than the above store)
    {
        $data = $request->all();

        // Process data and create new enrollment
        $enrollment = $this->enrollmentRepository->create($data);

        return response()->json([
            'message' => 'Successfully created new enrollment',
            'data' => $enrollment
        ], 201);
    } */

    public function show($id)
    {
        $enrollment = $this->enrollmentRepository->find($id);
return response()->json($enrollment);
       // return view('enrollment.show', compact('enrollment'));
    }

    public function update(Request $request, $id)
    {
        $enrollment = $this->enrollmentRepository->update($request->all(), $id);

        return response()->json(['enrollment updated successfully.']);
    }

    public function destroy($id)
    {
        $this->enrollmentRepository->delete($id);

        return response()->json('enrollment deleted successfully.');
    }
}
