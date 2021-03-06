@extends('frontend.layouts.main')

@section('page-title')
    @yield('frontend-title')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center text-white">ระบบข้อมูลสินค้าและบริการอิเล็กทรอนิกส์</h3>
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
        </div>
    </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        {{-- <h1>@yield('page-title')</h1> --}}
        <ol class="breadcrumb">
            <li class="home">{{ config('app.name') }}</li>
        </ol>
    </section>
    @yield('frontend-content')
@endsection
