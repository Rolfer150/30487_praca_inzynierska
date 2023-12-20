<div class="flex items-center" x-data="imagePreview()">
    <div class="rounded-full bg-gray-200 mr-3">
        @if($image)
            <img src="{{ $image }}" id="imagePreview"  alt="" class="rounded-full w-24 h-24 object-cover">
        @else
            <img src="{{ asset('storage/user/user-profile-default.jpg') }}" id="imagePreview"  alt="" class="w-24 h-24 rounded-full object-cover">
        @endif

    </div>
    <div>
        <x-primary-button  class="relative ml-2" @click="document.getElementById('image_path').click()">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                </svg>
                Dodaj zdjęcie profilowe
            </div>
            <input @change="showPreview(event)" type="file" accept="image/*" name="image_path" id="image_path" class="absolute inset-0 -z-10 opacity-0">
        </x-primary-button>

    </div>
    <script>
        function imagePreview() {
            return {
                showPreview: (event) => {
                    if (event.target.files.length > 0) {
                        document.getElementById('imagePreview').src = URL.createObjectURL(event.target.files[0]);
                    }
                }
            };
        }
    </script>
</div>
