@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', 'Login Again')
@section('message', __('Session Timeout'))

<a style="float: right; margin: 20px; padding: 8px 20px; background-color: #0C5BCB; border-radius: 7px; color: #fff" href="{{route('login')}}" class="btn btn-primary">Login</a>
