@extends('layouts.frame')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <a class="btn btn-primary" href="{{route('viewcategory')}}" >View Category</a>
      
        
        <form action="{{URL('updatecategoty/'.$updatecategory->id)}}" method="post">
         @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category Name</label>
              <input type="text" class="form-control" name="category" value="{{$updatecategory->category}}">
          
            </div>
          </div>
    


          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug Name</label>
             <input type="text" class="form-control" value="{{$updatecategory->slug}}" name="slug">
           
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary">Update Category Data</button>
        </form>
      </div>
    </div>
  </div>

@endsection