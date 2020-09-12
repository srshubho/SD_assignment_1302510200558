@extends('admin.layouts.auth')

@section('content')

<div class="col-lg-5">
    @if (Session::has('failed'))
    <div class="alert alert-danger m-2" role="alert">
    <strong> {{ Session::get('failed') }} </strong>
    </div>
    @endif
    @if (Session::has('success'))
    <div class="alert alert-success m-2" role="alert">
    <strong> {{ Session::get('success') }} </strong>
    </div>
    @endif
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
        <div class="card-body">
        <form action="{{route('auth.login')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label class="small mb-1" for="email">Email</label>
                    <input class="form-control py-4" id="email" type="email" placeholder="Enter email address" name="email"  required/>
                </div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                <div class="form-group">
                    <label class="small mb-1" for="password" >Password</label>
                    <input class="form-control py-4" id="password"  type="password" placeholder="Enter password" name="password" required/>
                </div>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button type="submit" class="btn btn-primary w-50 offset-3">Log in </button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <div class="small"><a href="{{route('register')}}">Need an account? Sign up!</a></div>
        </div>
    </div>
</div>
    
@endsection