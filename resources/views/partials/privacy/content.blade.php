@php
    $isId = app()->getLocale() === 'id';
    $homeUrl = $isId ? '/id/iproc-2go' : '/iproc-2go';
    $privacyUrl = $isId ? '/id/iproc-2go/kebijakan-privasi' : '/iproc-2go/privacy-policy';
    $langBtnBase = 'inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-sm font-semibold transition';
    $langBtnActive = 'bg-[#005db5] text-white hover:bg-[#005db5]/90';
    $langBtnInactive = 'text-black hover:bg-[#005db5]/10';
@endphp

<header class="bg-white border-b border-gray-100">
    <div class="max-w-screen-2xl mx-auto flex flex-col gap-4 px-8 py-4 lg:flex-row lg:items-center lg:justify-between">
        <div class="flex flex-wrap items-center gap-2">
            <a href="{{ url($homeUrl) }}"
                class="nav-link text-base block text-gray-900 hover:bg-blue-100 py-1.5 px-3 rounded">
                {{ __('privacy.nav.home') }}
            </a>
            <a href="{{ url($privacyUrl) }}"
                class="nav-link text-base block text-gray-900 hover:bg-blue-100 py-1.5 px-3 rounded active">
                {{ __('privacy.nav.privacy') }}
            </a>
        </div>
        <div class="inline-flex items-center">
            <a href="/iproc-2go/privacy-policy"
                class="{{ $langBtnBase }} {{ !$isId ? $langBtnActive : $langBtnInactive }}"
                aria-label="{{ __('privacy.nav.switch_en') }}">
                <span>EN</span>
            </a>
            <a href="/id/iproc-2go/kebijakan-privasi"
                class="{{ $langBtnBase }} {{ $isId ? $langBtnActive : $langBtnInactive }}"
                aria-label="{{ __('privacy.nav.switch_id') }}">
                <span>ID</span>
            </a>
        </div>
    </div>
</header>

<main class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">{{ __('privacy.title') }}</h1>

    <p>{{ __('privacy.intro') }}</p>

    <h2 class="text-xl font-semibold mt-8 mb-4">{{ __('privacy.collection.title') }}</h2>
    <p>{{ __('privacy.collection.intro') }}</p>
    <ol class="list-decimal pl-5 space-y-2">
        @foreach (trans('privacy.collection.items') as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ol>

    <h2 class="text-xl font-semibold mt-8 mb-4">{{ __('privacy.usage.title') }}</h2>
    <p>{{ __('privacy.usage.intro') }}</p>
    <p>{{ __('privacy.usage.lead') }}</p>
    <ol class="list-decimal pl-5 space-y-2">
        @foreach (trans('privacy.usage.items') as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ol>

    <h2 class="text-xl font-semibold mt-8 mb-4">{{ __('privacy.contact.title') }}</h2>
    <p>{!! __('privacy.contact.body') !!}</p>

    <p class="mt-12 italic">{{ __('privacy.updated') }}</p>
</main>
