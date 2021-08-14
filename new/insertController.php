<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class InsertController extends Controller {

	 public function registerform() {
      return view('register',['value'=>'']);
   }
    
    public function register(Request $request) {
      
      $user_id = $request->input('user_id');
      $first_name = $request->input('first_name');
      $last_name = $request->input('last_name');
      $occupation = $request->input('occupation');
      $user_pwd = $request->input('user_pwd');
      $user_email = $request->input('user_email');
      $house_number = $request->input('house_number');
      $road_number = $request->input('road_number');
      $block = $request->input('block');
      $city = $request->input('city');
      $contact = $request->input('contact');
      $requested = $request->input('selected_reqname');

      $signups=DB::select("select user_id from signup");      
      
      foreach ($signups as $signup) {
         if ($signup->user_id==$user_id) return view('register',['value'=>'Already Registered!!']);
     }

      DB::insert('insert into Signup (user_id,first_name,last_name,occupation,user_pwd,user_email,house_number,road_number,block,city,contact_number,request) values(?,?,?,?,?,?,?,?,?,?,?,?)',[$user_id,$first_name,$last_name,$occupation,$user_pwd,$user_email,$house_number,$road_number,$block,$city,$contact,$requested]);
      return view('register',['value'=>'User Registration Complete']);
    }

    public function loginform() {
      return view('login',['value'=>'']);
   }
    
    public function login(Request $request) {
      
      $user_id = $request->input('user_id');
      $user_pwd = $request->input('user_pwd');
      $users = DB::select("select user_id,user_pwd from user_login");

      if($user_id=="admin" && $user_pwd=="1234"){
        return view('contact'); //change here
      }

      else{

      foreach ($users as $user_login){
        if($user_id==$user_login->user_id && $user_pwd==$user_login->user_pwd){
        return view('contact'); //change here 
          }
      }

      return view('login',['value'=>'Login Unsuccessful Try Again']);
    }

  }

     public function permissionform() {
      $data=DB::select("select user_id from signup");
      return view('permission',['data'=>$data],['value'=>'']);
   } 

      public function permissioninfo() {
       $data=DB::select("select signup.user_id,first_name,last_name,occupation,contact_number,request,permission.status from signup join permission on signup.user_id = permission.user_id where permission.status='pending' ");
      return view('permission',['data'=>$data],['value'=>'show_info']);
   } 
       
    public function permission(Request $request) {
      $flag='1';
      $data=DB::select("select user_id from signup");
      $role = $request->input('selected_rname');
      $user_id = $request->input('selected_uname');
      $permission = $request->input('selected_name');
      $metrousers=DB::select("select user_id from metrocard_user");
      $users=DB::select("select user_id from users");
      foreach($users as $temp){
        if($temp->user_id==$user_id){
            return view('permission',['data'=>$data],['value'=>'Already Granted Permission']);
        }
      }
      if($metrousers){
      foreach($metrousers as $temp ){
        if($role=="metrocard" && $permission=="granted" && $temp->user_id!=$user_id){
              DB::insert('insert into metrocard_user(user_id) values (?)',[$user_id]);
              return view('permission',['data'=>$data],['value'=>'Permitted Access']);
          }
        else{
          $flag='0';
        }        
      }
    }
      else{
             DB::insert('insert into metrocard_user(user_id) values (?)',[$user_id]);
              return view('permission',['data'=>$data],['value'=>'Permitted Access']);        
      }
      if($flag=='1'){
        return view('permission',['data'=>$data],['value'=>'Already Granted Permission']);
      }
      else{
      DB::table('permission')->where('user_id',$user_id)->update(['status'=>$permission]);
      return view('permission',['data'=>$data],['value'=>'Permitted Access']);
    }
      
  }

   public function metrocardregisterform() {

      return view('metrocardregister',['value'=>'']);
   }
    
    public function metrocardregister(Request $request) {
      
      $user_id = $request->input('user_id');
      $nid = $request->input('nid');
      $subscription_type = $request->input('selected_name');
      $flag='1';

      $data = DB::select("select user_id,nid from metrocard_user"); 
      foreach($data as $temp){
        if ($temp->nid==$nid) return view('metrocardregister',['value'=>'Already Registered!!']);
      }
      foreach($data as $temp){
        if ($temp->user_id==$user_id) 
            $flag='0'; 
      }
      if($flag=='1')
       return view('metrocardregister',['value'=>'Not A Metrocard User!!']); 
      //echo $subscription_type;
      
      if($subscription_type=="periodically"){
        $daystosum = '15';
        $mydate = Carbon::now()->format('d-m-Y');
        $datesum = date('d-m-Y', strtotime($mydate.' + '.$daystosum.'days'));
      }

      else if($subscription_type=="monthly"){
        $daystosum = '30';
        $mydate = Carbon::now()->format('d-m-Y');
        $datesum = date('d-m-Y', strtotime($mydate.' + '.$daystosum.'days'));
      }

      else if($subscription_type=="yearly"){
        $daystosum = '365';
        $mydate = Carbon::now()->format('d-m-Y');
        $datesum = date('d-m-Y', strtotime($mydate.' + '.$daystosum.'days'));
      }
      DB::setDateFormat('dd-mm-yy');
     // echo $datesum;
  DB::table('metrocard_user')->where('user_id',$user_id)->update(['nid'=>$nid,'subscription_type'=>$subscription_type,'validity'=>$datesum]);
      
    return view('metrocardregister',['value'=>'Registered Successfully']);
     
    }


    
      



// DB::table('users')
// ->where('user_id',1)
// ->update(['username'=>'admin','status'=>'active']);

   // $users = DB::table('users')
   //                   ->select(DB::raw('count(*) as user_count, status'))
   //                   ->where('status', '<>', 1)
   //                   ->groupBy('status')
   //                   ->get();














    public function train_component_insertform() {
      return view('InsertTrainComponent');
   }
   
   public function train_component_insert(Request $request) {
      echo "Record inserted successfully.<br/>";
      $Train_id = $request->input('Train_id');
      $Component_id = $request->input('Component_id');      
      $Status = $request->input('Status');
      $Cost = $request->input('Cost');
      $Installation_date = $request->input('Installation_date');
      $Manufacture_date = $request->input('Manufacture_date');      
      $Next_checkup = $request->input('Next_checkup');
      $Component_type = $request->input('Component_type');
      $Menufacturer = $request->input('Menufacturer');
            
      DB::insert('insert into Train_component (Train_id,
         Component_id, Status, Cost,
         Installation_date, Manufacture_date, Next_checkup,
         Component_type, Menufacturer) values(?,?,?,?,?,?,?,?,?)',[$Train_id,
         $Component_id, $Status, $Cost,
         $Installation_date, $Manufacture_date, $Next_checkup,
         $Component_type, $Menufacturer]);
      echo "Record inserted successfully.<br/>";
      echo '<a href = "/view/train_component">Click Here to view train_component</a> to go back.';
   }

}