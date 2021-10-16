<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::get();
        return view("application.room", ['rooms' => $rooms]);
    }

    public function create()
    {
        $student = User::where('role', '=', 2)->get();
        $teacher = User::where('role', '=', 1)->get();
        return view("application.createroom", ['students' => $student, 'teachers' => $teacher]);
    }

    public function edit($id){
        $temp=[];
        $old= Room::where("id",'=',$id)->first();
        $listTeacherID = $old->getTeacher()->get(['id']);
        foreach ($listTeacherID as $item){
            $temp[] = $item->id;
        }
        $old->teachers = $temp;
        $temp=[];
        $listStudentID = $old->getStudent()->get(['id']);
        foreach ($listStudentID as $item){
            $temp[] = $item->id;
        }
        $old->students = $temp;
        $student = User::where('role', '=', 2)->get();
        $teacher = User::where('role', '=', 1)->get();
        return view("application.createroom", ['old'=>$old,'students' => $student, 'teachers' => $teacher]);

    }
    public function store(Request $request)
    {
        $data = [
            'staff_id'=>backpack_user()->id,
            'name'=>$request->name,
            'salary'=>$request->salary,
            'time'=>$request->time,
            'document'=>$request->document,
            'comment'=>$request->comment,
        ];
        $newRoom = Room::create($data);

        foreach ($request->teacher_id as $teacher_id) {
            $teacher = [
                'room_id' => $newRoom->id,
                'teacher_id' => $teacher_id
            ];
            DB::table('room_teacher')->insert($teacher);
        }

        foreach ($request->student_id as $student_id) {
            $student = [
                'room_id' => $newRoom->id,
                'student_id' => $student_id
            ];
            DB::table('room_student')->insert($student);
        }


        return $this->index();
    }
    public function destroy($id){
        if($room =  Room::find($id)->delete()){
            return  $this->index();
        }
        return $this->index();
    }

}
