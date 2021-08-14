<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB ;

class dummyController extends Controller
{
    
    public function contact_page()
    {
        return view('contact') ;
    }

     public function dummy($id)
    {
        return view('contact',compact('id')) ;
    }


     public function db_connection()
     {
        $data=DB::select('select * from customer');
        return view('db_connect',['data'=>$data]);
     }

     public function registerform() {
      return view('register');
   }
    
    public function register(Request $request) {
      
      $user_id = $request->input('user_id');
      $user_pwd = $request->input('user_pwd');
      $user_email = $request->input('user_email');
      /*$signups=DB::select("select user_id from signup");      
      
      foreach ($signups as $signup) {
         if ($signup->user_id==$User_id) return view('register');
     }*/

      DB::insert('insert into Signup (user_id,user_pwd,user_email) values(?,?,?)',[$user_id,$user_pwd,$user_email]);
      return view('register');
   }

}
