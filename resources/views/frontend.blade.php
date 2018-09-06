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
                @if (isset($draft->draft_level))
                    @php $btn_class = $draft->draft_level; @endphp
                @else
                    @php $btn_class = 0; @endphp
                @endif
                <a href="{{ $item['link'] }}" type="button" class="btn btn-{{ (Request::segment(2) == $item['link']) ? "primary" : "default" }} btn-circle" {{ ($btn_class >= $i or Request::segment(2) == $item['link']) ? "" : "disabled" }}>
                    {{ ($i+1) }}
                </a>
                <p><strong>{{ $item['name'] }}</strong></p>
            </div>
            @endforeach
        </div>
    </div>
    @yield('frontend-content')
@endsection
