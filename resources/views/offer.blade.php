<x-app-layout>
<div>
    <h2 class="text-gray-900 dark:text-gray-400">Najnowsze oferty</h2>
    <div class="grid xl:col-span-5 lg:grid-cols-4 md:grid-cols-3 sm:col-span-1">
    @foreach($new_offers as $offer)
        <x-offer-item :offer="$offer"></x-offer-item>
    @endforeach
    </div>
</div>
</x-app-layout>
