<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('index', compact('students'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'section' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image'), $imageName);
            $validated['image'] = $imageName;
        }

        Student::create($validated);

        return redirect()->route('students.index');
    }

    public function show(Student $student)
    {
        return view('show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('edit', compact('student'));
    }

    public function update(Request $request, Student $student)
{
    $validated = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required',
        'section' => 'required|max:255',
'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5120',    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('image'), $imageName);

        $validated['image'] = $imageName;
    }

    $student->update($validated);

    return redirect()->route('students.index');
}

    public function destroy(Student $student)
{
    $student->delete();

    return redirect()->route('students.index');
}
}