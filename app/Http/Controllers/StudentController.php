<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students= Student::all();
        return view('student',['students'=>$students, 'layout'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students= Student::all();
        return view('student', ['students'=>$students, 'layout'=> 'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $std = new Student();
        $std->cne = $request->input('cne');
        $std->firstName = $request->input('firstName');
        $std->secondName = $request->input('secondName');
        $std->age = $request->input('age');
        $std->category = $request->input('category');
        $std->speciality = $request->input('speciality');

        $std->save();
        return redirect('/');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $students = Student::all();

        return view('student', ['students'=>$students,'student'=>$student, 'layout'=> 'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $students = Student::all();
        return view('student', ['students'=>$students,'student'=>$student, 'layout'=> 'edit']);

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
        $std = Student::find($id);
        $std->cne = $request->input('cne');
        $std->firstName = $request->input('firstName');
        $std->secondName = $request->input('secondName');
        $std->age = $request->input('age');
        $std->category = $request->input('category');
        $std->speciality = $request->input('speciality');

        $std->save();
        return redirect('/create');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('/');
    }
}
