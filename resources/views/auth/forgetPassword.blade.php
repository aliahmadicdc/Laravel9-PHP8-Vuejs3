@extends('back.index')
@section('title')
    {{trans('messages.forgetPasswordTitle')}}
@stop
@section('description')
    description
@stop
@section('keywords')
    keyword
@stop
@section('metaStyle')

@endsection
@section('content')
    <div id="app">

    </div>
@endsection
@section('metaScript')
    <script src="{{mix('assets/app/js/multi/auth/forgetPassword.js')}}"></script>
@endsection
