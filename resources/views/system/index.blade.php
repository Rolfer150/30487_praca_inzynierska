<x-app-layout>
    <p>Cześć, tu jest system</p>
    <p>{{$currentUser->surname}}</p>
    @foreach($offers as $offer)
        <p>{{$offer->name}}</p>
    @endforeach

    <p> {{ $message }} </p>
</x-app-layout>
