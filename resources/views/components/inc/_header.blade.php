{{-- @include('components.inc._top_header') --}}
<header class="bg-white  flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full sticky top-0">
    <nav
        class="relative container md:flex md:items-center md:justify-between md:gap-3 mx-auto px-4 sm:px-6 lg:px-0 py-4">
        <!-- Logo w/ Collapse Button -->
        <div class="flex items-center justify-between">
            <a class="flex-none font-semibold text-xl text-black focus:outline-none focus:opacity-80"
                href="{{ route('home') }}" aria-label="Brand">
                <img src="{{ asset('img/prsi.png') }}" alt="logo" class="w-16">
            </a>

            <!-- Collapse Button -->
            <div class="md:hidden">
                <button type="button"
                    class="hs-collapse-toggle relative size-9 flex justify-center items-center text-sm font-semibold rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none "
                    id="hs-header-classic-collapse" aria-expanded="false" aria-controls="hs-header-classic"
                    aria-label="Toggle navigation" data-hs-collapse="#hs-header-classic">
                    <svg class="hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" x2="21" y1="6" y2="6" />
                        <line x1="3" x2="21" y1="12" y2="12" />
                        <line x1="3" x2="21" y1="18" y2="18" />
                    </svg>
                    <svg class="hs-collapse-open:block shrink-0 hidden size-4" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                    <span class="sr-only">Toggle navigation</span>
                </button>
            </div>
            <!-- End Collapse Button -->
        </div>
        <!-- End Logo w/ Collapse Button -->

        <!-- Collapse -->
        <div id="hs-header-classic"
            class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block"
            aria-labelledby="hs-header-classic-collapse">
            <div
                class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 ">
                <div class="py-2 md:py-0 flex flex-col md:flex-row md:items-center md:justify-end gap-0.5 md:gap-1">
                    <x-custom.shared.ahref href="{{ route('home') }}" title="Beranda"
                        textSize="md"></x-custom.shared.ahref>
                    <x-custom.shared.ahref href="{{ route('blogs') }}" title="Berita"></x-custom.shared.ahref>
                    <x-custom.shared.ahref href="{{ route('galleries') }}" title="Galeri"></x-custom.shared.ahref>
                    <x-custom.shared.ahref href="{{ route('structural-organization') }}"
                        title="Struktur Organisasi"></x-custom.shared.ahref>
                    <x-custom.shared.ahref href="{{ route('contactus') }}" title="Kontak Kami"></x-custom.shared.ahref>
                    <x-custom.shared.ahref href="{{ route('timeline-calender') }}" title="Jadwal PRSI"></x-custom.shared.ahref>
                    <!-- End Dropdown -->

                    <!-- Button Group -->
                    <div
                        class="relative flex flex-wrap items-center gap-x-2 md:ps-2.5 mt-1 md:mt-0 md:ms-1.5 before:block before:absolute before:top-1/2 before:-start-px before:w-px before:h-4 before:bg-gray-300 before:-translate-y-1/2 ">
                        <x-custom.shared.ahref href="{{ route('membership') }}"
                            title="Daftar Anggota"></x-custom.shared.ahref>
                    </div>
                    <!-- End Button Group -->
                </div>
            </div>
        </div>
        <!-- End Collapse -->
    </nav>
</header>
