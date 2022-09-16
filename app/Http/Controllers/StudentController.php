<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_id=Auth::user()->id;
        //return view('/test',['userId'=>$user_id]);
        $students=Student::where(['f_id'=>$user_id])->get();
        return view('students',['students'=>$students]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $userId = Auth::user()->id;
//return view('/test',['userId'=>$userId]);

  $input = $request->input();
  $input['userId']=$userId;
  // $input['user_id']=$userId;
  // $student_status=Student::create($input);
  $student_status = Student::create(['name'=>$input['name'],'f_id'=>$input['userId'],'class'=>$input['class'],'roll_no'=>$input['roll_no'],'father_name'=>$input['father']]);

  if ($student_status) {
      $request->session()->flash('success', 'Student Details successfully added');
  } else {
      $request->session()->flash('error', 'Oops something went wrong, Todo not saved');
  }
  return redirect('students');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userId=Auth::user()->id;
        $student=Student::where(['f_id'=>$userId,'id'=>$id])->first();
        if ($student){
          return view('edit',['student'=>$student]);
        }
        else{
          return redirect('students')->with('error','Student Details not Found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userId=Auth::user()->id;
        $student=Student::find($id);
        if(!$student){
          return redirect('students')->with('error'.'Todo not found');
        }
        $input=$request->input();
        $input['user_id']=$userId;
        $student_status = $student->update(['name'=>$input['name'],'class'=>$input['class'],'roll_no'=>$input['roll_no'],'father_name'=>$input['father']]);

        //$student_status=$student->update($input);
        if ($student_status){
          return redirect('students')->with('success','Student Details successfully Updated');
        }
        else{
          return redirect('students')->with('error','Oops something went wrong.Details not updated');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userId=Auth::user()->id;
        $student=Student::where(['f_id'=>$userId,'id'=>$id])->first();
        $respStatus=$respMsg='';
        if (!$student){
          $respStatus='error';
          $respMsg='Todo not found';
        }
        $studentDelStatus=$student->delete();
        if ($studentDelStatus){
          $respStatus='success';
          $respMsg='Student details deleted successfully';
        }
        else{
          $respStatus='error';
          $respMsg='Oops something went wrong.Student details is not deleted successfully';
        }
        return redirect('students')->with($respStatus,$respMsg);

    }
}
