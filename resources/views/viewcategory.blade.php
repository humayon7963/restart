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
          @foreach($categorydata as $row)
          <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->category}}</td>
            <td>{{$row->slug}}</td>
            <td>
              <a class="btn btn-info" href="{{URL('singlecategory/'.$row->id)}}">single view</a>
              <a class="btn btn-success" href="{{URL('updatecategory/'.$row->id)}}">Update Category</a>
              <a class="btn btn-danger" href="{{URL('deletecategoty/'.$row->id)}}">Delete Category</a>
            </td>
          </tr>

          @endforeach

        </table>
       
      </div>
    </div>
  </div>

@endsection