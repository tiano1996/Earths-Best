<!DOCTYPE html>
<html lang="zh-cmn-Hans">
@include('partial.head')
<body>
@section('header')@include('partial.header')@show
@yield('sliderShow')
@yield('content')
@include('partial.footer')