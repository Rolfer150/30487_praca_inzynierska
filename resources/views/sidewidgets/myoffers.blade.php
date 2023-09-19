<x-app-layout>
    <h3>Lista Twoich ogłoszeń o pracę</h3>
    {{--    @foreach($favourites as $favourite)--}}
    {{--        <x-offer-item :offer="$favourite" wire:key="{{$favourite->id}}"></x-offer-item>--}}
    {{--    @endforeach--}}
    @foreach($myOffers as $offer)
        <div class="bg-gray-500 text-white">
            <p>{{$offer->id}}</p>
            <p>{{$offer->user->name}}</p>
            <p>{{$offer->category->name}}</p>
            <p>{{$offer->salary}}</p>
        </div>
{{--        <form method="post" action="{{route('sidewidgets.applydestroy', $apply->id)}}">--}}
{{--            @csrf--}}
{{--            @method('DELETE')--}}
{{--            <button type="submit">Usuń</button>--}}
{{--        </form>--}}
    @endforeach
</x-app-layout>
