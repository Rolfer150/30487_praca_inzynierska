<x-app-layout>
    <div class="h-[48vh]">
        <h1 class="font-bold font-sans text-7xl text-center m-16 text-gray-600 dark:text-white">Znajdź pracę już teraz</h1>
        <div class="mt-[12vh] pr-[24vh] pl-[24vh]">
            <livewire:searchbar/>
        </div>
    </div>
    <div class="sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-white dark:bg-gray-800
        dark:bg-dots-lighter selection:bg-red-500 selection:text-white">
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <h1 class="font-bold font-sans text-4xl text-center m-16 text-gray-600 dark:text-white">Najnowsze oferty</h1>
            <div class="col-span-5 w-full justify-items-center">
                @if($offers)
                    @foreach($offers as $offer)
                        <x-offer-item :offer="$offer"></x-offer-item>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
