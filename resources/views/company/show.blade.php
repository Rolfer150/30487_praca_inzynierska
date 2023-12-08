<x-app-layout>
    <div class="md:flex gap-x-6 p-3">
        {{-- Lewy panel --}}
        <div class="border-[1px] border-gray-300 dark:border-0 dark:bg-gray-800/50 p-6 w-3/4 rounded-lg">
            <div class="flex">
                <div class="w-36 l-36">
                    <img alt="{{$company->slug}}" class="rounded-md object-cover" src="{{$company->getURLImage()}}" />
                </div>
                <div class="pl-4">
                    <div class="flex items-center">
                        <h1 class="text-2xl text-gray-600 dark:text-gray-400">{{$company->name}}</h1>
                    </div>
                    <div class="flex mt-4">
                        @foreach($company->brands as $brand)
                            <p class="ml-7">{{$brand->name}}</p>
                        @endforeach
                    </div>
                    <div class="flex mt-4">
                        <p class="ml-7">Liczba pracowników: {{$company->employees_amount}}</p>
                    </div>
                </div>
                <div class="pl-4">
                    <div class="flex items-center">
                        <h1 class="text-2xl text-gray-600 dark:text-gray-400">Adres</h1>
                    </div>
                    <div class="flex mt-4">
                        <div>
                            <p class="ml-7">{{$street}}</p>
                            <p class="ml-7">{{$home_nr}}</p>
                        </div>
                        <div>
                            <p class="ml-7">{{$zip_code}}</p>
                            <p class="ml-7">{{$city}}</p>
                        </div>

                    </div>
                </div>
            </div>
            {{--            <div class="pt-4">--}}
            {{--                <p>{!! $offer->description !!}</p>--}}
            {{--            </div>--}}
            <div>
                <h1 class="mt-6 font-bold">Opis pracy</h1>
                <p>{{$company->description}}</p>
            </div>
        </div>

        {{-- Prawy panel --}}
        <div class="border-[1px] border-gray-300 dark:border-0 dark:bg-gray-800/50 p-6 rounded-lg w-1/4">
{{--            <div class="flex justify-center">--}}
{{--                @if($canNotApply == 'userMadeThisOffer')--}}
{{--                    <a href="{{route('offer.myoffers')}}" class="text-xl text-white bg-orange hover:bg-orange-500 p-4 rounded-2xl hover:bg-gray-800--}}
{{--                transition-colors transition-colors content-center">--}}
{{--                        ZOBACZ SZCZEGÓŁY TWOJEJ OFERTY--}}
{{--                    </a>--}}
{{--                @elseif($canNotApply == 'userHasApplied')--}}
{{--                    <h1>Twoja aplikacja została już nadana.</h1>--}}
{{--                    <form method="get" action="{{route('offer-application.index')}}">--}}
{{--                        <button type="submit" class="text-xl text-white bg-orange hover:bg-orange-500 p-4 rounded-2xl hover:bg-gray-800--}}
{{--                transition-colors transition-colors content-center">OBSERWUJ STATUS APLIKACJI</button>--}}
{{--                    </form>--}}
{{--                @else--}}
{{--                    <a href="{{route('offer-application.create', $offer)}}" class="text-xl text-white bg-orange hover:bg-orange-500 p-4 rounded-2xl hover:bg-gray-800--}}
{{--                transition-colors transition-colors content-center">--}}
{{--                        APLIKUJ TERAZ--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--            </div>--}}
{{--            <livewire:favourites-button :offer="$offer"/>--}}
        </div>
    </div>
    @if($company_brands)
        <div class="gap-x-6 pl-3 pr-3 pb-3">
            <div class="p-6 bg-gray-200/50 dark:bg-gray-800/50 rounded-lg border-[1px] border-gray-300 dark:border-0">
                <h1>Polecane firmy o podobnych branżach</h1>
                <div class="grid xl:col-span-4 lg:grid-cols-3 md:grid-cols-2 sm:col-span-1">
                    @foreach($company_brands as $com_brand)
                        <x-offer-item :offer="$com_brand"></x-offer-item>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
