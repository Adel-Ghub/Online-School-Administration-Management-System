<?php

namespace App\Http\Controllers;

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

        return view('schools.index', compact('schools'));
    }

    public function store(Request $request)
    {
        $school = $this->schoolRepository->create($request->all());

        return redirect()->route('schools.index')->with('success', 'School created successfully.');
    }

    public function show($id)
    {
        $school = $this->schoolRepository->find($id);

        return view('schools.show', compact('school'));
    }

    public function update(Request $request, $id)
    {
        $school = $this->schoolRepository->update($request->all(), $id);

        return redirect()->route('schools.index')->with('success', 'School updated successfully.');
    }

    public function destroy($id)
    {
        $this->schoolRepository->delete($id);

        return redirect()->route('schools.index')->with('success', 'School deleted successfully.');
    }
}
