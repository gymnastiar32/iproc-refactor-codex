@php($htmlLang = app()->getLocale())
@php($bodyAttributes = 'class="font-sans text-gray-900 bg-white"')

@extends('layouts.site')

@section('head')
    @include('partials.privacy.head')
    @vite('resources/css/pages/two-go.css')
@endsection

@section('content')
    @include('partials.privacy.content')
@endsection
