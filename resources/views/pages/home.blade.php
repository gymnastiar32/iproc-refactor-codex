@php($htmlPrefix = 'og: https://ogp.me/ns#')
@php($htmlLang = app()->getLocale())

@extends('layouts.site')

@section('head')
    @include('partials.home.head')
    @vite('resources/css/pages/home.css')
@endsection

@section('content')
    @include('partials.home.nav')
    <main>
        @include('partials.home.hero')
        @include('partials.home.about-overview')
        @include('partials.home.impact-metrics')
        @include('partials.home.features')
        @include('partials.home.key-capabilities')
        @include('partials.home.procurement-workflow')
        @include('partials.home.product-showcase')
        @include('partials.home.client-stories')
        @include('partials.home.industries')
        @include('partials.home.client-logos')
        @include('partials.home.awards')
        @include('partials.home.call-to-action')
    </main>
    @include('partials.home.footer')
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
    <script src="/lib/js/slider.min.js"></script>
    <script src="/lib/js/navbar.min.js"></script>
    <script src="/lib/js/index.min.js" defer async></script>
    <script src="/lib/js/tabs.min.js" defer async></script>
    <script src="/lib/js/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @include('partials.home.scripts_inline')
@endsection
