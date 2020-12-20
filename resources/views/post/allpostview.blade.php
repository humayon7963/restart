@extends('layouts.frame')
@section('content')

  <div class="container">
    @foreach($dataview as $data)
    <div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">
        <h1 style="text-align: center;">{{$data->title}}</h1>
        <img src="{{url($data->image)}}" style="display: block;
                                                margin-left: auto;
                                                margin-right: auto;
                                                width: 50%;
                                                height: 50% ">
                                                <br>

      
      <center><i>{{$data->category}}</i> </center> 
       <p>{{$data->detail}}</p>
       <br>
       <center>Cntract:{{$data->phone}}</center>
       <center>Email Address:{{$data->email}}</center>
       
      </div>
    </div>
    
    @endforeach
    {{$dataview->links()}}
  </div>

@endsection