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
                <x-text-input id="expectancies" class="block mt-1 w-full" name="expectancies[]"
                              :value="old('expectancies')" autofocus autocomplete="expectancies"/>
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
