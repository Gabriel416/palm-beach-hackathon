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
        <div class="logo-center">
            <img src="/images/logo.png">
        </div>
        
        <div class="card-body">
            <h1>Sign up as STEM Professional!</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

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
                </div>

                <div class="form-group row">
                    <label for="about" class="col-md-4 col-form-label text-md-right">Tell Us About Yourself</label>

                    <div class="col-md-6">
                        <input id="about" type="text" class="form-control" name="about" required>
                    </div>
                </div>

                <h2>What industry or industries do you have knowledge in?</h2>
                
                <div class="row">
                    <div class="col s6">
                        <input name="jobs" class="filled-in" type="checkbox" id="science" />
                        <label for="science">Science</label>
                    </div>

                    <div class="col s6">
                        <input name="jobs" class="filled-in" type="checkbox" id="technology" />
                        <label for="technology">Technology</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <input name="jobs" class="filled-in" type="checkbox" id="engineering" />
                        <label for="engineering">Engineering</label>
                    </div>

                    <div class="col s6">
                        <input name="jobs" class="filled-in" type="checkbox" id="mathematics" />
                        <label for="mathematics">Mathematics</label>
                    </div>
                    <input type="hidden" name="role" value="stem">
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="waves-effect waves-light btn register">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
