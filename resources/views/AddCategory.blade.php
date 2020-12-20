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
        <a class="btn btn-primary" href="{{route('viewcategory')}}" >View Category</a>
      
     
        
        <form action="{{route('addcategorydata')}}" method="post">
         @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category Name</label>
              <input type="text" class="form-control" name="category" placeholder="Enter Category Name">
          
            </div>
          </div>
    


          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug Name</label>
             <input type="text" class="form-control" placeholder="Enter Slug Name" name="slug">
            
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary">Input Data</button>
        </form>
      </div>
    </div>
  </div>

@endsection