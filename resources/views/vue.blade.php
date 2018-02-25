@extends('layouts.spa')

@section('content')
<div class="container">
    <div id="app">
        <router-view></router-view>
    </div>
    @section('scripts')
    <script src="/js/app.js"></script>
    @endsection
</div>
@endsection
