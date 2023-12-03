<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function employee()
    {
        if(Auth::user()->role ==2) {
            $user_lists= User::where('role',1)->paginate(5,['*'],'user_lists');
            $user_list_deletedItem = User::onlyTrashed()->paginate(5,['*'],'user_list_deletedItem');
             
          }else{
              $user_lists= User::where('id', Auth::user()->id)->paginate(5,['*'],'user_lists');
              $user_list_deletedItem = User::onlyTrashed()->paginate(5,['*'],'user_list_deletedItem');
          }
          return view('employee_list',compact('user_lists','user_list_deletedItem'));
    }

 
    public function employee_edit(){
       return view('modal.employee_edit');
    }
    public function profile_edit(){
        return view('profile.profile_edit');
    }
    public function profile_info_change(Request $request){
        //    return $request->all();
        $request->validate([
                       'name'=>'required',
                  ]);
        $user_edit =User::findOrFail(Auth::id());
        $user_edit->name= $request->name;
        $user_edit->profile_photo= $request->new_photo;
        $user_edit->update();
        return back()->with('success','Your Profile Update Successfuly');
    }
    public function profile_photo_change(Request $request){ 
        $request->validate([
                 'new_photo'=>'required|image',
        ]);
        try {
            
            $user = User::find(Auth::id());
            if ($request->hasFile('new_photo')) {
                $old_photo_path = 'dashboard/assets/images/' . $user->profile_photo;
                if ($user->profile_photo != 'default.jpg' && File::exists($old_photo_path)) {
                    File::delete($old_photo_path);
                }
                // Upload and save the new photo
                $file = $request->file('new_photo');
                $file_name = time() . '-' . $file->getClientOriginalName();
                $file->move('dashboard/assets/images/', $file_name);
            } else {
                // If no new photo was uploaded,
                $file_name = $user->profile_photo;
            }
            $user->update([
                'profile_photo' => $file_name
            ]);

        return back()->with('success_photo','profile photo update successfully!');
    } catch (\Throwable $th) {
        //throw $th;
        return response()->json(['message'=>$th->getMessage()]);
    }
    }
    public function change_password(Request $request){
      
        if(Hash::check( $request->old_password, Auth::user()->password)){
           if ($request->new_password == $request->confirm_password) {
               User::find(Auth::id())->update([
                   'password'=> bcrypt($request->new_password)
               ]);
             return back()->with('success_pass','password change successfully');
           }else{
            return back()->withErrors('error','password does not match with confirm password');
           }

        }else{
            return back()->withErrors('error','old_password does not match with confirm password');
        }
    }
    public function employee_delete($id){
        $user_delete= User::find($id);
           $user_delete->delete();
           return back();
    }
    public function employee_forch($id){
       $employee_forch_delete = User::onlyTrashed()->find($id);
       $employee_forch_delete ->forceDelete();
       return back()->with('error','employee permanent delete successfully');
        
    }
    public function restore_employee($id){
        $employee_restore = User::onlyTrashed()->find($id);
        $employee_restore->restore();
        return back();
    }

    
}
