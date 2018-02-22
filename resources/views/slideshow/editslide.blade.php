@extends('layouts.app')

@section('content')

<form action="{{URL::to('/slide/update')}}" method="POST" enctype="multipart/form-data" >
    {{csrf_field()}}
    <input type="hidden" name="id" value ="{{$id}}">
  <tr>
  <td>Orders</td>
  <td><input type="text" name="orders" value="{{$slide->orders}}"></td>
  </tr>
  <br><br>
  <tr>
  <td>Des</td>
  <td><input type="text" name="des" value="{{$slide->des}}"></td>
  </tr>
  <br><br>
  <td>url</td> 
  <td><input type="text" name="url" value="{{$slide->url}}"></td>
  </tr>
  <br><br>
  <input type="submit" value="Submit">
</form>
@endsection