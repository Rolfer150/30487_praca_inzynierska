<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Znajdziesz tutaj wymarzoną pracę') }}
        </h1>
    </x-slot>
    <div class="sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100
        dark:bg-dots-lighter dark:bg-gray-800 selection:bg-red-500 selection:text-white">

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            {{--  <x-application-logov2 />  --}}
            <div class="col-span-5 w-full justify-items-center">
                <img src="{{asset('storage/zagadnienia.jpg')}}">
                @if($offers)
                    @foreach($offers as $offer)
                        <x-offer-item :offer="$offer"></x-offer-item>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
