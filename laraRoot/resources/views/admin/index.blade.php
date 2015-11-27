@extends('_layouts.backend')
@section('content')
    <div id="wrapper">
        @include('admin.navMenu')
        <div id="page-wrapper" class="gray-bg dashbard-1">
            @include('admin.header')
            <iframe class="row" name="mainBox" id="mainBox" src="/admin/start.html" sandbox="allow-scripts allow-same-origin allow-forms" frameborder="0" scrolling="no" width="105%"
                    onload="this.height=500;var fdh=(this.Document?this.Document.body.scrollHeight:this.contentDocument.body.offsetHeight);this.height=fdh">
            </iframe>
            @include('admin.footer')
        </div>
    </div>
@endsection