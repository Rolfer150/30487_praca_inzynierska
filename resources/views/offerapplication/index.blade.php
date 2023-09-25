<x-app-layout>
    <h3>Lista wysłanych aplikacji</h3>
    {{--    @foreach($favourite as $favourite)--}}
    {{--        <x-offer-item :offer="$favourite" wire:key="{{$favourite->id}}"></x-offer-item>--}}
    {{--    @endforeach--}}
    @foreach($applies as $apply)
        <div class="bg-gray-500 text-white">
            <p>{{$apply->id}}</p>
            <p>{{$apply->user->name}}</p>
            <p>{{$apply->offer->name}}</p>
            <p>{{$apply->status}}</p>
        </div>
        <form method="post" action="{{route('sidewidgets.applydestroy', $apply->id)}}">
            @csrf
            @method('DELETE')
            <button type="submit">Usuń</button>
        </form>
    @endforeach
</x-app-layout>
