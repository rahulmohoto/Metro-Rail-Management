<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ViewController extends Controller
{    
    public function train_view()
    {		
        $data=DB::select("select * from trains");                
        return view('ShowTrains',['data'=>$data]);
    }

    public function train_scheduler_view()
    {		
    	$data=DB::select("select * from Train_scheduler");    	    	
    	return view('ShowTrain_scheduler',['data'=>$data]);
    }

    public function train_component_view()
    {		
    	$data=DB::select("select * from Train_component");    	    	
    	return view('ShowTrain_component',['data'=>$data]);
    }

    public function function_name()
    {		
    	$data=DB::select("select * from customer");    	    	
    	return view('ShowTable',['data'=>$data]);
    }

    /*public function train_view()
    {
        echo "Hello From New_controller";
        $data=DB::select("select * from trains");
        echo "<pre>";
        //print_r($data);
        return view('ShowTrains',['data'=>$data]);
    }

    public function train_scheduler_view()
    {
        echo "Hello From New_controller";
        $data=DB::select("select * from Train_scheduler");
        echo "<pre>";
        //print_r($data);
        return view('ShowTrain_scheduler',['data'=>$data]);
    }

    public function train_component_view()
    {
        echo "Hello From New_controller";
        $data=DB::select("select * from Train_component");
        echo "<pre>";
        //print_r($data);
        return view('ShowTrain_component',['data'=>$data]);
    }

    public function function_name()
    {
        echo "Hello From New_controller";
        $data=DB::select("select * from customer");
        echo "<pre>";
        //print_r($data);
        return view('ShowTable',['data'=>$data]);
    }*/
    
    public function insert_function()
    {       
        return view('insert_link');
    }
}
