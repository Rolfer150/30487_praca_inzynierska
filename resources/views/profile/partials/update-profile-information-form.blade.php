<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Informacje o Twoim profilu') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Zaktualizuj informacje o Twoim profilu korzystając z poniższych opcji.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="mt-3">
            <x-input-label for="image_path" :value="__('Zdjęcie profilowe')" />
            <x-image-input :image="$user->getURLImage()"></x-image-input>
            <x-input-error class="mt-2" :messages="$errors->get('image_path')" />
        </div>
        <div class="flex">

            <div class="w-1/2 pr-2">

                <div class="mt-3">
                    <x-input-label for="name" :value="__('Imię')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" placeholder="Wpisz imię..."/>
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div class="mt-3">
                    <x-input-label for="surname" :value="__('Nazwisko')" />
                    <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full" :value="old('surname', $user->surname)" required autofocus autocomplete="surname" placeholder="Wpisz nazwisko..."/>
                    <x-input-error class="mt-2" :messages="$errors->get('surname')" />
                </div>

                <div class="mt-3">
                    <x-input-label for="email" :value="__('Adres e-mail')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" placeholder="Wpisz adres e-mail..."/>
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="flex mt-3">

                    <div class="mr-3 w-1/2">
                        <x-input-label for="education" :value="__('Wykształcenie')" />
                        <x-simple-select :options="$education" :searchable="false" placeholder="Wybierz Twoje wykształcenie" id="education" name="education" :value="old('education', $user->education)" class="mt-1 block w-full"></x-simple-select>
                        <x-input-error class="mt-2" :messages="$errors->get('education')" />
                    </div>

                    <div class="w-1/2">
                        <x-input-label for="school" :value="__('Szkoła')" />
                        <x-text-input id="school" name="school" type="text" class="mt-1 block w-full" :value="old('school', $user->school)" required autofocus autocomplete="school" placeholder="Wpisz nazwę ukończonej szkoły..." />
                        <x-input-error class="mt-2" :messages="$errors->get('school')" />
                    </div>
                </div>

                <div class="w-1/2">
                    <x-input-label for="birth_date" :value="__('Data urodzenia')" />
                    <x-input-date id="birth_date" name="birth_date" type="date" class="mt-1 block w-full" value="{{$user->birth_date}}" required autofocus autocomplete="birth_date" />
                    <x-input-error class="mt-2" :messages="$errors->get('birth_date')" />
                </div>

                <div class="mr-3 w-1/2">
                    <x-input-label for="brand" :value="__('Branża zawodowa')" />
                    <x-simple-select :options="$brands" multiple="brands" :searchable="false" placeholder="Wybierz Twoje wykształcenie" id="brands" name="brands"  class="mt-1 block w-full"></x-simple-select>
                    <x-input-error class="mt-2" :messages="$errors->get('education')" />
                </div>
            </div>

            <div class="w-1/2 pl-2 mt-3">
                <div>
                    <x-input-label for="phone_number" :value="__('Numer telefonu')" />
                    <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" :value="old('phone_number', $user->phone_number)" required autofocus autocomplete="phone_number" placeholder="Wpisz numer telefonu..." />
                    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                </div>

                <div class="mt-3">
                    <div class="flex mt-3">
                        <div class="w-4/5 mr-3">
                            <x-input-label for="address[street]" :value="__('Ulica')" />
                            <x-text-input id="address[street]" name="address[street]" type="text" class="mt-1 block w-full" :value="old('address[street]', $user->address['street'])" required autofocus autocomplete="address[street]" placeholder="Wpisz nazwę ulicy..." />
                            <x-input-error class="mt-2" :messages="$errors->get('address[street]')" />
                        </div>
                        <div class="w-1/5">
                            <x-input-label for="address[home_nr]" :value="__('Nr domu')" />
                            <x-text-input id="address[home_nr]" name="address[home_nr]" type="text" class="mt-1 block w-full" :value="old('address[home_nr]', $user->address['home_nr'])" required autofocus autocomplete="address[home_nr]" placeholder="Wpisz numer domu..." />
                            <x-input-error class="mt-2" :messages="$errors->get('address[home_nr]')" />
                        </div>
                    </div>

                    <div class="flex mt-3">
                        <div class="w-1/5">
                            <x-input-label for="address[zip_code]" :value="__('Kod pocztowy')" />
                            <x-text-input id="address[zip_code]" name="address[zip_code]" type="text" class="mt-1 block w-full" :value="old('address[zip_code]', $user->address['zip_code'])" required autofocus autocomplete="address[zip_code]" placeholder="Wpisz kod pocztowy..." />
                            <x-input-error class="mt-2" :messages="$errors->get('address[zip_code]')" />
                        </div>
                        <div class="w-4/5 ml-3">
                            <x-input-label for="address[city]" :value="__('Miejscowość')" />
                            <x-text-input id="address[city]" name="address[city]" type="text" class="mt-1 block w-full" :value="old('address[city]', $user->address['city'])" required autofocus autocomplete="address[city]" placeholder="Wpisz nazwę miasta..." />
                            <x-input-error class="mt-2" :messages="$errors->get('address[city]')" />
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <x-input-label for="short_description" :value="__('Krótki opis')" />
                    <x-text-input id="short_description" name="short_description" type="text" class="mt-1 block w-full" :value="old('short_description', $user->short_description)" required autofocus autocomplete="short_description" placeholder="Podaj krótki opis..." />
                    <x-input-error class="mt-2" :messages="$errors->get('short_description')" />
                </div>
            </div>
        </div>

        <div class="mt-3">
            <x-input-label for="description" :value="__('Szczegółowy opis')" />
            <x-input-textarea id="description" name="description" type="text" class="mt-1 block w-full" value="{{$user->description}}" required autofocus autocomplete="description" placeholder="Podaj opis..." />
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
