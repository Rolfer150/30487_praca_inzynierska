<x-app-layout>
    <div class="md:flex gap-x-6 p-6 rounded-md">
        {{-- Lewy panel --}}
        <div class="bg-gray-200/50 dark:bg-gray-800/50 p-6 w-3/4">
            <div class="flex">
                <div class="w-36 l-36">
                    <img class="rounded-full object-cover" src="{{$offer->getURLImage()}}" />
                </div>
                <div class="pl-4">
                    <h1 class="text-2xl text-gray-600 dark:text-gray-400">{{$offer->name}}</h1>
                </div>
            </div>
            <div class="pt-4">
                <p>{{$offer->description}}</p>
            </div>
        </div>

        {{-- Prawy panel --}}
        <div class="bg-gray-200/50 dark:bg-gray-800/50 p-6 rounded-md w-1/4">
            <div class="flex justify-center">
                <button class="text-xl text-gray-200 dark:text-gray-800 bg-gray-700/50 dark:bg-gray-100/50 p-4
                rounded-2xl hover:bg-gray-800 transition-colors dark:hover:bg-gray-100 transition-colors content-center">
                    APLIKUJ TERAZ
                </button>
            </div>
            <div class="flex items-center justify-center pt-4">
                <p>Zapisz</p>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="moon cursor-pointer w-6 h-6 ml-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                </svg>
            </div>
            <div class="flex items-center justify-center pt-4">
                <p>Udostępnij</p>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 cursor-pointer h-6 ml-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
                </svg>
            </div>
        </div>
    </div>
</x-app-layout>
