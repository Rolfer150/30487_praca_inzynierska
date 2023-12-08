<div class="hidden sm:flex sm:items-center sm:ml-6">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium
            rounded-md text-white bg-orange hover:bg-orange-500 focus:outline-none transition ease-in-out duration-150">
                <div>
                    @if(Auth::user()->getURLImage())
                        <img src="{{ Auth::user()->getURLImage() }}" alt="" class="w-8 h-8 rounded-full object-cover mr-3">
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    @endif
                </div>

                <div class="ml-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414
                        1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            <x-dropdown-link :href="route('profile.show', Auth::user()->id)">
                {{ __('Profil') }}
            </x-dropdown-link>

            <x-dropdown-link :href="route('notification.index')">
                {{  __('Powiadomienia') }}
            </x-dropdown-link>

            <x-dropdown-link :href="route('offer.myoffers')">
                {{ __('Moje Oferty') }}
            </x-dropdown-link>

            <x-dropdown-link :href="route('questionnaire.index')">
                {{__('Ankiety')}}
            </x-dropdown-link>

            <x-dropdown-link :href="route('favourite.index')">
                {{ __('Obserwowane') }}
            </x-dropdown-link>

            <x-dropdown-link :href="route('offer-application.index')">
                {{ __('Moje Aplikacje') }}
            </x-dropdown-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Wyloguj się') }}
                </x-dropdown-link>
            </form>
        </x-slot>
    </x-dropdown>
</div>
