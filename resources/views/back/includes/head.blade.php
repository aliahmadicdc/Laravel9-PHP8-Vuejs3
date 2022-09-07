<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="{{asset('assets/app/css/app.css?' . env('APP_VERSION'))}}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="{{asset('assets/back/media/logos/logo.png')}}"/>
    @yield('css')
</head>
