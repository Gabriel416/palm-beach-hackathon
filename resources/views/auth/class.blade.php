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
        </style>
        @endsection

@section('content')
<div class="row card-row register-container">
    <div class="col s m5 card-col register-container-column">
        <div class="card-body">
            <h1>Sigh up as a Teacher!</h1>
            <form action="/classroom" method="POST" id="classroom-form">
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
                    <label for="school" class="col-md-4 col-form-label text-md-right">What school do you teach in?</label>

                    <div class="col-md-6">
                        <input id="school" type="text" class="form-control" name="school" required>
                    </div>
                </div>

                <input type="hidden" name="role" value="class">

                <div class="form-group row">
                    <label for="location" class="col-md-4 col-form-label text-md-right">Where is your school located?</label>

                    <div class="col-md-6">
                        <input id="about" type="text" class="form-control" name="location" required>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button  class="waves-effect waves-light btn register">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script
  <script type="text/javascript">
    $("#classroom-form").submit(function(event) {
        event.preventDefault();
        console.log('form submit');
        var thisForm = $("#classroom-form").serialize();
        return false;

        $.post('/classroom', thisForm, function(data) {
                console.log(data, 'data');
            })
            .fail(function(data) {
                console.log(data, 'fail')
            });
    })
  </script>

@endsection