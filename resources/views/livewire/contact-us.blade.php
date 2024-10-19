@section('title', 'Contact Us')
<div>
    <!-- Contact Us -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="max-w-2xl lg:max-w-5xl mx-auto">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-800 sm:text-4xl ">
                    Kontak Kami
                </h1>
                <p class="mt-1 text-gray-600 ">
                    Sampaikan informasi kepada PRSI.
                </p>
            </div>

            <div class="mt-12 grid items-center lg:grid-cols-2 gap-6 lg:gap-16">
                <!-- Card -->
                <div class="flex flex-col border rounded-xl p-4 sm:p-6 lg:p-8 col-span-2 ">
                    <div class="mb-2 ">
                        @if (session()->has('message'))
                            <div class="alert alert-success bg-green-800 p-2 text-white uppercase rounded">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <x-custom.contact.form  />
                </div>
                <!-- End Card -->

            </div>
        </div>
    </div>
    <!-- End Contact Us -->
</div>
