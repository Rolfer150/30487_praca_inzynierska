<div class="bg-white dark:bg-gray-800/50 h-48 mt-6 px-4">
    <a href="{{route('sidewidgets.show', $offer->id)}}">
        <div class="p-2 flex gap-4 bg-yellow-600">
            <div class="pb-1 pl-2 bg-red-800">
                <h3 class="text-gray-600 dark:text-gray-400">{{$offer->name}}</h3>
                <h3 class="text-gray-600 dark:text-gray-400">@if($offer->category->name) {{$offer->category->name}}@else Brak kategorii @endif</h3>
            </div>
            <div class="right-0 bg-red-500">
                <h3 class="text-gray-600 dark:text-gray-400">@if($offer->salary) {{$offer->salary}} zł/ @if($offer->payment_id){{$offer->payment->name}}@endif @else Wypłata do ustalenia @endif</h3>
            </div>
        </div>
        <div class="p-2 bg-yellow-300 flex items-center justify-center gap-2 bg-blue-700">
            <div class="pl-1 pr-1 w-20 bg-green-500">
                <img class="rounded-full object-cover" src="{{$offer->getURLImage()}}" />
            </div>
{{--            <p class="text-gray-600 dark:text-gray-400">{{$offer->shortDescription()}}</p>--}}
        </div>
    </a>
</div>
