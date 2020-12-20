<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
   public function student()
   {
   	return view('student.register');
   }

   public function addstudent(Request $Request)
   {

   			 $data_validation=$Request->validate([

    		'name'=>'required|max:25|min:3',
    		'email'=>'required|max:250|min:4',
    		'blood'=>'required',
    		'address'=>'required|max:120|min:9',
    		'phone'=>'required|max:12|min:9',
    		'image'=>'nullable',

    	]);


   			 $Student= new Student;
   			 $Student->name=$Request->name;
   			 $Student->email=$Request->email;
   			 $Student->blood=$Request->blood;
   			 $Student->address=$Request->address;
   			 $Student->phone=$Request->phone;
   			 $image=$Request->file('image');

   			if ($image) {
   				
   				$image_name=hexdec(uniqid());
    			$ext=strtolower($image->getClientOriginalExtension());
    			$image_fullname=$image_name.".".$ext;
    			$upload_path='public/fontend/user_photo/';
    			$image_url=	$upload_path.$image_fullname;
    			$success=$image->move($upload_path,$image_fullname);
    			
    			$Student->image=$image_url;
    			$store=$Student->save();

    				if ($store) {
		    		$notification = array('messege' =>'Success with Photo',
		    		                      'alert-type'=>'success' );
		    		return redirect()->back()->with($notification);
		    	

			    }else{
			    	$notification = array('messege' =>'Fail Upload Photo',
			    		                  'alert-type'=>'error' );
			    		return redirect()->back()->with($notification);
			    	}	


   			}else{

   				$store= $Student->save();
		   				if ($store) {
		    		$notification = array('messege' =>'Success Without Photo',
		    		                      'alert-type'=>'success' );
		    		return redirect()->back()->with($notification);
		    	

			    }else{
			    	$notification = array('messege' =>'Fail Without Photo',
			    		                  'alert-type'=>'error' );
			    		return redirect()->back()->with($notification);
			    	}	
   			
   			}

   			// echo '<pre>';
   			 //print_r( $Student);



   }


  public function viewuser()
  {

  	$users=Student::all();
  	return view('student.viewusers',compact('users'));

  }

  public function deleteuser($id)
  {

  	$delete= Student::find($id);
  	$image=$delete->image;
  	
  	if ($image) {
  			$del=$delete->delete();
  			$k=unlink($image);
  			if ($k) {
  				$notification = array('messege' =>'Delete Success with Photo',
		    		                      'alert-type'=>'success' );
		    		return redirect()->back()->with($notification);
  			}

  	}else {
  		$del=$delete->delete();
  		$notification = array('messege' =>'Delete Success withot Photo',
		    		                      'alert-type'=>'success' );
		    		return redirect()->back()->with($notification);

  	}
 	//echo '<pre/>';
  	//print_r($image);

  }

  public function updateuser($id)
  {
  	$update= Student::find($id);
  	return view('student.updateform',compact('update'));

  }

  public function storeupdate(Request $request,$id)
  {

  	 $data_validation=$request->validate([

    		'name'=>'required|max:25|min:3',
    		'email'=>'required|max:250|min:4',
    		'blood'=>'required',
    		'address'=>'required|max:120|min:9',
    		'phone'=>'required|max:12|min:9',
    		'image'=>'nullable',

    	]);

  	 	$data=Student::find($id);
   	$data->name=$request->name;
   	$data->email=$request->email;
   	$data->phone=$request->phone;
   	$image=$request->file('image');
   	if($image){
    			$image_name=hexdec(uniqid());
    			$ext=strtolower($image->getClientOriginalExtension());
    			$image_full_name=$image_name.'.'.$ext;
    			$upload_path='public/fontend/user_photo/';
    			$image_url=$upload_path.$image_full_name;
    			$success=$image->move($upload_path,$image_full_name);
    			$data->image=$image_url;
    			if (!empty($request->old_photo)) {
    				unlink($request->old_photo);
    			}

    			$update_post=$data->save();
    			if ($update_post) {
		    		$notification = array('messege' =>'Update Success with Photo',
		    		                      'alert-type'=>'success' );
		    		return redirect()->back()->with($notification);

    					}




    	}else{


    				$data->image=$request->old_photo;

		    		$insert_post=$data->save();
		    	if ($insert_post) {
		    		$notification = array('messege' =>'Update Success without Photo',
		    		                      'alert-type'=>'success' );
		    		return redirect()->back()->with($notification);

    	}
    }



  }


}
