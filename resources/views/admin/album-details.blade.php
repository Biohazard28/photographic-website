@extends('admin.master')
@section('content')

  <h1>{{$albums->album_name}}</h1>
   <h2>My photo will be here</h2>

  <form class="form-group" action="{{url('upload')}}" method="post"  enctype="multipart/form-data">
     <input type="hidden" value ="{{csrf_token()}}" name="_token" >
      <input type="hidden" name="album_id" value="{{$albums->id}}">
      <input type="file"  name="image">
      <button class="btn btn-fab-material-blue">Upload</button>
  </form>
   @foreach($photos as $photo)
      <img src="{{url('images/'.$photo->photo_name)}}" width="400" height="500"/>
       @endforeach
    <a href="{{url('album/list')}}">Back to the previous page  </a>