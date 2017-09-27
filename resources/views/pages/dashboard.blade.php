@extends('layouts.app')

@section('stylesheets')
    {{-- Dashboard stylesheet --}}
    {{-- <link rel="stylesheet" href="https://getbootstrap.com/docs/3.3/examples/dashboard/dashboard.css"> --}}
@endsection

@section('title')
    Dashboard
@endsection

@section('content')
    
    <div class="container" id="dashboard-container">
        
        <div class="row">
            
            <div id="app">
                {{-- Sidebar --}}
                <div class="col-sm-3 col-md-2 sidebar">
                    <sidebar></sidebar>
                </div>

                {{-- Main --}}
                <div class="col-sm-9 col-md-10 col-sm-offset-3 col-md-offset-2 main">
                    {{-- <userinfo></userinfo>
                    <properties></properties> --}}
                    <passport-clients></passport-clients>
                    <passport-authorized-clients></passport-authorized-clients>
                    <passport-personal-access-tokens></passport-personal-access-tokens>
                    <passport-login-form></passport-login-form>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#main-navbar').addClass('navbar-fixed-top');
        });
    </script>
@endsection
