<div class="dark:bg-gray-900 h-48 mt-6 hover:text-gray-300 rounded-lg rounded-lg border-[1px]
border-gray-300 dark:border-0 m-1">
    <a href="{{route('company.show', $company)}}">
        <div class="p-2 gap-4">
            <div class="pb-1 pl-2 flex items-center">
                <img class="h-20 w-20 rounded-full object-cover mr-3" alt="{{$company->slug}}" src="{{$company->getURLImage()}}"/>
                <h3 class="w-3/4 text-lg text-gray-600 dark:text-gray-400">{{$company->name}}</h3>
                {{--                <h3 class="w-1/4 text-gray-600 dark:text-gray-400">@if($company->salary)--}}
                {{--                        {{$offer->salary}} zł/--}}
                {{--                        @if($offer->payment)--}}
                {{--                            {{$offer->payment}}--}}
                {{--                        @endif--}}
                {{--                    @else--}}
                {{--                        <p>Wypłata do ustalenia</p>--}}
                {{--                    @endif</h3>--}}
                {{--                <h3 class="w-1/4 text-gray-600 dark:text-gray-400">@if($offer->employment_id)--}}
                {{--                        {{$offer->employment->name}}--}}
                {{--                    @else--}}
                {{--                        <p>Brak umowy o pracę</p>--}}
                {{--                    @endif</h3>--}}
            </div>
            <div class="right-0 pl-2">
                <h3 class="text-gray-600 dark:text-gray-400"> {{$company->email}}</h3>
                @foreach($company->categories as $category)
                    <h3 class="text-gray-600 dark:text-gray-400"> {{$category->name}}</h3>
                @endforeach

            </div>
        </div>
        <div class="p-2 flex items-center justify-center gap-2">
            <div class="pl-1 pr-1 w-20 l-20 bg-gray-200">

            </div>
            {{--            <p class="text-gray-600 dark:text-gray-400">{{$offer->shortDescription()}}</p>--}}
        </div>
    </a>
</div>
