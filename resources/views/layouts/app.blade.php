@if(Auth::check() && Auth::user()->role === 'admin')
    @extends('layouts.admin')
@elseif(Auth::check() && Auth::user()->role === 'employee')
    @extends('layouts.employee')
@endif