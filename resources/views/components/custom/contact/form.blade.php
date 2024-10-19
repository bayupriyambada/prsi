<form>
    <div class="grid gap-4">


        <div>
            <label for="name" class="sr-only">Name</label>
            <input type="text" name="name" id="name" autocomplete="name"
                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                placeholder="Name">
        </div>
        <div>
            <label for="hs-email-contacts-1" class="sr-only">Email</label>
            <input type="email" name="hs-email-contacts-1" id="hs-email-contacts-1" autocomplete="email"
                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                placeholder="Email">
        </div>

        <div>
            <label for="hs-phone-number-1" class="sr-only">Phone Number</label>
            <input type="text" name="hs-phone-number-1" id="hs-phone-number-1"
                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                placeholder="Phone Number">
        </div>

        <div>
            <label for="hs-about-contacts-1" class="sr-only">Details</label>
            <textarea id="hs-about-contacts-1" name="hs-about-contacts-1" rows="4"
                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                placeholder="Details"></textarea>
        </div>
    </div>
    <!-- End Grid -->

    <div class="mt-4 grid">
        <button type="submit"
            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Kirim
            Kontak</button>
    </div>
</form>
