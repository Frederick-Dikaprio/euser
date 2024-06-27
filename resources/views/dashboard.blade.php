@extends('layouts.maindo')

@Section('links')
    <link rel="manifest" href="{{ asset('mix-manifest.json') }}" />
@endsection

@Section('titre')
    Dashboard
@endsection

@Section('content')
    <input type="hidden" id="subscriptionsUrl" value="{{ route('subscriptions') }}">
    <input type="hidden" id="authToken" value="{{ session('tokens')['value'] }}">
    <input type="hidden" id="apiHostUrl" value="{{ env('E_USER_API') }}">
    <div id="dashboard"></div>
@endsection

@section('script')
    <script src="{{ asset('js/components/manifest.js') }}"></script>
    <script src="{{ asset('js/components/vendor.js') }}"></script>
    <script src="{{ asset('js/components/dashboard.js') }}"></script>
@endsection
