@if (Session::has('notify'))
    <script>
        window.parent.toastr['{{Session::get('notify.status')}}']('{{Session::get('notify.msg')}}');
    </script>
@endif