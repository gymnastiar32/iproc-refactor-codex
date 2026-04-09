@php($htmlPrefix = 'og: https://ogp.me/ns#')
@php($htmlClass = 'scroll-smooth')
@php($htmlLang = app()->getLocale())
@php($bodyAttributes = 'data-spy="scroll" data-target="#navbar" data-offset="0"')

@extends('layouts.site')

@section('head')
    @include('partials.two-go.head')
    @vite('resources/css/pages/two-go.css')
@endsection

@section('content')
    @include('partials.two-go.nav-menu')
    <main>
        @include('partials.two-go.home')
        @include('partials.two-go.problem')
        @include('partials.two-go.solution')
        @include('partials.two-go.contact-cta')
    </main>
    @include('partials.two-go.footer')
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="/lib/js/navbar.min.js"></script>
    <script src="/lib/js/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @include('partials.two-go.scripts_inline')
@endsection
