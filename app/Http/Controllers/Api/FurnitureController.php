<?php

namespace App\Http\Controllers\Api;

use App\Furniture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FurnitureController extends Controller
{
    public function create(Request $request){
        $fur = new Furniture;
        $fur->users_id = Auth::user()->id;
        //抓room的id
        $fur->rooms_id = $request->id;
        //用房間名找rooms_id,再把rooms_id存起來
        $fur->rooms_rName = $request->rooms_rName;
        $fur->fName = $request->fName;
        $fur->fvol = $request->fvol;
        $fur->famount = $request->famount;
        $fur->fprice = $request->fprice;

        //photo
        if($request->pic_loc != ''){
            $pic_loc = $fur->users_id->name.$request->id->rName.$fur->fName.'jpg';
            file_put_contents('storage/furniture/'.$pic_loc,base64_decode($request->pic_loc));
            $fur->pic_loc = $pic_loc;
        }

        $fur->save();
        $fur->user;
        return response()->json([
            'success' => true,
            'message' => 'fur added',
            'furniture' => $fur
        ]);
    }

    public function update(Request $request){
        $fur = Furniture::find($request->id);
        //check if user is editing own furniture
        if($fur->users_id != Auth::user()->id){
            return response()->json([
                'success' =>false,
                'message' => 'unauthorized access'
            ]);
        }
        $fur->fName = $request->fName;
        $fur->fvol = $request->fvol;
        $fur->famount = $request->famount;
        $fur->fprice = $request->fprice;
        $fur->update();
        return response()->json([
            'success' => true,
            'message' => 'edited'
        ]);
    }

    public function delete(Request $request){
        $fur = Furniture::find($request->id);
        //check if user is editing own furniture
        if($fur->users_id != Auth::user()->id){
            return response()->json([
                'success' =>false,
                'message' => 'unauthorized access'
            ]);
        }

        $fur->delete();
        return response()->json([
            'success' => true,
            'message' => 'deleted'
        ]);
    }
}
