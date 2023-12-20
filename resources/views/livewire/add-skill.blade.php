<div>
    @foreach($skillArray as $index => $skill)
        <div class="flex items-center mt-3 gap-3">
            <div class="w-2/5">
                <x-input-label for="skills[skill]" :value="__('Umiejętności')" />
                <select wire:model="skillArray.{{ $index }}" placeholder="Wybierz Twoje umiejętności..." id="skills[skill]" name="skills[{{$index}}][skill]" :value="old('skills[skill]', $user->skills[skill])" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                    @foreach($skills as $skill)
                        <option  value="{{$skill->value}}">{{$skill->value}}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('skills[skill]')" />
            </div>

            <div class="w-2/5">
                <x-input-label for="skills[skillLevel]" :value="__('Poziom')" />
                <select wire:model="skillLevelArray.{{ $index }}" placeholder="Wybierz poziom Twojej umiejętności..." id="skills[skillLevel]" name="skills[{{$index}}][skillLevel]" :value="old('skills[skillLevel]', $user->skills[skillLevel])" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                    @foreach($skillLevel as $skillLvl)
                        <option value="{{$skillLvl->value}}">{{$skillLvl->value}}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('skills[skillLevel]')" />
            </div>
            <x-secondary-button class="w-1/5 mt-6 justify-center" wire:click.prevent="removeSkill({{ $index }})">Usuń</x-secondary-button>
        </div>
    @endforeach
        <x-secondary-button class="w-1/5 mt-6 justify-center" wire:click.prevent="addSkill">+</x-secondary-button>
</div>
