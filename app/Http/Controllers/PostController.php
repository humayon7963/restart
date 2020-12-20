<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function storepost(Request $postdata){

    	$data_validation=$postdata->validate([

    		'title'=>'required|max:2500|min:4',
    		'email'=>'required|max:2500|min:4',
    		'phone'=>'required|max:14|min:4',
    		'detail'=>'required|max:2500|min:4',
    		'image'=>'nullable',
    		
    		

    	]);

    		$data=array();
    		$data['title']=$postdata->title;
    		$data['category_id']=$postdata->category_id;
    		$data['email']=$postdata->email;
    		$data['phone']=$postdata->phone;
    		$data['detail']=$postdata->detail;
    		$image=$postdata->file('image');

    		if ($image) {
    			
    			$image_name=hexdec(uniqid());
    			$ext=strtolower($image->getClientOriginalExtension());
    			$image_fullname=$image_name.".".$ext;
    			$upload_path='public/fontend/post_image/';
    			$image_url=	$upload_path.$image_fullname;
    			$success=$image->move($upload_path,$image_fullname);
    			$data['image']=$image_url;

    			$post=DB::table('posts')->insert($data);
    			if ($post) {
    				  
    				  $notification = array('messege' =>'Data Insert success With Image',
    		                      'alert-type'=>'success' );
    				  return redirect()->back()->with($notification);
    			}else {
    				$notification = array('messege' =>'Data Insert Error With Image',
    		                      'alert-type'=>'error' );
    				  return redirect()->back()->with($notification);
    			}

    		}else {
    			$post=DB::table('posts')->insert($data);
    			if ($post) {
    				$notification = array('messege' =>'Data Insert success Without Image',
    		                      'alert-type'=>'success' );
    				  return redirect()->back()->with($notification);
    			}else{
    				$notification = array('messege' =>'Data Insert error Without Image',
    		                      'alert-type'=>'error' );
    				  return redirect()->back()->with($notification);
    			}
    		} 

    		//echo '<pre/>';
    		//print_r($data);
    }

    public function allpost()
    {
        $data=DB::table('posts')->join('categories','posts.category_id','categories.id')->select('posts.*','categories.category')->get();
        return view('post.viewpost',compact('data'));
        //echo '<pre/>';
        //print_r($data);
    }

    public function singlepostview($id)
    {
        $data=DB::table('posts')->join('categories','posts.category_id','categories.id')->where('posts.id',$id)->select('posts.*','categories.category')->first();
        return view('post.singlepostview',compact('data'));
        //echo '<pre/>';
        //print_r($data);

    }

    public function viewpost(){
     $dataview=DB::table('posts')->join('categories','posts.category_id','categories.id')->select('posts.*','categories.category')->paginate(3);
        return view('post.allpostview',compact('dataview'));
     // echo '<pre/>';
     // print_r($dataview);

    }
    

    public function editpost($id){
        $updatepost=DB::table('posts')->where('id',$id)->first();
        $category=DB::table('categories')->get();
        return view('post.updatepost',compact('updatepost','category'));
    }

    public function edit_post_data_store(Request $Request,$id)
    {

       $data_validation=$Request->validate([

            'title'=>'required|max:2500|min:4',
            'detail'=>'required|max:2500|min:4',
            'image'=>'mimes:jpg,JPG,jpeg,png,PNG|max:5000',

        ]);
        

            $data=array();
            $data['title']=$Request->title;
            $data['detail']=$Request->detail;
            $data['category_id']=$Request->category_id;
            $image=$Request->file('image');

        if($image){
                $image_name=hexdec(uniqid());
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/fontend/post_image/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                $data['image']=$image_url;
                unlink($Request->old_image);

                $update_post=DB::table('posts')->where('id',$id)->update($data);
                if ($update_post) {
                    $notification = array('messege' =>'Update success',
                                          'alert-type'=>'success' );
                    return redirect()->back()->with($notification);
        

                    }else{
                        $notification = array('messege' =>'problem',
                                              'alert-type'=>'error' );
                            return redirect()->back()->with($notification);
                        }   






        }else{


                    $data['image']=$Request->old_image;

                    $insert_post=DB::table('posts')->where('id',$id)->update($data);
                if ($insert_post) {
                    $notification = array('messege' =>'success',
                                          'alert-type'=>'success' );
                    return redirect()->back()->with($notification);
                

                }else{
                    $notification = array('messege' =>'problem',
                                          'alert-type'=>'error' );
                        return redirect()->back()->with($notification);
                    }   

        }



        

    }

    public function deletepost($id)

    {

        //echo "$id";
                    $image_info=DB::table('posts')->where('id',$id)->first();
                    $delete_image=$image_info->image;
                    //echo "$delete_image";
                    $data=DB::table('posts')->where('id',$id)->delete();
                        if ($data) {
                            if($delete_image){
                            unlink($delete_image);}
                            $notification = array('messege' =>'successfully Deleted',
                                                  'alert-type'=>'success' );
                            return redirect()->back()->with($notification);

                        }
   

    }




}

