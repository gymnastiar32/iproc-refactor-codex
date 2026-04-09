    @php
        $isId = app()->getLocale() === 'id';
        $langBtnBase = 'inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-sm font-semibold transition';
        $langBtnActive = 'bg-[#005db5] text-white hover:bg-[#005db5]/90';
        $langBtnInactive = 'text-black hover:bg-[#005db5]/10';
        $privacyUrl = $isId ? '/id/iproc-2go/kebijakan-privasi' : '/iproc-2go/privacy-policy';
    @endphp
    <nav id="navbar" class="px-8 p-6 lg:px-6 py-2.5 fixed top-0 left-0 w-full z-50 bg-transparent">
        <div class="flex justify-end lg:justify-around items-center mx-auto max-w-screen-2xl w-full">
            <div class="flex items-center space-x-4 lg:space-x-6 mb-auto order-2">
                <div id="langPills" class="inline-flex items-center">
                    <a id="btnLangEn" href="/iproc-2go"
                        class="{{ $langBtnBase }} {{ !$isId ? $langBtnActive : $langBtnInactive }}"
                        aria-label="{{ __('two_go.nav.switch_en') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" width="32" height="32"
                            viewBox="0 0 32 32">
                            <rect x="1" y="4" width="30" height="24" rx="4" ry="4" fill="#fff"></rect>
                            <path
                                d="M1.638,5.846H30.362c-.711-1.108-1.947-1.846-3.362-1.846H5c-1.414,0-2.65,.738-3.362,1.846Z"
                                fill="#a62842"></path>
                            <path
                                d="M2.03,7.692c-.008,.103-.03,.202-.03,.308v1.539H31v-1.539c0-.105-.022-.204-.03-.308H2.03Z"
                                fill="#a62842"></path>
                            <path fill="#a62842" d="M2 11.385H31V13.231H2z"></path>
                            <path fill="#a62842" d="M2 15.077H31V16.923000000000002H2z"></path>
                            <path fill="#a62842" d="M1 18.769H31V20.615H1z"></path>
                            <path
                                d="M1,24c0,.105,.023,.204,.031,.308H30.969c.008-.103,.031-.202,.031-.308v-1.539H1v1.539Z"
                                fill="#a62842"></path>
                            <path
                                d="M30.362,26.154H1.638c.711,1.108,1.947,1.846,3.362,1.846H27c1.414,0,2.65-.738,3.362-1.846Z"
                                fill="#a62842"></path>
                            <path d="M5,4h11v12.923H1V8c0-2.208,1.792-4,4-4Z" fill="#102d5e"></path>
                            <path
                                d="M27,4H5c-2.209,0-4,1.791-4,4V24c0,2.209,1.791,4,4,4H27c2.209,0,4-1.791,4-4V8c0-2.209-1.791-4-4-4Zm3,20c0,1.654-1.346,3-3,3H5c-1.654,0-3-1.346-3-3V8c0-1.654,1.346-3,3-3H27c1.654,0,3,1.346,3,3V24Z"
                                opacity=".15"></path>
                            <path
                                d="M27,5H5c-1.657,0-3,1.343-3,3v1c0-1.657,1.343-3,3-3H27c1.657,0,3,1.343,3,3v-1c0-1.657-1.343-3-3-3Z"
                                fill="#fff" opacity=".2"></path>
                        </svg>
                        <span>EN</span>
                    </a>
                    <a id="btnLangId" href="/id/iproc-2go"
                        class="{{ $langBtnBase }} {{ $isId ? $langBtnActive : $langBtnInactive }}"
                        aria-label="{{ __('two_go.nav.switch_id') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" width="32" height="32"
                            viewBox="0 0 32 32">
                            <path d="M31,8c0-2.209-1.791-4-4-4H5c-2.209,0-4,1.791-4,4v9H31V8Z" fill="#ea3323"></path>
                            <path d="M5,28H27c2.209,0,4-1.791,4-4v-8H1v8c0,2.209,1.791,4,4,4Z" fill="#fff"></path>
                            <path
                                d="M5,28H27c2.209,0,4-1.791,4-4V8c0-2.209-1.791-4-4-4H5c-2.209,0-4,1.791-4,4V24c0,2.209,1.791,4,4,4ZM2,8c0-1.654,1.346-3,3-3H27c1.654,0,3,1.346,3,3V24c0,1.654-1.346,3-3,3H5c-1.654,0-3-1.346-3-3V8Z"
                                opacity=".15"></path>
                            <path
                                d="M27,5H5c-1.657,0-3,1.343-3,3v1c0-1.657,1.343-3,3-3H27c1.657,0,3,1.343,3,3v-1c0-1.657-1.343-3-3-3Z"
                                fill="#fff" opacity=".2"></path>
                        </svg>
                        <span>ID</span>
                    </a>
                </div>

                <a class="button-nav" href="https://wa.me/6281315870596">
                    <button type="button"
                        class=" hidden bg-primary lg:block text-white hover:shadow-inner focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base px-8 py-2 text-center cursor-pointer">{{ __('two_go.nav.contact_button') }}</button>
                    <span class="sr-only">{{ __('two_go.nav.contact_button') }}</span>
                </a>

                <!-- Hamburger Button for Mobile -->
                <button data-collapse-toggle="menu" type="button" id="menu-btn"
                    class="inline-flex items-center p-2 ml-2 text-base text-gray-500 rounded-lg  lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 cursor-pointer"
                    aria-controls="menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>

            <div class="hidden flex-grow justify-between items-center w-full lg:flex lg:w-auto order-1 -mt-4 lg:-mt-0" id="menu">
                <ul class="navbar-nav nav flex flex-col mt-4 font-medium lg:flex-row lg:space-x-2 lg:mt-0">
                    <li class="nav-item">
                        <a href="#home"
                            class="nav-link text-base block text-gray-900 hover:bg-blue-100 w-full py-1.5 px-3 rounded active">{{ __('two_go.nav.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="#problem"
                            class="nav-link text-base block text-gray-900 hover:bg-blue-100 w-full py-1.5 px-3 rounded">{{ __('two_go.nav.problem') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="#solution"
                            class="nav-link text-base block text-gray-900 hover:bg-blue-100 w-full py-1.5 px-3 rounded">{{ __('two_go.nav.solution') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact"
                            class="nav-link text-base block text-gray-900 hover:bg-blue-100 w-full py-1.5 px-3 rounded">{{ __('two_go.nav.contact') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url($privacyUrl) }}"
                            class="nav-link text-base block text-gray-900 hover:bg-blue-100 w-full py-1.5 px-3 rounded">{{ __('two_go.nav.privacy') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
