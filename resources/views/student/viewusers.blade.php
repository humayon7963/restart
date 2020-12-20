@extends('layouts.frame')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">
        <a class="btn btn-primary" href="{{route('student')}}" >Add User</a>
      
        <table class="table table-responsive">
          <tr>
            <th>SL</th>
            <th>User's Name</th>
            <th>User's Email</th>
            <th>User's Blood Group</th>
            <th>User's Address</th>
            <th>User's Contract</th>
            <th>User's Photo</th>
            <th>Taken Action</th>
          </tr>
          @foreach($users as $row)
          <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->email}}</td>
            <td>{{$row->blood}}</td>
            <td>{{$row->address}}</td>
            <td>{{$row->phone}}</td>
            <td><img src="{{URL::to($row->image)}}" style="height: 50px; width: 80px;"></td>

            
            <td>
              
              <a class="btn btn-success" href="{{url('updateuser/'.$row->id)}}">Update Post</a>
              <a class="btn btn-danger" href="{{url('deleteuser/'.$row->id)}}">Delete User</a>
            </td>
          </tr>

          @endforeach

        </table>
       
      </div>
    </div>
  </div>

@endsection