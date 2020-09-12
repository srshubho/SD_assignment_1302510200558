@extends('admin.layouts.default')


@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item "><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item ">Pages</li>
                <li class="breadcrumb-item "><a href="{{ route('dashboard.product.index') }}">product</a> </li>
                <li class="breadcrumb-item active">add</li>                
            </ol>
            <div class="row m-5">
                <div class="col-lg-6 offset-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="jumbotron  ">
                                <div class="container-fluid">
                                  <h3 class="text-center text-primary">Add product</h3>
                                  @if (Session::has('success'))
                                  <div class="alert alert-success" role="alert">
                                  <strong> {{ Session::get('success') }} </strong>
                                  </div>
                                  @endif
                                </div>
                              </div>
                            <form action="{{ route('dashboard.product.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                  <label for="name">product Name</label>
                                  <input type="text" class="form-control" id="name" name="name">
                                </div>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="description">product Description</label>
                                    <textarea type="text" class="form-control" id="description" name="description"></textarea>
                                  </div>
                                  @error('description')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror                                  
                                <div class="form-group">
                                    <select class="form-control" name="category_id">
                                        <option value="0" selected>Open this select menu</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach                                                                
                                      </select> 
                                    </div>   
                                    @error('category_id')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror                                    
                                    <div class="form-group">
                                        <label for="price">product price</label>
                                        <input type="number" class="form-control" id="price" name="price">
                                      </div>  
                                      @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror                                                          

                                <button type="submit" class="btn btn-primary w-50 offset-3">Submit</button>
                              </form>
                       
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
