@extends('layouts.frame')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
       <a class="btn btn-info" href="{{route('addcategory')}}">Add Category</a>
       <a class="btn btn-success" href="{{route('viewcategory')}}">View Category</a>
       <a class="btn btn-success" href="{{route('viewpost')}}">View Post</a>
        
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form action="{{url('updatepost/'.$updatepost->id)}}" method="post" enctype='multipart/form-data'>
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" class="form-control" value="{{$updatepost->title}}" name="title">
          
            </div>
          </div>
          <br/>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
              <select class="form-control" name="category_id">

                @foreach($category as $row)

                <option  value="{{$row->id}}<?php if($row->id==$updatepost->category_id){echo "selected";}?>" >{{$row->category}}</option>
                 
                 @endforeach

              </select>
          
            </div>
          </div>
          <br>



          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
             
               <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>Image</label>
                  <input type="file" class="form-control" name="image">
                  
                 <span>Old Image</span> <img src="{{URL($updatepost->image)}}" height="100px" width="140px">
                 <input type="hidden" name="old_image" value="{{$updatepost->image}}">
              
            </div>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email Address</label>
              <input type="email" class="form-control" value="{{$updatepost->email}}"" name="email">
              
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Phone Number</label>
              <input type="tel" class="form-control" value="{{$updatepost->phone}}" name="phone">
            </div>
          </div>


          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Message</label>
              <textarea rows="5" class="form-control"  name="detail">{{$updatepost->detail}}</textarea>
             
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
      </div>
    </div>
  </div>

@endsection