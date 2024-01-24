<x-app-layout>
    <h3>Oferty Obserwowane</h3>
    {{--    @foreach($favourite as $favourite)--}}
    {{--        <x-offer-item :offer="$favourite" wire:key="{{$favourite->id}}"></x-offer-item>--}}
    {{--    @endforeach--}}
    @foreach($favourites as $favourite)
        <div class="bg-gray-500 text-white">
            <p>{{$favourite->id}}</p>
            <p>{{$favourite->name}}</p>
            <p>{{$favourite->shortDescription()}}</p>
        </div>
        <form method="post" action="{{route('favourite.destroy', $favourite->id)}}">
            @csrf
            @method('DELETE')
            <button type="submit">Usuń</button>
        </form>
    @endforeach
</x-app-layout>
