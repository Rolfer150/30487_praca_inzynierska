<div>
    <h1>Widok (View)</h1>
    @foreach($daneKontroler as $rekord)
        @if($rekord->id == 2)
            <p style="color: green">{{$rekord->pole_tekstowe}}</p>
            <p style="color: green">{{$rekord->modyfikacjaDanych()}}</p>
        @else
            <p style="color: red">{{$rekord->pole_tekstowe}}</p>
            <p style="color: red">{{$rekord->modyfikacjaDanych()}}</p>
        @endif
        <br>
    @endforeach
</div>
