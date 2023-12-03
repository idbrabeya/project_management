<?php

namespace App\Http\Controllers;

use App\Models\Dailywork;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DailyworkController extends Controller
{
    public function update_form(){
        $dailyworks_form = Question::where('group_id', Auth::user()->group_id)->get();
        return view('dailywork.index',compact('dailyworks_form'));
    }
    public function dailyform(Request $request){
        
        $messages=[
            'required'=>'This is a required question !',
        ];
        $request->validate([
           'yesterday.*'=>'required',
        ],$messages);

         foreach ($request->yesterday as $key=>$value) {
            
            Dailywork::create([
           'user_id' => Auth::id(),
           'yesterday'=> $value,
           'question_id'=>$request->question_id[$key],
          ]);

         };
        return back()->with('success_form','data save successfully!');
    }
    public function form_list(Request $request){
        $filter_name = $request->input('fil_name'); 
        $st_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        if (Auth::user()->role==2) {
            $dailywork_lists = Dailywork::with('user');
            if ($filter_name) {
                $dailywork_lists->whereHas('user', function ($dailywork_lists) use ($filter_name) {
                    $dailywork_lists->where('name', 'like', '%' . $filter_name . '%');
                });
            }
       if($st_date &&  $end_date){
        $dailywork_lists->whereDate('created_at','>=', $st_date)->whereDate('created_at','<=',$end_date);
       }
        $dailywork_lists = $dailywork_lists->paginate(5);
        } else {
            $dailywork_lists = Dailywork::whereHas('user', function ($dailywork_lists) {
                $dailywork_lists->where('user_id',Auth::user()->id);
            })->paginate(5);
        }
    
        return view('dailywork.dailywork_list', compact('dailywork_lists'));
    }

    public function form_list_edit($id){
        $form_editt = Dailywork::findOrFail($id);
        return response()->json($form_editt);
    }

    public function list_update(Request $request){
        $form_update = Dailywork::findOrFail($request->id);
        $form_update->yesterday = $request->yesterday;
        $form_update->update();
        return response()->json(['status','data update successfully!!']);
    }
    public function form_list_delete($id){
        $form_delete= Dailywork::findOrFail($id);
        $form_delete->delete();
        return redirect()->route('form.list')->with(['message'=>'Item deleted successfully !!','alert-type'=>'success']);
    }
    public function form_multiple_delete(Request $request){
        $id= $request->id;
         foreach ($id as $value) {
            Dailywork::find($value)->delete();
         }
         return redirect()->route('form.list')->with(['message'=>'selected Item deleted successfully !!','alert-type'=>'success']);
    }
}
