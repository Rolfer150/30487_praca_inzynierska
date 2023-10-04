<x-app-layout>
    <div class="flex space-x-3">
        <h1>Lista Ankiet</h1>
        <a href="{{route('questionnaire.create')}}">Dodaj Ankietę</a>
    </div>
    <div>
        @foreach($questionnaires as $questionnaire)
            <p>{{$questionnaire->name}}</p>
            <a href="{{ route('questionnaire.edit', $questionnaire->name) }}">
                <button class="btn btn-success btn-sm">Edytuj Ankietę</button>
            </a>
        @endforeach
    </div>
</x-app-layout>
