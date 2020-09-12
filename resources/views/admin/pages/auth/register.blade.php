@extends('admin.layouts.auth')

@section('content')
<div class="col-lg-7">
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
        <div class="card-body">
        <form action="{{route('auth.register')}}" method="post">
            @csrf
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="name"> Name</label>
                            <input class="form-control py-4" id="name" type="text" placeholder="Enter  name" name="name" required/>
                        </div>
                    </div>

                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                <div class="form-group">
                    <label class="small mb-1" for="email">Email</label>
                    <input class="form-control py-4" id="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email" required />
                </div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="password">Password</label>
                            <input class="form-control py-4" id="password" type="password" placeholder="Enter password" name="password" required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="password_confirmation">Confirm Password</label>
                            <input class="form-control py-4" id="password_confirmation" type="password" placeholder="Confirm password" name="password_confirmation"  required/>
                        </div>
                    </div>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary w-50 offset-3">Creat Account</button>
            </form>
        </div>
        <div class="card-footer text-center">
        <div class="small"><a href="{{route('login')}}">Have an account? Go to login</a></div>
        </div>
    </div>
</div>
    
@endsection