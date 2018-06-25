<?php

namespace App\Http\Controllers;

use App\Student;
use App\Grade;
use App\ClassName;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use Yajra\Datatables\Datatables;

class StudentController extends Controller
{

    public function index()
    {
        //
        $grades = Grade::pluck('name', 'id');
        $classes = ClassName::pluck('name', 'id')->unique();
        return view('student.index', compact('grades', 'classes'));
    }

    public function data(Request $request) {
        $model = new Collection;
        if($request->ajax()) {
            $data = Student::all();
            foreach ($data as $value) {
                $model->push([
                    'id' => $value->id,
                    'name' => $value->name,
                    'father_name' => $value->father_name,
                    'address' => $value->address,
                    'phone_no' => $value->phone_no,
                    'grade' => $value->grade_id,
                    'class' => $value->class_id,
                ]);
            }
            return Datatables::of($model)
            ->addColumn('grade', function($model) {
                $value = Grade::where('id', $model['grade'])->value('name');
                return $value;
            })
            ->addColumn('class', function($model) {
                $value = ClassName::where('id', $model['class'])->value('name');
                return $value;
            })
            ->addColumn('edit', function($model) {
                return view('student.partials.edit_btn', compact('model'));
            })
            ->addColumn('delete', function($model) {
                return view('student.partials.delete_btn', compact('model'));
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
        }   
        return abort(404);     
    }

    public function create()
    {
        
        $classes = ClassName::pluck('name', 'id')->unique();
        $grades = Grade::pluck('name', 'id');
        return view('student.create', compact('grades', 'classes'));
    }

    public function store(Request $request)
    {

        Student::create([
            'name' => $request->name,
            'father_name' => $request->father_name,
            'address' => $request->address,
            'phone_no' => $request->phone_no,
            'grade_id' => $request->grade,
            'class_id' => $request->class_name,
        ]);

        return redirect('/student');
    }

    public function showGradeStudent($grade) {
        $students = \DB::table('students')->where('grade_id', $grade)->get();
        return response()->json($students);
    }

    public function showClassStudent($class) {
        $students = \DB::table('students')->where('class_id', $class)->get();
        return response()->json($students);
    }

    public function show(Student $student)
    {
        //
    }

    public function edit($id)
    {
        //
        $classes = ClassName::pluck('name', 'id');
        $grades = Grade::pluck('name', 'id');
        $student = Student::where('id', $id)->first();
        return view('student.edit', compact('id', 'grades', 'classes', 'student'));
    }

    public function update(Request $request, $id)
    {
        //
        Student::where('id', $id)->update([
            'name' => $request->name,
            'father_name' => $request->father_name,
            'address' => $request->address,
            'phone_no' => $request->phone_no,
            'grade_id' => $request->grade,
            'class_id' => $request->class_name,
        ]);

        return redirect('/student');
    }

    public function destroy($id)
    {
        //
        Student::destroy($id);
        return redirect('/student');
    }
}
