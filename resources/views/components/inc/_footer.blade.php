<footer class="mt-auto w-full py-10 px-4 sm:px-6 lg:px-8 mx-auto bg-white ">
    <div class="mx-auto container">
        <!-- Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6 mb-10">
            <div class="col-span-full hidden lg:col-span-1 lg:block">
                <a class="flex-none font-semibold text-xl text-black focus:outline-none focus:opacity-80 "
                    href="{{ route('home') }}" wire:navigate aria-label="Brand">
                    <img src="{{ asset('img/prsi.png') }}" alt="logo-prsi" class="w-16">
                </a>
                <p class="mt-3 text-xs sm:text-sm text-gray-600 ">
                    © {{ date('Y') }} PRSI.
                </p>
            </div>
            <!-- End Col -->

            <div>
                <h4 class="text-xs font-semibold text-gray-900 uppercase ">
                    Produk PRSI
                </h4>

                <div class="mt-3 grid space-y-3 text-sm">
                    <p>
                        <a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 "
                            href="#">Kompetisi</a>
                    </p>
                    <p>
                        <a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 "
                            href="#">Edukasi</a>
                    </p>
                    <p>
                        <a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 "
                            href="#">Galeri</a>
                    </p>

                </div>
            </div>
            <!-- End Col -->

            <div>
                <h4 class="text-xs font-semibold text-gray-900 uppercase ">
                    Kompetisi
                </h4>

                <div class="mt-3 grid space-y-3 text-sm">
                    <p>
                        <a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 "
                            href="#">Tim Umum</a>
                    </p>


                </div>
            </div>
            <!-- End Col -->

            <div>
                <h4 class="text-xs font-semibold text-gray-900 uppercase ">
                    Sejarah PRSI
                </h4>

                <div class="mt-3 grid space-y-3 text-sm">
                    <p>
                        <a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 "
                            href="#">Sejarah</a>
                    </p>
                    <p>
                        <a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 "
                            href="#">Asosisasi PRSI</a>
                    </p>
                    <p>
                        <a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 "
                            href="#">Struktur Organisasi</a>
                    </p>

                </div>
            </div>
            <!-- End Col -->
            <div>
                <h4 class="text-xs font-semibold text-gray-900 uppercase ">
                    Sosial Media
                </h4>

                <div class="mt-3 grid space-y-3 text-sm">
                    <p>
                        <a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 "
                            href="#">Instagram</a>
                    </p>
                    <p>
                        <a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 "
                            href="#">Youtube</a>
                    </p>
                    <p>
                        <a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 "
                            href="#">X</a>
                    </p>

                </div>
            </div>
            <!-- End Col -->


        </div>
        <!-- End Grid -->
    </div>
</footer>
