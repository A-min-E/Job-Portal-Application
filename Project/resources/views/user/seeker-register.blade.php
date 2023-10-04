@extends("layouts.app")

@section("content")
<div class="container mt-5">
    <div class='row'>
       <div class="col-md-6">
        <h1>Looking for a job?</h1>
        <h3>Please create an accont</h3>
        <img src="{{asset('images/click.png')}}" alt="">
       </div>

       <div class="col-md-6">
        <div class="card">
            <form action="{{route('store.seeker')}}" method="post"> 
                @csrf
                <div class="card-header"><h4>Register</h4></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Full name</label>
                        <input type="text" name="name" class='form-control'>
                        @if($errors->has('name'))
                        <span class='text text-danger'>{{$errors->first('name')}}</span>
                        @endif
                    </div>              
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
                    <div class="form-group">
                        <button class='btn btn-primary' type='submit'>Register</button>
                    </div>
                </div>
            </from>
        </div>
       </div>
    </div>
</div>
@endsection     