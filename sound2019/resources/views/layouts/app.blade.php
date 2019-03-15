@if(request()->ajax())
    @yield('content')
@else
    @include('layouts.full')
@endif