<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function group_create(Request $request){
        $request->validate([
            '*'=>'required',
         ]);
       Group::create([
        'name'=>$request->group_name,
       ]);
       return back();
    }
}
