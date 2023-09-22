<x-app-layout>
    <h3>Powiadomienia</h3>
        @foreach(auth()->user()->notifications as $notification)
            <label>{{ $notification->data['title']}}</label>
            <p>{{ $notification->created_at }} {{$notification->data['description']}}</p>
        @endforeach
</x-app-layout>
