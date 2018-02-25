@extends('layouts.app')

@section('styles')
  <style>
      .completed-card {
        height: 400px;
        display: flex;
        text-align: center;
        justify-content: center;
        padding: 75px;
        background-color: white;
        flex-direction: column;
      }

      h3 {
        margin-bottom: 60px;
      }

      .completed-logo {
        text-align: center;
        margin-bottom: 30px;
      }
  </style>
@endsection

@section('content')
<div class="completed-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="completed-logo">
                  <img src="/images/logo.png">
                </div>
            <div class="completed-card">
                <div class="card-body">
                  <h3>Complete!</h3>
                  <h4>Please look out for alerts from our classrooms!</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
