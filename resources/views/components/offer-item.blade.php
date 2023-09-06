<div class="dark:bg-gray-900 h-48 mt-6 hover:text-gray-300 rounded-lg rounded-lg border-[1px]
border-gray-300 dark:border-0 m-1">
    <a href="{{route('sidewidgets.show', $offer)}}">
        <div class="p-2 gap-4">
            <div class="pb-1 pl-2 flex items-center">
                <h3 class="w-3/4 text-lg text-gray-600 dark:text-gray-400">{{$offer->name}}</h3>
                <h3 class="w-1/4 text-gray-600 dark:text-gray-400">@if($offer->salary) {{$offer->salary}} zł/
                    @if($offer->payment){{$offer->payment}}@endif @else Wypłata do ustalenia @endif</h3>
                <h3 class="w-1/4 text-gray-600 dark:text-gray-400">{{$offer->employment->name}}</h3>
            </div>
            <div class="right-0 pl-2">
                <h3 class="text-gray-600 dark:text-gray-400">@if($offer->category->name)
                        {{$offer->category->name}}@else Brak kategorii @endif</h3>
                <h3 class="text-gray-600 dark:text-gray-400">{{$offer->workmode->name}}</h3>
            </div>
        </div>
        <div class="p-2 flex items-center justify-center gap-2">
            <div class="pl-1 pr-1 w-20 l-20 bg-gray-200">
                <img class="rounded-md object-cover" alt="{{$offer->slug}}" src="{{$offer->getURLImage()}}" />
            </div>
            {{--            <p class="text-gray-600 dark:text-gray-400">{{$offer->shortDescription()}}</p>--}}
        </div>
    </a>
</div>
