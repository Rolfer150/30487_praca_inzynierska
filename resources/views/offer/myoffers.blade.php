<x-app-layout>
    <h3>Lista Twoich ogłoszeń o pracę</h3>
    <a href="{{route('offer.create')}}">Dodaj Ofertę</a>
    <div class="grid grid-cols-2">
        @foreach($myOffers as $offer)
            <x-offer-item :offer="$offer" wire:key="{{$offer->id}}" class=""></x-offer-item>
        @endforeach
    </div>
</x-app-layout>
