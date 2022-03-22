@extends('back.index')
@section('title')
    {{trans('messages.registerTitle')}}
@stop
@section('description')
    {{trans('messages.registerDescription')}}
@stop
@section('keywords')
    {{trans('messages.registerKeyword')}}
@stop
@section('metaStyle')

@endsection
@section('content')
    <div id="app">

    </div>
@endsection
@section('metaScript')
    <script src="{{mix('assets/app/js/multi/auth/register.js')}}"></script>
@endsection
