@extends('layouts.frame')
@section('content')

  <div class="container">
    <div> @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif</div>
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a class="btn btn-primary" href="{{route('user')}}" >View Users</a>
      
     
        
        <form action="{{route('addstudent')}}" method="post" enctype="multipart/form-data">
         @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Name</label>
              <input type="text" class="form-control" name="name" placeholder="Enter Student Name">
          
            </div>
          </div>
    


          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email</label>
             <input type="Email" class="form-control" placeholder="Enter Email Address" name="email">
            
            </div>
          </div>
          
           <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Blood Group</label>
             <input type="text" class="form-control" placeholder="Enter Blood Group Name" name="blood">
            
            </div>
          </div>

           <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Address</label>
             <input type="address" class="form-control" placeholder="Enter Address" name="address">
            
            </div>
          </div>

           <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Contract Number</label>
             <input type="phone" class="form-control" placeholder="Enter Contract Number" name="phone">
            
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Photo</label>
              <span>Upload Photo</span>
             <input type="file" class="form-control" name="image">
            
            </div>
          </div>


          <br>
        
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>

@endsection