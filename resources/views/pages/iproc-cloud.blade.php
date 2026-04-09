@php($htmlPrefix = 'og: https://ogp.me/ns#')
@php($htmlClass = 'scroll-smooth')
@php($htmlLang = app()->getLocale())
@php($bodyAttributes = 'data-spy="scroll" data-target="#navbar" data-offset="0"')

@extends('layouts.site')

@section('head')
    @include('partials.cloud.head', [
        'pageTitle' => 'iProc cloud',
    ])
    @vite('resources/css/pages/cloud.css')
@endsection

@section('content')
    @include('partials.cloud.nav-menu')
    <main>
        @include('partials.cloud.home')
        @include('partials.cloud.problem')
        @include('partials.cloud.adoption-barriers')
        @include('partials.cloud.solution-highlight')
        @include('partials.cloud.why-cloud')
        @include('partials.cloud.features')
        @include('partials.cloud.pricing-comparison')
        @include('partials.cloud.security-compliance')
        @include('partials.cloud.form')
        @include('partials.cloud.contact-cta')
    </main>
    @include('partials.cloud.footer')
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="/lib/js/navbar.min.js"></script>
    <script src="/lib/js/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @include('partials.cloud.scripts_inline')
@endsection
