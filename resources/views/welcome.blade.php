@extends('base')

@section('style')
@parent
<link href="{{asset ('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css')}}" rel="stylesheet" />
@endsection

@section('container')
hola mundo
@endsection
@section('title', 'Welcome')