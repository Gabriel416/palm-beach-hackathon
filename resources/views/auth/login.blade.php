@extends('layouts.app')

@section('styles')
        <style>
            .register-container {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .register-container-column {
                margin-left: 0px !important ;
            }
            
            .card-body {
                padding: 30px 0px 10px 0px;
                border-radius: 6px;
                flex-direction: column;
                display: flex;
                align-items: center;
                background-color: white;
            }

            h1 {
                text-align: center;
                font-size: 22px;
                color: black;
                font-weight: bold;
            }

            h2 {
                font-size: 13px;
            }

            form {
                width: 80%;
            }

            label {
                color: black;
            }

            .checks {
                display: flex;
                justify-content: space-between;
            }

            .register {
                text-align: center;
                background-color: #FFB800;
                font-weight: bold;
                width: 100%;
                margin: 20px 0px 10px 0px;
            }

            .logo-center {
                text-align: center;
                margin: 15px;
            }
        </style>
        @endsection

@section('content')







<div class="row card-row register-container">
    <div class="col s m5 card-col register-container-column">
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="/"><img src="/images/white-seeds-logo.png" alt="seeds logo" style="margin: 0 auto;"></a>
        </div>
        <div class="card-body">
            <h1>Login</h1>
            <form  method="POST" id="login-form">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Email</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="email"  required autofocus>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Password</label>

                    <div class="col-md-6">
                        <input id="email" type="password" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="password"  required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
<!-- 
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div> -->

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button  class="waves-effect waves-light btn register">
                            Login
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection
@section('scripts')
<script>
    $("#login-form").submit(function(event) {
        event.preventDefault();
        console.log('form submit');
        var thisForm = $("#login-form").serialize();

        $.post('/authenticate', thisForm, function(data) {
                console.log(data, 'data');
                if(data == 'BAD') {
                    alert("Please be on the lookout for emails to answer question!");
                } else if(data == 'OK'){
                    window.location.href = '/app/question';
                } else {
                    alert("These records do not match. Please try again");
                }
            })
            .fail(function(data) {
                console.log(data, 'fail')
                alert('These records do not match. Please try again');
            });
    })
</script>
@endsection