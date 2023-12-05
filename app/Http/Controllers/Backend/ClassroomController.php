<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassroomController extends Controller
{
    public function index()
    {
        $classroom = Classroom::all();
        return view('backend.pages.classroom.index', compact('classroom'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_name' => 'required',
            'section' => 'required',
            'class_teacher' => 'required',
            'number_of_student' => 'required', 'numeric',
        ]);
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->withInput()->with('error', $messages->first());
        }
        $classroom = new Classroom();
        $classroom->class_name = $request->class_name;
        $classroom->section = $request->section;
        $classroom->class_teacher = $request->class_teacher;
        $classroom->number_of_student = $request->number_of_student;
        $classroom->save();
        return redirect('admin/index')->with('success', 'Classroom Added Successfully');
    }

}
