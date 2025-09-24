<nav x-data="{ open: false }" class="bg-[#19191B] border-b border-[#19191B]">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center gap-1 shrink-0">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2 0.5H22C23.1046 0.5 24 1.39543 24 2.5V22.5C24 23.6046 23.1046 24.5 22 24.5H2C0.895431 24.5 0 23.6046 0 22.5V2.5C0 1.39543 0.895431 0.5 2 0.5ZM20.0607 10.9749C20.4512 10.5844 20.4512 9.95125 20.0607 9.56072L17.9394 7.43939C17.5489 7.04888 16.9157 7.04888 16.5252 7.43939L11.5 12.4645L8.47491 9.43939C8.08438 9.04888 7.45123 9.04888 7.0607 9.43939L4.93936 11.5607C4.54886 11.9513 4.54886 12.5844 4.93936 12.9749L10.7929 18.8285C11.1834 19.219 11.8166 19.219 12.2072 18.8285L20.0607 10.9749Z"
                            fill="#1349C3" />
                    </svg>


                    <h1 class="text-2xl font-bold text-white">ClickMail</h1>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('campaigns.index')" :active="request()->routeIs('campaigns.*')">
                        {{ __('Campaigns') }}
                    </x-nav-link>

                    <x-nav-link :href="route('email-list.index')" :active="request()->routeIs('email-list.*')">
                        {{ __('Email List') }}
                    </x-nav-link>

                    <x-nav-link :href="route('templates.index')" :active="request()->routeIs('templates.*')">
                        {{ __('Templates') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out bg-[#19191B] border border-transparent rounded-md hover:text-[#1349C3] focus:outline-none">

                            <span
                                class="flex items-center justify-center mr-2 overflow-hidden border rounded-md size-7 border-slate-300 bg-slate-100 text-slate-700/50">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                    fill="currentColor" class="w-full h-full mt-3">
                                    <path fill-rule="evenodd"
                                        d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>

                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('campaigns.index')" :active="request()->routeIs('campaigns.*')">
                {{ __('Campaigns') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('email-list.index')" :active="request()->routeIs('email-list.*')">
                {{ __('Email List') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('templates.index')" :active="request()->routeIs('templates.*')">
                {{ __('Templates') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
