<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;

class InsertController extends Controller {

	 public function registerform() {
      return view('register',['value'=>'']);
   }
    
    public function register(Request $request) {
      
      $user_email = $request->input('user_email');
      $first_name = $request->input('first_name');
      $last_name = $request->input('last_name');
      $occupation = $request->input('occupation');
      $user_pwd = $request->input('user_pwd');
      $house_number = $request->input('house_number');
      $road_number = $request->input('road_number');
      $block = $request->input('block');
      $city = $request->input('city');
      $contact = $request->input('contact');
      $requested = $request->input('selected_reqname');

      $sequence=DB::getSequence();

      $user_id=$sequence->nextValue('user_id_sequence');

      $user_id=Str::start($user_id,'U');

      $signups=DB::select("select user_email from signup");      
      
      foreach ($signups as $signup) {
         if ($signup->user_email==$user_email) return view('register',['value'=>'Already Registered!!']);
     }

    DB::insert('insert into Signup (user_id,first_name,last_name,occupation,user_pwd,user_email,house_number,road_number,block,city,contact_number,request) values(?,?,?,?,?,?,?,?,?,?,?,?)',[$user_id,$first_name,$last_name,$occupation,$user_pwd,$user_email,$house_number,$road_number,$block,$city,$contact,$requested]);
      return view('register',['value'=>'User Registration Complete']);
    }

    public function loginform() {
      return view('login',['value'=>'']);
   }
    
    public function login(Request $request) {
      
      $user_id = $request->input('user_id');//now treated as mail
      $user_pwd = $request->input('user_pwd');
      $users = DB::select("select user_id,user_pwd from user_login");

      if($user_id=="admin" && $user_pwd=="1234"){
        return view('contact'); //change here
      }

      else{

      foreach ($users as $user_login){
        if($user_id==$user_login->user_id && $user_pwd==$user_login->user_pwd){
            
            $data = DB::table('staff')->select('worker_type')->where('user_email',$user_id)->get();
            if(Str::contains($data, 'driver')){
              echo "driver";
            }
            else if(Str::contains($data, 'station_master')){
              echo "station_master";
            }
            else if(Str::contains($data, 'repair_worker')){
              echo "repair_worker";
            }
            else{
              echo "user";
            }

          }
      }

      //return view('login',['value'=>'Login Unsuccessful Try Again']);
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
      $metrousers=DB::select("select user_id from metrocard_user");
      $users=DB::select("select user_id from users");
      foreach($users as $temp){
        if($temp->user_id==$user_id){
            return view('permission',['data'=>$data],['value'=>'Already Granted Permission']);
        }
      }
      if($metrousers){
      foreach($metrousers as $temp ){
        if($role=="metrocard" && $temp->user_id==$user_id){
              $flag='0';
              break;
          }        
      }
    }
      if($flag=='1' && $role=="metrocard"){
              DB::insert('insert into metrocard_user(user_id) values (?)',[$user_id]);
              DB::table('permission')->where('user_id',$user_id)->update(['status'=>'mgranted']);
              return view('permission',['data'=>$data],['value'=>'Permitted Access!']);
        }

      if($flag=='0'){
        return view('permission',['data'=>$data],['value'=>'Already Granted Permission']);
      }
      else{
          DB::table('permission')->where('user_id',$user_id)->update(['status'=>'granted']);
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

      $data = DB::select("select user_id from metrocard_user");
      $data2 =  DB::select("select nid from nid");
      foreach($data2 as $temp){
        if ($temp->nid==$nid) 
          { 
            $flag='0';
            break;
          }
      }
      if($flag=='1')
       return view('metrocardregister',['value'=>'Not A Valid Nid!!']); 

       $flag='1';     
      
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


    public function staffregisterform() {
      return view('staff_register',['value'=>'']);
   }

    public function staffregister(Request $request) {
      
      $user_email = $request->input('user_email');
      $first_name = $request->input('first_name');
      $last_name = $request->input('last_name');
      $dob = $request->input('dob');
      $user_pwd = $request->input('user_pwd');
      $house_number = $request->input('house_number');
      $road_number = $request->input('road_number');
      $block = $request->input('block');
      $city = $request->input('city');
      $shift = $request->input('shift');
      $requested = $request->input('selected_typename');

      $sequence=DB::getSequence();

      $user_id=$sequence->nextValue('staff_id_sequence');

      $user_id=Str::start($user_id,'S');

      $signups=DB::select("select user_email from staff");      
      
      foreach ($signups as $signup) {
         if ($signup->user_email==$user_email) return view('register',['value'=>'Already Registered!!']);
     }

    DB::insert('insert into staff (staff_id,first_name,last_name,dob,user_pwd,user_email,Address_house_number,Address_road_number,Address_block,Address_city,shift,worker_type) values(?,?,?,?,?,?,?,?,?,?,?,?)',[$user_id,$first_name,$last_name,$dob,$user_pwd,$user_email,$house_number,$road_number,$block,$city,$shift,$requested]);

      
      if($requested=='driver'){
          DB::insert('insert into driver (staff_id) values (?)',[$user_id]);
          return redirect('/driversignup');        
      }

      if($requested=='station_master'){
          DB::insert('insert into station_master (staff_id) values (?)',[$user_id]);
          return redirect('/stationmastersignup');  
      }

      if($requested=='repair_worker'){
          DB::insert('insert into Repair_workers_involve (staff_id) values (?)',[$user_id]);
          return redirect('/repairworkersignup');
      }

    }

    public function driverregisterform() {
      return view('driver_register',['value'=>'']);
    }


    public function driverregister(Request $request) {
      $licence_number = $request->input('licence_number');
      $licence_validity = $request->input('licence_validity');

      $data = DB::select("select licence_number from driver");

      $sequence=DB::getSequence();

      $user_id=(int)$sequence->nextValue('staff_id_sequence');
      $user_id-=1;
      $user_id=Str::start($user_id,'S');

      //echo $user_id;

      foreach ($data as $temp) {
         if ($temp->licence_number==$licence_number) return view('driver_register',['value'=>'Already Registered!!']);
     }

       DB::table('driver')->where('staff_id',$user_id)->update(['licence_number'=>$licence_number,'licence_validity'=>$licence_validity]);
      
      return view('driver_register',['value'=>'registration complete']);
    }


    public function stationmasterregisterform() {
      return view('stationmaster_register',['value'=>'']);
    }


    public function stationmasterregister(Request $request) {
      $station_id = $request->input('station_id');
      $counter_id = $request->input('counter_id');

      $sequence=DB::getSequence();

      $user_id=(int)$sequence->nextValue('staff_id_sequence');
      $user_id-=1;
      $user_id=Str::start($user_id,'S');

      //echo $user_id;

       DB::table('station_master')->where('staff_id',$user_id)->update(['station_id'=>$station_id,'counter_id'=>$counter_id]);
      
      return view('stationmaster_register',['value'=>'registration complete']);
    }


      public function repairworkerregisterform() {
      return view('repairworker_register',['value'=>'']);
    }


    public function repairworkerregister(Request $request) {
      $speciality = $request->input('speciality');
      $working_area = $request->input('working_area');

      $sequence=DB::getSequence();

      $user_id=(int)$sequence->nextValue('staff_id_sequence');
      $user_id-=1;
      $user_id=Str::start($user_id,'S');

      //echo $user_id;

       DB::table('Repair_workers_involve')->where('staff_id',$user_id)->update(['speciality'=>$speciality,'working_area'=>$working_area]);
      
      return view('repairworker_register',['value'=>'registration complete']);
    }  
      
    public function repair_worker_viewform()
    {   
        $data=DB::select("select * from Repair_workers_view"); 
        return view('repair_worker',['data'=>$data],['value'=>'']);
    }

    public function repair_worker_view(Request $request)
    {  
        $staff_id = $request->input('selected_sname');
        $check = $request->input('check');
        $component = $request->input('selected_cname');
        $data=DB::select("select * from Repair_workers_view"); 
        // echo $check;
        // echo $component;
        if($check=="done"){
        DB::table('repair')->where('component_id',$component)->update(['status'=>$check]);
        return view('repair_worker',['data'=>$data],['value'=>'Update Success!!!!']);
      }
        else
          return view('repair_worker',['data'=>$data],['value'=>'Status Remained Same']);
    }

     public function complaint_viewform()
    {   
        $data=DB::select("select * from complaint_view"); 
        return view('complaint_view',['data'=>$data],['value'=>'']);
    }

     public function complaint_view(Request $request)
    {   
      $complaint_id = $request->input('selected_cname');
      $check = $request->input('check');
      $data=DB::select("select * from complaint_view"); 

      if($check=="Checked"){
        DB::table('complaint_management')->where('complaint_id',$complaint_id)->update(['status'=>$check]);
        return view('complaint_view',['data'=>$data],['value'=>'Update Success!!!!']);
      }
      else{
        return view('complaint_view',['data'=>$data],['value'=>'Status Remained Same']);
      }
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