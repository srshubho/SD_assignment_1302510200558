//createimage.blade.php

@extends('admin.layouts.default')


@section('content')
@if (Session::has('success'))
<div class="alert alert-success m-2" role="alert">
<strong> {{ Session::get('success') }} </strong>
</div>
@endif
  <div class="container">
    <h3 class="jumbotron">Laravel  Image Intervention </h3>
    <form method="post" action="{{route('dashboard.image.add')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <input type="file" name="filename[]" class="form-control" multiple>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <button type="submit" class="btn btn-success" style="margin-top:10px">Upload Image</button>
          </div>
        </div>     
  </form>
  </div>
  @endsection