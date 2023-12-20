<div class="dark:bg-gray-900 h-48 mt-6 hover:text-gray-300 rounded-lg rounded-lg border-[1px]
border-gray-300 dark:border-0 m-1">
    <a href="{{route('user.show', $user)}}">
        <div class="p-2 gap-4">
            <div class="pb-1 pl-2 flex items-center">
                <h3 class="w-1/2 text-lg text-gray-600 dark:text-gray-400">{{$user->name}}</h3>
                <h3 class="w-1/2 text-lg text-gray-600 dark:text-gray-400">{{$user->surname}}</h3>
            </div>
            <div class="right-0 pl-2">
{{--                <h3 class="text-gray-600 dark:text-gray-400">@if($offer->category_id)--}}
{{--                        {{$offer->category->name}}--}}
{{--                    @else--}}
{{--                        <p>Brak kategorii</p>--}}
{{--                    @endif</h3>--}}
{{--                <h3 class="text-gray-600 dark:text-gray-400">@if($offer->work_mode_id)--}}
{{--                        {{$offer->workMode->name}}--}}
{{--                    @else--}}
{{--                        <p>Brak trybu pracy</p>--}}
{{--                    @endif</h3>--}}
            </div>
        </div>
        <div class="p-2 flex items-center justify-center gap-2">
            <div class="pl-1 pr-1 w-20 l-20 bg-gray-200">
                <img class="rounded-md object-cover" alt="{{$user->slug}}" src="{{$user->getURLImage()}}"/>
            </div>
            {{--            <p class="text-gray-600 dark:text-gray-400">{{$offer->shortDescription()}}</p>--}}
        </div>
    </a>
</div>
