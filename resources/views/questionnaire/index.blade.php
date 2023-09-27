<x-app-layout>
    <div class="flex space-x-3">
        <h1>Lista Ankiet</h1>
        <a href="{{route('livewire.questionnaire')}}">Dodaj Ankietę</a>
    </div>
    <div>
        @foreach($questionnaires as $questionnaire)
            <p>{{$questionnaire->name}}</p>
        @endforeach
    </div>
</x-app-layout>
