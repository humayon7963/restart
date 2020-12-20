@extends('layouts.frame')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">
        <a class="btn btn-primary" href="{{route('viewcategory')}}" >View Category</a>
      
        <table class="table table-responsive">
          <tr>
            <th>SL</th>
            <th>Title</th>
            <th>Category</th>
            <th>Image</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Detail</th>
          </tr>
          @foreach($data as $row)
          <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->title}}</td>
            <td>{{$row->category}}</td>
            <td><img src="{{URL::to($row->image)}}" style="height: 50px; width: 80px;"></td>
            <td>{{$row->email}}</td>
            <td>{{$row->phone}}</td>
            <td>{{$row->detail}}</td>

            
            <td>
              <a class="btn btn-info" href="{{url('singlepostview/'.$row->id)}}">single view</a>
              <a class="btn btn-success" href="{{url('editpost/'.$row->id)}}">Update Post</a>
              <a class="btn btn-danger" href="{{url('deletepost/'.$row->id)}}">Delete Post</a>
            </td>
          </tr>

          @endforeach

        </table>
       
      </div>
    </div>
  </div>

@endsection