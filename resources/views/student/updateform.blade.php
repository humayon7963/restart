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
      
     
        
        <form action="{{URL('storeupdate/'.$update->id)}}" method="post" enctype="multipart/form-data">
         @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Name</label>
              <input type="text" class="form-control" name="name" value="{{$update->name}}">
          
            </div>
          </div>
    


          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email</label>
             <input type="Email" class="form-control" value="{{$update->email}}" name="email">
            
            </div>
          </div>
          
           <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Blood Group</label>
             <input type="text" class="form-control" value="{{$update->blood}}" name="blood">
            
            </div>
          </div>

           <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Address</label>
             <input type="address" class="form-control" value="{{$update->address}}" name="address">
            
            </div>
          </div>

           <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Contract Number</label>
             <input type="phone" class="form-control" value="{{$update->phone}}" name="phone">
            
            </div>
          </div>

         
           <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Photo</label>
              <input type="file" class="form-control" name="image">
              
             <span>Old Photo</span> <img src="{{URL::to($update->image)}}" alt="No PIC" height="100px" width="140px">
             <input type="hidden" name="old_photo" value="{{$update->image}}">
          
        </div>


          <br>
        
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>

@endsection