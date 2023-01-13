<?php

namespace App\Http\Controllers;
use App\Repositories\SchoolRepository;
use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    protected $schoolRepository;

    public function __construct(SchoolRepository $schoolRepository)
    {
        $this->schoolRepository = $schoolRepository;
    }

    public function index()
    {
        $schools = $this->schoolRepository->all();
        return response()->json($schools, 200);


        // return view('schools.index', compact('schools'));
    }

     public function store(Request $request)
    {
        $school = $this->schoolRepository->create($request->all());
        return response()->json([
            'message' => 'Successfully created new school',$school]);
        //return redirect()->route('schools.index')->with('success', 'School created successfully.');
    } 
  /*   public function store(Request $request)(this is much organized than the above store)
    {
        $data = $request->all();

        // Process data and create new school
        $school = $this->schoolRepository->create($data);

        return response()->json([
            'message' => 'Successfully created new school',
            'data' => $school
        ], 201);
    } */

    public function show($id)
    {
        $school = $this->schoolRepository->find($id);
return response()->json($school);
       // return view('schools.show', compact('school'));
    }

    public function update(Request $request, $id)
    {
        $school = $this->schoolRepository->update($request->all(), $id);

        return response()->json(['School updated successfully.']);
    }

    public function destroy($id)
    {
        $this->schoolRepository->delete($id);

        return response()->json('School deleted successfully.');
    }
}
