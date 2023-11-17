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
        <div class="card" id='card'>
            <form action="#" method="post" id="frm"> 
                @csrf
                <div class="card-header"><h4>Register</h4></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Full name</label>
                        <input type="text" name="name" class='form-control' required>
                        @if($errors->has('name'))
                        <span class='text text-danger'>{{$errors->first('name')}}</span>
                        @endif
                    </div>              
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name='email' class="form-control" required>
                        @if($errors->has('email'))
                        <span class="text text-danger">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Password</label>
                        <input type="password" name='password' class="form-control" required>
                        @if($errors->has('password'))
                        <span class="text text-danger">{{$errors->first('password')}}</span>
                        @endif
                    </div>
                    <br> 
                    <div class="form-group">
                        <button class='btn btn-primary' id='btnRegister'>Register</button>
                    </div>
                </div>
            </from>
        </div>
        <div id="message"></div>
       </div>
    </div>
</div>
<script>
    var DivMessage = document.getElementById('message');
    DivMessage.innerHTML = '';
    var card = document.getElementById('card');
    var url = "{{route('store.seeker')}}";
    var form = document.getElementById('frm');
    var btn = document.getElementById('btnRegister');
    btn.addEventListener("click",function(event){ 
        var formDt = new FormData(form);
        var buttonn = event.target;
        buttonn.disabled = true;
        buttonn.innerHTML = 'Sending Email.......'
        fetch(url,{
            method:'POST',
            
            body:formDt
        }).then(response=>{
            if(response.ok){
                return response.json();
            }
            else{
                throw new Error('Error');
            }
        }).then(data=>{
            buttonn.innerHTML ='Register';
            buttonn.disabled = false;
            DivMessage.innerHTML = '<div class = "alert alert-success">Registration was successful. please check your email to verify it</div>'
            card.style.display ='none';
        }).catch(error=>{
            buttonn.innerHTML ='Register';
            buttonn.disabled = false;
            DivMessage.innerHTML = '<div class = "alert alert-danger">Something went wrong. plesase try again</div>'
            
        })
    });
</script>
@endsection     