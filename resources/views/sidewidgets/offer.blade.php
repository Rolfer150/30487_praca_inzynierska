<x-app-layout>
<div>
    <h2 class="text-gray-900 dark:text-gray-400">Najnowsze oferty</h2>
    <div class="md:flex gap-x-2">
        <div class="p-6 w-1/5 bg-gray-200/50 dark:bg-gray-800/50">
            <p>Część</p>
        </div>
        <div class="w-4/5 grid p-6 space-x-2 xl:col-span-3 lg:grid-cols-2 md:grid-cols-1 sm:col-span-1 bg-gray-200/50 dark:bg-gray-800/50">
            @foreach($new_offers as $offer)
                <x-offer-item :offer="$offer"></x-offer-item>
            @endforeach
        </div>
    </div>
</div>
</x-app-layout>
