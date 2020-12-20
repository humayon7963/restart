@extends('layouts.frame')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a class="btn btn-primary" href="{{route('viewcategory')}}" >View Category</a>
      
        <table class="table table-responsive">
          <tr>
            <th>SL</th>
            <th>Category Name</th>
            <th>Slug Name</th>
            <th>Take Action</th>
          </tr>
          
          <tr>
            <td>{{$SinglaCategoryView->id}}</td>
            <td>{{$SinglaCategoryView->category}}</td>
            <td>{{$SinglaCategoryView->slug}}</td>
          
            <td>
              <a class="btn btn-info" href="">single view</a>
              <a class="btn btn-success" href="">Update Category</a>
              <a class="btn btn-danger" href="">Delete Category</a>
            </td>
          </tr>

        

        </table>
       
      </div>
    </div>
  </div>

@endsection