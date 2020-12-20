<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class writecontroller extends Controller
{
   
public function write(){

	$category=DB::table('categories')->get();
	return view('writepost',compact('category'));
}


public function AddCategory(){

	return view('AddCategory');
}

public function storecategory(Request $store){

	$data_validation=$store->validate([

    		'category'=>'required|max:2500|min:4',
    		'slug'=>'required|max:2500|min:4',
    		

    	]);

	$data=array();
	$data['category']=$store->category;
	$data['slug']=$store->slug;

	$store=DB::table('categories')->insert($data);

		if ($store) {
    		$notification = array('messege' =>'Data Insert success',
    		                      'alert-type'=>'success' );
    		return redirect()->back()->with($notification);
    	

	    }else{
	    	$notification = array('messege' =>'problem',
	    		                  'alert-type'=>'error' );
	    		return redirect()->back()->with($notification);
	    	}	
	//echo "<pre>";
	//print_r($data);
}

public function viewcategory(){
	$categorydata=DB::table('categories')->get();
	return view('viewcategory',compact('categorydata'));
	//echo '<pre/>';
	//print_r($categorydata);
}

public function SinglaCategoryView($id){

			$SinglaCategoryView=DB::table('categories')->where('id',$id)->first();

			return view('SinglaCategoryView',compact('SinglaCategoryView'));
				//echo '<pre/>';
	//print_r($SinglaCategoryView);

}
public function UpdateCategory($id){
	$updatecategory=DB::table('categories')->where('id',$id)->first();
	return view('updatecategory',compact('updatecategory'));
}

public function StoreUpdateCategory(Request $storeupdatedata,$id){

		

		$data=array();

		$data['category']=$storeupdatedata->category;
		$data['slug']=$storeupdatedata->slug;

		$update=DB::table('categories')->where('id',$id)->update($data);
		if ($update) {
    		$notification = array('messege' =>'Data Insert success',
    		                      'alert-type'=>'success' );
    		return redirect()->back()->with($notification);
    	

	    }else{
	    	$notification = array('messege' =>'problem',
	    		                  'alert-type'=>'error' );
	    		return redirect()->back()->with($notification);
	    	}	


}

public function DeleteCategory($id){

	$delete=DB::table('categories')->where('id',$id)->delete();
	if ($delete) {
		$notification = array('messege' =>'Deleted',
	    		                  'alert-type'=>'error' );
	    		return redirect()->back()->with($notification);
	}else{
		$notification = array('messege' =>'Delete Error',
	    		                  'alert-type'=>'info' );
	    		return redirect()->back()->with($notification);
	}

}

	
	

}
