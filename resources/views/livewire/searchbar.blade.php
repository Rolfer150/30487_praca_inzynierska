<div>
    <div class="p-3 flex" wire:model="search">
        <input type="text" placeholder="Szukaj oferty pracy..."
               class="w-full focus:border-orange-500 focus:ring-orange-500
                   focus:ring-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-400 placeholder-gray-500
                   border-gray-300 dark:border-0 rounded-lg">
        <button wire:click="offerRender" class="ml-4 pl-3 pr-3 text-white rounded-lg bg-orange hover:bg-orange-500"
                type="submit">Wyszukaj
        </button>
    </div>
    <div class="flex justify-center">
        <label for="offersCheck" class="mr-8">
            <input id="offerCheck" type="checkbox" checked class="rounded-md text-orange-600 dark:checked:bg-orange-500
            bg-white dark:bg-gray-900 ring-offset-0 focus:ring-orange-500 dark:ring-offset-gray-800">Oferty Pracy
        </label>
        <label for="companiesCheck" class="mr-8">
            <input id="companiesCheck" type="checkbox" class="rounded-md text-orange-600 dark:checked:bg-orange-500
            bg-white dark:bg-gray-900 ring-offset-0 focus:ring-orange-500 dark:ring-offset-gray-800">Firmy
        </label>
        <label for="usersCheck" class="mr-8">
            <input id="usersCheck" type="checkbox" class="rounded-md text-orange-600 dark:checked:bg-orange-500 bg-white
            dark:bg-gray-900 ring-offset-0 focus:ring-orange-500 dark:ring-offset-gray-800">Użytkownicy
        </label>
    </div>
</div>
