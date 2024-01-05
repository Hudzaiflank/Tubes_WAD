<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;



use App\Models\StudentClass;


use DB; //keknya db juga udah bisa si
use PDF;



class StudentRegController extends Controller
{
	public function StudentRegView()
	{

		$data['classes'] = StudentClass::all();
		$data['class_id'] = StudentClass::orderBy('id', 'desc')->value('id');

		// dd($data['class_id']);
		$data['allData'] = AssignStudent::where('class_id', $data['class_id'])->get();
		return view('backend.student.student_reg.student_view', $data);
	}


	public function StudentClassYearWise(Request $request)
	{
		$data['classes'] = StudentClass::all();
		$data['class_id'] = $request->class_id;
		$data['allData'] = AssignStudent::where('class_id', $request->class_id)->get();
		return view('backend.student.student_reg.student_view', $data);
	}


	public function StudentRegAdd()
	{
		$data['classes'] = StudentClass::all();
		return view('backend.student.student_reg.student_add', $data);
	}


	public function StudentRegStore(Request $request)
	{
		DB::transaction(function () use ($request) {
			// $checkYear = StudentYear::find($request->year_id)->name;
			$student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first();
			// $final_id_no = $checkYear . $id_no;
			$user = new User();
			$code = rand(0000, 9999);
			// $user->id_no = $final_id_no;
			$user->password = bcrypt($code);
			$user->usertype = 'Student';
			$user->code = $code;
			$user->name = $request->name;
			$user->fname = $request->fname;
			$user->mname = $request->mname;
			$user->mobile = $request->mobile;
			$user->address = $request->address;
			$user->gender = $request->gender;
			$user->religion = $request->religion;
			$user->dob = date('Y-m-d', strtotime($request->dob));

			if ($request->file('image')) {
				$file = $request->file('image');
				$filename = date('YmdHi') . $file->getClientOriginalName();
				$file->move(public_path('upload/student_images'), $filename);
				$user['image'] = $filename;
			}
			$user->save();

			$assign_student = new AssignStudent();
			$assign_student->student_id = $user->id;
			$assign_student->class_id = $request->class_id;
			$assign_student->save();
		});


		$notification = array(
			'message' => 'Student Registration Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('student.registration.view')->with($notification);
	} // End Method 



	public function StudentRegEdit($student_id)
	{

		$data['classes'] = StudentClass::all();
		$data['editData'] = AssignStudent::with(['student'])->where('student_id', $student_id)->first();
		// dd($data['editData']->toArray());
		return view('backend.student.student_reg.student_edit', $data);
	}




	public function StudentRegUpdate(Request $request, $student_id)
	{
		DB::transaction(function () use ($request, $student_id) {



			$user = User::where('id', $student_id)->first();
			$user->name = $request->name;
			$user->fname = $request->fname;
			$user->mname = $request->mname;
			$user->mobile = $request->mobile;
			$user->address = $request->address;
			$user->gender = $request->gender;
			$user->religion = $request->religion;
			$user->dob = date('Y-m-d', strtotime($request->dob));

			if ($request->file('image')) {
				$file = $request->file('image');
				@unlink(public_path('upload/student_images/' . $user->image));
				$filename = date('YmdHi') . $file->getClientOriginalName();
				$file->move(public_path('upload/student_images'), $filename);
				$user['image'] = $filename;
			}
			$user->save();

			$assign_student = AssignStudent::where('id', $request->id)->where('student_id', $student_id)->first();
			$assign_student->class_id = $request->class_id;
			$assign_student->save();
		});


		$notification = array(
			'message' => 'Student Registration Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('student.registration.view')->with($notification);
	} // End Method 


	public function StudentRegDelete($student_id)
	{
		$user = AssignStudent::where('student_id', $student_id)->first();
		// dd($user);
		$user->delete();

		$notification = array(
			'message' => ' User Student Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('student.registration.view')->with($notification);
	}
}
