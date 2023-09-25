<div>
    <div class="bg-white dark:bg-gray-800/50">
        <x-input-label for="question" :value="__('Pytanie nr ' . $questionCounter)"/>
        <x-text-input id="question" class="block mt-1 w-full" type="text" name="question" :value="old('question')"
                      required autofocus autocomplete="question"/>
        <x-input-error :messages="$errors->get('question')" class="mt-2"/>
    </div>

{{--    <div class="bg-white dark:bg-gray-800/50">--}}
{{--        <x-input-label for="category" :value="__('Kategoria')"/>--}}
{{--        <select name="category"--}}
{{--                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">--}}
{{--            <option>Brak</option>--}}
{{--            @foreach($categories as $category)--}}
{{--                <option value="{{$category->id}}">{{$category->name}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--        <x-input-error :messages="$errors->get('category')" class="mt-2"/>--}}
{{--    </div>--}}
</div>
