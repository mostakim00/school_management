<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use League\CommonMark\Extension\CommonMark\Node\Inline\Image;


class StudentController extends Controller
{
    public function index()
    {
        return view('backend.pages.students.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'student_id' => 'required',
            'dob' => 'required',
            'guardian_contact_no' => 'required'
        ]);
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->withInput()->with('error', $messages->first());
        }

        $studentInfo = new Student();
        $studentInfo->name = $request->name;
        $studentInfo->student_id = $request->student_id;
        $studentInfo->e_mail = $request->e_mail;
        $studentInfo->dob = $request->dob;
        $studentInfo->class = $request->class;
        $studentInfo->section = $request->section;
        $studentInfo->roll_no = $request->roll_no;
        $studentInfo->address = $request->address;
        $studentInfo->fathers_name = $request->fathers_name;
        $studentInfo->mothers_name = $request->mothers_name;
        $studentInfo->contact_no = $request->contact_no;
        $studentInfo->guardian_contact_no = $request->guardian_contact_no;

        $file = $request->file('image') ?? null;
        $imagePath = null; // Use a different variable to store the image path

        if ($file && $file !== 'null') {
            $file_name = date('Ymd-his') . '.' . $file->getClientOriginalName();
            $destinationPath = 'student/image/' . $file_name;
            Image::make($file->getRealPath())->resize(400, 300)->save(public_path($destinationPath));
            $imagePath = $destinationPath;
        }
        $studentInfo->image = $imagePath; // Update the property to store the image path
//        dd($studentInfo);
        $studentInfo->save();
        return redirect('student/index')->with('success', 'Student Added Successfully');
    }
}
