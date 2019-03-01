<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 3/1/19
 * Time: 21:25
 */
?>
@extends('backend.modern-admin.auth.master')

@section('desc')

@endsection

@section('keywords')

@endsection

@section('metas')

@endsection

@section('title')

@endsection

@section('fonts')
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
@endsection

@section('core-scripts')

@endsection

@section('theme-css')

@endsection

@section('core-scripts')

@endsection

@section('plugin-css')

@endsection

@section('page-css')
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modern-admin/app-assets/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modern-admin/app-assets/vendors/css/forms/icheck/custom.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/modern-admin/app-assets/css/pages/login-register.css') }}">
    <!-- END Page Level CSS-->
@endsection

@section('styles')

@endsection

@section('header-right')

@endsection

@section('content')
    <section class="flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-0">
                        <div class="card-title text-center">
                            <div class="p-1"><img src="{{ asset($webSettings['web_logo_secondary']) }}" class="logo-form-custom" alt="branding logo"></div>
                        </div>
                    </div>
                    <div class="card-content">
                        {{--<div class="card-body pt-0 text-center">--}}
                            {{--<a href="#" class="btn btn-social mb-1 mr-1 btn-outline-facebook"><span class="la la-facebook"></span> <span class="px-1">facebook</span> </a>--}}
                            {{--<a href="#" class="btn btn-social mb-1 mr-1 btn-outline-google"><span class="la la-google-plus font-medium-4"></span> <span class="px-1">google</span> </a>--}}
                        {{--</div>--}}
                        {{--<p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2"><span>OR Using Account Details</span></p>--}}
                        <div class="card-body pt-0">
                            @if ($errors->has('error_login'))
                                <div class="help-block">
                                    <strong>{{ $errors->first('error_login') }}</strong>
                                </div>
                            @endif
                            <form class="form-horizontal"  method="POST" action="{{ route('postLogin') }}">
                                {{ csrf_field() }}
                                <fieldset class="form-group floating-label-form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="user-name">Your Username</label>
                                    <input type="text" class="form-control" name="username" id="user-name" placeholder="Your Username">
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </fieldset>
                                <fieldset class="form-group floating-label-form-group mb-1 {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="user-password">Enter Password</label>
                                    <input type="password" class="form-control" id="user-password" name="password" placeholder="Enter Password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </fieldset>
                                <div class="form-group row">
                                    <div class="col-md-6 col-12 text-center text-sm-left">
                                        <fieldset>
                                            <input type="checkbox" id="remember-me" class="chk-remember" name="remember" {{ old('remember') ? 'checked' : ''}}>
                                            <label for="remember-me"> Remember Me</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="#" class="card-link">Forgot Password?</a></div>
                                </div>
                                <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Login</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <a href="#" class="btn btn-outline-danger btn-block"><i class="ft-user"></i> Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('core-footer-scripts')

@endsection

@section('theme-scripts')

@endsection

@section('plugin-scripts')
@endsection

@section('page-scripts')
@endsection

