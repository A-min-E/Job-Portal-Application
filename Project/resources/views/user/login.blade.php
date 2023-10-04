@extends("layouts.app")

@section("content")
<div class="container mt-5">
    <div class='row justify-content-center'>
       <div class="col-md-8">
        @include('message')
        <div class="card shadow-lg">
            <form action="{{route('login.post')}}" method="post"> 
                @csrf
                <div class="card-header">Login</div>
                <div class="card-body">
                                 
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name='email' class="form-control">
                        @if($errors->has('email'))
                        <span class="text text-danger">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Password</label>
                        <input type="password" name='password' class="form-control">
                        @if($errors->has('password'))
                        <span class="text text-danger">{{$errors->first('password')}}</span>
                        @endif
                    </div>
                    <br> 
                    <div class="form-group text-center">
                        <button class='btn btn-primary' type='submit'>Register</button>
                    </div>
                </div>
            </from>
        </div>
       </div>
    </div>
</div>
@endsection     