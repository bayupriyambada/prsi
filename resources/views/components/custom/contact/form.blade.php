{{-- @props(['contact' => []]) --}}

<form wire:submit.prevent="save()">
    <div class="grid gap-4">
        <div>
            <label for="name" class="sr-only">Nama Lengkap</label>
            <input type="text" id="name" 
                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                placeholder="Nama Lengkap" wire:model.live="name">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="hs-email-contacts-1" class="sr-only">Email</label>
            <input type="email" id="hs-email-contacts-1"
                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                placeholder="Email" wire:model.live="email">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="hs-subject-contacts-1" class="sr-only">Subjek</label>
            <input type="subject"  id="hs-subject-contacts-1" 
                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                placeholder="Subjek" wire:model.live="subject">
            @error('subject') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="hs-about-contacts-1" class="sr-only">Deskripsi</label>
            <textarea id="hs-about-contacts-1" rows="4"
                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                placeholder="Deskripsi" wire:model.live="message"></textarea>
            @error('message') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>
    <!-- End Grid -->

    <div class="mt-4 grid">
        <button type="submit"
            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Kirim
            Pertanyaan</button>
    </div>
</form>
