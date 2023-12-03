<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
   public function question_create(){
    return view('question.question_index');
   }
   public function question_insert(Request $request){
   foreach ($request->ques as $value) {
    Question::create([
        // 'question'=>$request->ques,
        'question'=>$value,
        'group_id'=>$request->group_id,
    ]);
   
  };

// return response()->json(['massage'=>'save data']);

  return back();
}
public function question_list(Request $request){
//   return  Question::where('group_id',5)->get();
    $question_lists = Question::paginate(5);
    return view('question.question_list',compact('question_lists'));
   
}
public function question_edit($id){
    $question_edit = Question::findOrFail($id);
    return response()->json($question_edit);  
}
public function question_update(Request $request){
            $question_update = Question::find($request->id);
            $question_update->update([
                'group_id'=>$request->group_id,
                'question'=>$request->edit_question,
            ]);
    return response()->json(['success' => 200, 'message' => 'Question updated successfully']);

}

public function question_list_delete($id){
    $question_delete = Question::findOrFail($id);
    $question_delete->delete();
    return response()->json(['success'=>200,'message'=>'Question deleted successfully']);
}

}
