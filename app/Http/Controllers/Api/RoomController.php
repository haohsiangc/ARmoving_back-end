<?php

namespace App\Http\Controllers\Api;
use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function create(Request $request){
        $room = new Room;
        $room->users_id = Auth::user()->id;
        $room->rName = $request->rName;
        $room->save();

        return response()->json([
            'success' => true,
            'message' => 'room added',
            'room' => $room
        ]);
    }
    //ok

    public function update(Request $request){
        $room = Room::find($request->id);
        //check if user is editing own room
        if($room->users_id != Auth::user()->id){
            return response()->json([
                'success' =>false,
                'message' => 'unauthorized access'
            ]);
        }
        $room->rName = $request->rName;
        $room->update();
        return response()->json([
            'success' => true,
            'message' => 'edited'
        ]);
    }
    //ok
    public function delete(Request $request){
        $room = Room::find($request->id);
        //check if user is editing own room
        if($room->users_id != Auth::user()->id){
            return response()->json([
                'success' =>false,
                'message' => 'unauthorized access'
            ]);
        }
        $room->delete();
        return response()->json([
            'success' => true,
            'message' => 'deleted'
        ]);
    }
    //ok
}
