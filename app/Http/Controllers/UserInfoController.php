<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserInfoRequest;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function UserInfoList(){
       
        $user_info = UserInfo::orderBy('id','desc')->get();
        return view('backend.user-info.index',['user_info'=>$user_info]);
    }
    public function UserInfoCreate(){
           
        return view('backend.user-info.form');
    }
    public function UserInfoStore(UserInfoRequest $request){
      
       
        UserInfo::create([
            'name' => $request->name,
            'email'=>$request->email,
            'other_info'=>json_encode($request->other_info),
        ]);
        return redirect()->route('user.info.index')->with('success', 'Data has been saved');
      
        
    }
    public function UserInfoEdit($user_info){
        $update_user_info = UserInfo::findOrFail($user_info);
        return view('backend.user-info.form',compact('update_user_info'));
    }
    public function UserInfoUpdate(UserInfoRequest $request){
          $update_user_info = UserInfo::findOrFail($request->update_id);

          $update_user_info->update([
             'name' => $request->name,
            'email'=>$request->email,
            'other_info'=>json_encode($request->other_info),
          ]);
        return redirect()->route('user.info.index')->with('success', 'Data has been updated');
    }
    public function UserInfoDelete($user_info_id){
         $user_info = UserInfo::findOrFail($user_info_id);
     
        $user_info->delete();
        return back()->with('success', 'User info has been deleted!');
    }
}