<x-app-layout>
    <div class="md:flex gap-x-6 p-3">
        {{-- Lewy panel --}}
        <div class="border-[1px] border-gray-300 dark:border-0 dark:bg-gray-800/50 p-6 w-3/4 rounded-lg">
            <div class="flex">
                <div class="w-36 l-36">
                    <img alt="{{$offer->slug}}" class="rounded-md object-cover" src="{{$offer->getURLImage()}}" />
                </div>
                <div class="pl-4">
                    <div class="flex items-center">
                        <h1 class="text-2xl text-gray-600 dark:text-gray-400">{{$offer->name}}</h1>
                        <h2 class="ml-64 text-right">{{$offer->formatedDate()}}</h2>
                    </div>
                    <div class="flex mt-4">
                        <p>{{$offer->category->name}}</p>
                        <p class="ml-7">{{$offer->employment->name}}</p>
                        <p class="ml-7">{{$offer->contract->name}}</p>
                    </div>
                    <div class="flex mt-4">
                        @if($offer->salary && $offer->payment_id)
                            <p>{{$offer->salary}} {{$offer->payment->name}}</p>
                        @else
                            <p>Cena do ustalenia</p>
                        @endif
                        <p class="ml-7">Wolne miejsca: {{$offer->vacancy}}</p>
                    </div>
                </div>
            </div>
{{--            <div class="pt-4">--}}
{{--                <p>{!! $offer->description !!}</p>--}}
{{--            </div>--}}
            <div>
                <h1>Job description</h1>
                <p>Jesteśmy Brand Active - agencja Shopify & eCommerce istniejąca na rynku od 2016 roku.Tworzymy i wdrażamy sklepy dostosowując je do aktualnych trendów i potrzeb naszych Klientów. Swoje działania koncentrujemy na platformie Shopify i Shopify Plus, zapewniamy też integracje z takimi systemami jak PIM,ERP,CRM czy POS. Podejście MACH, które praktykujemy, umożliwia naszym Klientom realizacje innowacyjnych projektów o wielopoziomowej architekturze. Stawiamy na dynamiczny rozwój czego potwierdzeniem jest m.in wyróżnienie w rankingu Delloite Technology Fast 50 (Raising Stars)</p>



                <h2 class="mt-6 font-bold">TWOIM ZADANIEM BĘDZIE</h2>

                <ul>
                    <li>implementacja customowych szablonów w Shopify</li>
                    <li>tworzenie customizacji w oparciu o Liquid Shopify</li>
                </ul>



                współpraca przy wdrażaniu customowych aplikacji w Shopify
                realizacja projektów dla polskich i globalnych marek


                NASZE OCZEKIWANIA:

                ponad dwa lata komercyjnego doświadczenia jako Frontend Developer
                min. roczne doświadczenie w pracy jako developer Shopify
                doświdczenie z JavaScript, CSS, SASS
                znajomość Figmy,API REST(podstawy)Git,
                doświadczenie z Liquid lub innym szablonem
                znajomość języka angielskiego w mowie i piśmie na poziomie B2


                MILE WIDZIANE:

                Znajomość React/jQuery/GraphQL/Node.js/MySql/TypeScript
                doświadczenie w konfiguracji aplikacji z Shopify app store


                ZAPEWNIAMY:

                kontrakt B2B lub umowę o pracę
                atrakcyjne wynagrodzenie (B2B: 60 - 85 zł/h net+VAT, UoP:8300 - 12000 zł brutto)
                rozwój w najnowszych technologiach eCommerce tj. Shopify Plus, PIM Akeneo, PWA
                ambitne globalne projekty eCommerce dla znanych marek
                możliwość rozwoju marki osobistej (publikacje, prelekcje)
                jasną kulturę organizacyjną i transparentną strategię
                lekcje języka angielskiego z native speakerem
                prywatną opiekę medyczną
                elastyczny system pracy
                pracę zdalnie/hybrydowo/z biura
            </div>
        </div>

        {{-- Prawy panel --}}
        <div class="border-[1px] border-gray-300 dark:border-0 dark:bg-gray-800/50 p-6 rounded-lg w-1/4">
            <div class="flex justify-center">
                @if($canNotApply == 'userMadeThisOffer')
                    <a href="{{route('offer.myoffers')}}" class="text-xl text-white bg-orange hover:bg-orange-500 p-4 rounded-2xl hover:bg-gray-800
                transition-colors transition-colors content-center">
                        ZOBACZ SZCZEGÓŁY TWOJEJ OFERTY
                    </a>
                @elseif($canNotApply == 'userHasApplied')
                    <h1>Twoja aplikacja została już nadana.</h1>
                    <form method="get" action="{{route('offer-application.index')}}">
                        <button type="submit" class="text-xl text-white bg-orange hover:bg-orange-500 p-4 rounded-2xl hover:bg-gray-800
                transition-colors transition-colors content-center">OBSERWUJ STATUS APLIKACJI</button>
                    </form>
                    @else
                    <a href="{{route('offer-application.create', $offer)}}" class="text-xl text-white bg-orange hover:bg-orange-500 p-4 rounded-2xl hover:bg-gray-800
                transition-colors transition-colors content-center">
                        APLIKUJ TERAZ
                    </a>
                @endif

            </div>
            <livewire:favourites-button :offer="$offer"/>
        </div>
    </div>
    @if($category_offers)
        <div class="gap-x-6 pl-3 pr-3 pb-3">
            <div class="p-6 bg-gray-200/50 dark:bg-gray-800/50 rounded-lg border-[1px] border-gray-300 dark:border-0">
                <h1>Polecane oferty o tej samej kategorii</h1>
                <div class="grid xl:col-span-4 lg:grid-cols-3 md:grid-cols-2 sm:col-span-1">
                    @foreach($category_offers as $offer_cat)
                        <x-offer-item :offer="$offer_cat"></x-offer-item>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
