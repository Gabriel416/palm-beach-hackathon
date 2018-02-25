@extends('layouts.app')


        <!-- Styles -->
        @section('styles')
        <style>

            .description {
                color: black !important;
                font-size: 16px;
                font-weight: bold;
            }
            
            .card-content {
                background-color: white;
                text-align: center;
                border-radius: 6px !important;
                /* height: 250px;
                width: 350px; */
            }

            .signup-image {
                height: 71px;
            }

            .sign-up {
                background-color: #FFB800;
                font-weight: bold;
                width: 100%;
                margin: 20px 0px 10px 0px;
            }

            .card-col {
                margin: 0px 10px !important;
            }

            .card-row {
                display: flex;
                justify-content: center;
            }

            .login-instead {
                text-align: center;
                color: white;
            }

            .headliner {
                text-align: center;
                margin-bottom: 60px;
            }

            .title {
                color: white;
                margin: 0;
            }
            
            .subtitle {
                color: white;
                margin: 0;
                font-size: 16px;
            }
            /* .card {
                height: 250px;
                width: 350px;
            } */
        </style>
        @endsection

    @section('content')
        
        <div class="row headliner">
            <img src="/images/longlogo.png">
        </div>

        <div class="row card-row">
            <div class="col s m4 card-col">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <img class="signup-image" src="/images/Group.png">
                        <p class="description">I'm a Teacher who'd like help from STEM professionals</p>
                        <a href="/register/class" class="waves-effect waves-light btn sign-up">SIGN UP</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 card-col">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <img  src="/images/stem.png">
                        <p class="description">I'm a STEM Professional who wants to help teachers</p>
                        <a href="/register/stem" class="waves-effect waves-light btn sign-up">SIGN UP</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <p class="login-instead">Already have an account? Log in</p>
        </div>
    
    @endsection

