@extends('layouts.app')

@section('content')
<div class='container'>
    <div class="row justify-content-center mt-5">
        <div class="card">
            <div class="card-header">Verify Account</div>
            <div class="card-body">
                <p>Your acount is not verified, Please verify your Account first. <a href="{{route('resend.mail')}}">Resend verification email</a></p>
            </div>
            
        </div>
    </div>
</div>
@endsection