@extends('layouts.main')

@section('page-title')
    @yield('frontend-title')
@endsection
@section('content')
    <div class="stepwizard">
        {{-- {{ dd(Request::segment(2)) }} --}}
        <div class="stepwizard-row setup-panel">
            @foreach ($step_form as $i => $item)
            <div class="stepwizard-step">
                <a href="{{ $item['link'] }}" type="button" class="btn btn-{{ (Request::segment(2) == $item['link']) ? "primary" : "default" }} btn-circle">
                    {{ ($i+1) }}
                </a>
                <p><strong>{{ $item['name'] }}</strong></p>
            </div>
            @endforeach
        </div>
    </div>
    @yield('frontend-content')
@endsection
