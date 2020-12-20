@extends('layouts.frame')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
       <a class="btn btn-info" href="{{route('addcategory')}}">Add Category</a>
       <a class="btn btn-success" href="{{route('viewcategory')}}">View Category</a>
       <a class="btn btn-success" href="{{route('viewpost')}}">View Post</a>
       <a class="btn btn-success" href="{{route('allpost')}}">All Post</a>
        
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form action="{{route('storepost')}}" method="post" enctype='multipart/form-data'>
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" class="form-control" placeholder="Enter Title" name="title">
          
            </div>
          </div>
          <br/>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
              <select class="form-control" name="category_id">

                @foreach($category as $row)

                <option  value="{{$row->id}}" >{{$row->category}}</option>
                 
                 @endforeach

              </select>
          
            </div>
          </div>
          <br>



          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Image</label>
              <input type="file" placeholder="Enter File" name="image">
          
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email Address</label>
              <input type="email" class="form-control" placeholder="Email Address" name="email">
              
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Phone Number</label>
              <input type="tel" class="form-control" placeholder="Phone Number" name="phone">
            </div>
          </div>


          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Message</label>
              <textarea rows="5" class="form-control" placeholder="Message" id="message" name="detail"></textarea>
             
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
  </div>

@endsection