<x-app-layout>
    <div class="md:flex gap-x-2 p-3">
        {{--    Lewy Panel    --}}
        <livewire:search/>
        {{--    Prawy Panel    --}}
        <div class="w-3/4 p-3 bg-white dark:bg-gray-800/50 rounded-lg">
            <form method="get" action="{{route('sidewidgets.search')}}">
                <div class="p-3 flex">
                    <input type="text" name="q" placeholder="Szukaj..." class="w-full focus:border-orange-500 focus:ring-orange-500
                focus:ring-1 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-400 placeholder-gray-500
                border-gray-300 dark:border-0 rounded-lg">
                    <button class="ml-4 pl-3 pr-3 text-white rounded-lg bg-orange hover:bg-orange-500" type="submit">
                        Wyszukaj
                    </button>
                </div>
            </form>

            <div class="p-3">
                <h2 class="text-2xl text-gray-900 dark:text-gray-400">Szukana fraza: {{$q}}</h2>
                <div class=" space-x-3 grid xl:col-span-3 lg:grid-cols-2 md:grid-cols-1 sm:col-span-1">
                    @foreach($searched_offers as $offer)
                        <x-offer-item :offer="$offer"></x-offer-item>
                    @endforeach
                </div>
                <div class="m-2">
                    {{$searched_offers->links()}}
                </div>
            </div>
        </div>
    </div>

    <script>
        var slider = document.getElementById("range");
        var output = document.getElementById("showValue");
        output.innerHTML = slider.value;

        slider.oninput = function () {
            output.innerHTML = this.value;
        }
    </script>

</x-app-layout>
