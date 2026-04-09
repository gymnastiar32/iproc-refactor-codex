<!DOCTYPE html>
<html
    lang="{{ $htmlLang ?? app()->getLocale() }}"
    @if (!empty($htmlPrefix)) prefix="{{ $htmlPrefix }}" @endif
    @if (!empty($htmlClass)) class="{{ $htmlClass }}" @endif
>
<head>
@yield('head')
</head>
<body {!! $bodyAttributes ?? '' !!}>
@yield('content')
@yield('scripts')
</body>
</html>
