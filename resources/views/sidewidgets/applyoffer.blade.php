<x-app-layout>
    <form method="POST" action="{{ route('sidewidgets.applystore') }}">
        @csrf
        <x-input-label for="name" :value="__('Imię')"/>
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus
                      autocomplete="name"/>
        <x-input-label for="email" :value="__('E-mail')"/>
        <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" autofocus
                      autocomplete="email"/>
        <x-input-label for="email" :value="__('Załączniki')"/>
        <x-text-input id="file" class="block mt-1 w-full" type="file" multiple="" name="file"/>

        <x-primary-button class="ml-3">
            {{ __('Potwierdź') }}
        </x-primary-button>
    </form>
</x-app-layout>
