<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::get();
        return view('application.students', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $students = User::where('role', '=', 2)->get();
        return view('application.create-student', ['students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Request|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = [
            'user_id' => $request->user_id,
            'state' => $request->state,
            'pro' => $request->pro,
            'package_name' => $request->package_name,
            'lesson' => $request->lesson,
            'daily_time' => $request->daily_time,
            'total_time' => $request->total_time,
            'fee' => $request->fee,
            'paid' => $request->paid,
            'paid_day' => $request->paid_day,
            'exp_day' => $request->exp_day,
            'comment' => $request->comment,
        ];
        Student::create($student);
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|int
     */
    public function show($id)
    {
        $student = Student::where('id','=',$id)->first();
        return view("application.show-student",['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $old = Student::where('id','=',$id)->first();
        $students = User::where('role', '=', 2)->get();
        return view('application.create-student', ['students' => $students,'old'=>$old]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = [
            'state' => $request->state,
            'pro' => $request->pro,
            'package_name' => $request->package_name,
            'lesson' => $request->lesson,
            'daily_time' => $request->daily_time,
            'total_time' => $request->total_time,
            'fee' => $request->fee,
            'paid' => $request->paid,
            'paid_day' => $request->paid_day,
            'exp_day' => $request->exp_day,
            'comment' => $request->comment,
        ];
        Student::where('id','=',$id)->update($student);
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return int
     */
    public function destroy($id)
    {
        Student::where('id','=',$id)->delete();
        return $this->index();
    }
    public function createAccount(){
        return view("application.studentaccount");
    }
    public function storeAccount(Request $request){
        $check = User::where("email",'=',$request->email)->first();
        if(isset($check->email)){
            return $this->create();
        }
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>2,
            'avatar'=>$request->avatar,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->email)
        ];
        User::create($data);
        return $this->create();
    }
}
