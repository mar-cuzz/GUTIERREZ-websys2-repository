<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('stud_id', 'like', '%' . $request->search . '%');
            });
        }

        $students = $query->get()->map(function ($student) {
            $student->qr = QrCode::size(100)->generate(json_encode([
                'id' => $student->id,
                'stud_id' => $student->stud_id,
                'name' => $student->name,
                'bdate' => $student->bdate,
                'course' => $student->course,
            ]));

            return $student;
        });

        return view('students.index', compact('students'));
    }


    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'stud_id' => 'required|unique:students',
            'name' => 'required',
            'bdate' => 'required|date',
            'course' => 'required'
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Product created.');
    }

    public function show(Student $student)
    {
        $qr = QrCode::size(200)->generate(json_encode([
            'stud_id' => $student->stud_id,
            'name' => $student->name,
            'bdate' => $student->bdate,
            'course' => $student->course,
        ]));

        return view('students.show', compact('student', 'qr'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student): RedirectResponse
    {
        $request->validate([
            'stud_id' => 'required|unique:students',
            'name' => 'required',
            'bdate' => 'required|date',
            'course' => 'required'
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student data updated.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted.');
    }
}

