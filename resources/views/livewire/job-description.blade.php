<div>
    @foreach($jobDescriptions['tasks'] as $key => $value)
        <div class="flex">
            <div class="bg-white dark:bg-gray-800/50">
                <x-input-label for="tasks" :value="__('Zadania dla pracownika')"/>

                <x-text-input id="tasks" class="block mt-1 w-full" name="tasks[]"
                              :value="old('tasks')" autofocus autocomplete="tasks" wire:model="jobDescriptions.{{$key}}.name"/>
                <x-input-error :messages="$errors->get('tasks')" class="mt-2"/>
            </div>
            <button wire:click.prevent="addDescription('tasks')">Dodaj</button>
        </div>
    @endforeach
    @foreach($jobDescriptions['expectancies'] as $expectancy)
        <div class="flex">
            <div class="bg-white dark:bg-gray-800/50">
                <x-input-label for="expectancies" :value="__('Twoje oczekiwania')"/>
                <div class="flex gap-3">
                    <select id="expectancies_skill" name="expectancies[]" placeholder="Wybierz Twoje oczekiwania..." class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                        @foreach($expectancies as $expect)
                            <option value="{{$expect->value}}">{{$expect->value}}</option>
                        @endforeach
                    </select>
                    <select id="expectancies_skill_level" name="expectancies[]" placeholder="Wybierz Twoje oczekiwania..." class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                        @foreach($skillLevel as $skillLvl)
                            <option value="{{$skillLvl->value}}">{{$skillLvl->value}}</option>
                        @endforeach
                    </select>
                </div>
                <x-input-error :messages="$errors->get('expectancies')" class="mt-2"/>
            </div>
            <button wire:click.prevent="addDescription('expectancies')">Dodaj</button>
        </div>
    @endforeach
    @foreach($jobDescriptions['additionals'] as $additional)
        <div class="flex">
            <div class="bg-white dark:bg-gray-800/50">
                <x-input-label for="additionals" :value="__('Dodatkowe umiejętności pracownika')"/>
                <x-text-input id="additionals" class="block mt-1 w-full" name="additionals[]"
                              :value="old('additionals')" autofocus autocomplete="additionals"/>
                <x-input-error :messages="$errors->get('additionals')" class="mt-2"/>
            </div>
            <button wire:click.prevent="addDescription('additionals')">Dodaj</button>
        </div>
    @endforeach
    @foreach($jobDescriptions['assurances'] as $assurance)
        <div class="flex">
            <div class="bg-white dark:bg-gray-800/50">
                <x-input-label for="assurances" :value="__('Twoje zapewnienia dla pracownika')"/>
                <x-text-input id="assurances" class="block mt-1 w-full" name="assurances[]"
                              :value="old('assurances')" autofocus autocomplete="assurances"/>
                <x-input-error :messages="$errors->get('assurances')" class="mt-2"/>
            </div>
            <button wire:click.prevent="addDescription('assurances')">Dodaj</button>
        </div>
    @endforeach
</div>
