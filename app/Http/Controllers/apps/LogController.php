<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        if (backpack_user()->role == 0) {
            $logs = Log::get();
            return view("application.log", ['logs' => $logs]);
        } else {
            $logs = Log::where('user_id', '=', backpack_user()->id)->get();
            return view("application.log", ['logs' => $logs]);
        }

    }

    public function create()
    {
        $tmp = [];
        $partner = User::where("role","=",3)->get();
        $rooms = Room::get();
        foreach ($rooms as $key => $room) {
            $teacher_ids = $room->getTeacher()->get();
            foreach ($teacher_ids as $teacher_id) {
                if ($teacher_id->id == backpack_user()->id) {
                    $tmp[] = $room;
                }
            }
        }
//        return $partner;
        return view("application.checkin",['rooms'=>$tmp,'partners'=>$partner]);
    }

    public function store(Request $request)
    {
        $room = Room::where('id', '=', $request->room_id)->first();
        $time = explode(" ", $request->duration)[0] / 60;
        $data = [
            'user_id' => backpack_user()->id,
            'partner_id' =>$request->partner_id,
            'room_id' => $request->room_id,
            'day_log' => $request->day_log,
            'time_log' => $request->time,
            'lesson_name' => $request->lesson_name,
            'duration' => $request->duration,
            'content' => $request->contents,
            'rate_per_hour' => $request->rate_per_hour,
            'rate_for_class' => $request->rate_for_class,
            'comment' => $request->comment,
        ];
        Log::create($data);
//        return $this->index();
        return $request;
    }
}
