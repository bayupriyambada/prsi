@section('title', 'Keanggotaan')

<div>
    <!-- Card Section -->
    <div class="lg:max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="bg-white shadow rounded p-4 mb-3">
            <h1 class="text-2xl font-bold text-gray-800 sm:text-3xl text-center ">
                Pendaftaran Anggota PRSI
            </h1>
        </div>

        @if (session()->has('message'))
            <div class="mb-5 bg-white shadow rounded p-4">
                <div class="alert alert-success text-black uppercase rounded">
                    {{ session('message') }}
                </div>
            </div>
        @endif
        <form wire:submit.prevent="save()">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow ">
                <div class="pt-0 p-4 sm:pt-0 sm:p-7">
                    <!-- Grid -->
                    <div class="space-y-4 sm:space-y-6">

                        <div class="space-y-2">
                            <label for="email" class="inline-block text-sm font-medium text-gray-800 mt-2.5 ">
                                Email <span class="text-red-500">*</span>
                            </label>

                            <input id="email" type="email"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="email@gmail.com" wire:model.live="email">

                            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="fullname" class="inline-block text-sm font-medium text-gray-800 mt-2.5 ">
                                Nama Lengkap (Gelar) - Bila Ada <span class="text-red-500">*</span>
                            </label>

                            <input id="fullname" type="text"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Dr. Nama Lengkap" wire:model.live="full_name">

                            @error('full_name') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="tempat" class="inline-block text-sm font-medium text-gray-800 mt-2.5 ">
                                Tempat, Tanggal & Lahir <span class="text-red-500">*</span>
                            </label>

                            <input id="tempat" type="text"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Bandung, 01 Januari 1990" wire:model.live="birthdate">

                            @error('birthdate') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="nohp" class="inline-block text-sm font-medium text-gray-800 mt-2.5">
                                No Hp <span class="text-red-500">*</span>
                            </label>

                            <input id="nohp" type="text"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="08xxxxxxx" wire:model.live="phone">

                            @error('phone') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="alamat" class="inline-block text-sm font-medium text-gray-800 mt-2.5 ">
                                Alamat <span class="text-red-500">*</span>
                            </label>

                            <input id="alamat" type="text"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Jl. xxx" wire:model.live="address">

                            @error('address') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="space-y-2">
                            <label for="Pekerjaan" class="inline-block text-sm font-medium text-gray-800 mt-2.5 ">
                                Pekerjaan <span class="text-red-500">*</span>
                            </label>

                            <input id="Pekerjaan" type="text"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Pekerjaan" wire:model.live="job">

                            @error('job') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="Alasan" class="inline-block text-sm font-medium text-gray-800 mt-2.5 ">
                                Alasan Ingin Bergabung <span class="text-red-500">*</span>
                            </label>

                            <input id="Alasan" type="text"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Alasan Ingin Bergabung" wire:model.live="reason">

                            @error('reason') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="af-submit-app-upload-images"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 ">
                                Pas Foto Background Putih <span class="text-red-500">*</span>
                            </label>

                            <label for="af-submit-app-upload-images"
                                class="group p-4 sm:p-7 block cursor-pointer text-center border-2 border-dashed border-gray-200 rounded-lg focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 ">
                                <input id="af-submit-app-upload-images" name="af-submit-app-upload-images"
                                    type="file" class="sr-only" wire:model.live="photo">
                                <svg class="size-10 mx-auto text-gray-400 " xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                    <path
                                        d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                </svg>
                                <span class="mt-2 block text-sm text-gray-800 ">
                                    Browse your device or <span class="group-hover:text-blue-700 text-blue-600">drag 'n
                                        drop'</span>
                                </span>
                                <span class="mt-1 block text-xs text-gray-500 ">
                                    Maximum file size is 2 MB
                                </span>

                            </label>

                            @if ($photoPreview)
                                <div class="mt-4">
                                    <img src="{{ $photoPreview }}" alt="Pratinjau KTP" class="w-32 h-32 object-cover rounded-md">
                                </div>
                            @endif
                            @error('photo') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="space-y-2">
                            <label for="ktp"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 ">
                                KTP <span class="text-red-500">*</span>
                            </label>

                            <label for="ktp"
                                class="group p-4 sm:p-7 block cursor-pointer text-center border-2 border-dashed border-gray-200 rounded-lg focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 ">
                                <input id="ktp" name="ktp"
                                    type="file" class="sr-only" wire:model.live="ktp">
                                <svg class="size-10 mx-auto text-gray-400 " xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                    <path
                                        d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                </svg>
                                <span class="mt-2 block text-sm text-gray-800 ">
                                    Browse your device or <span class="group-hover:text-blue-700 text-blue-600">drag 'n
                                        drop'</span>
                                </span>
                                <span class="mt-1 block text-xs text-gray-500 ">
                                    Maximum file size is 2 MB
                                </span>
                            </label>

                            @if ($ktpPreview)
                                <div class="mt-4">
                                    <img src="{{ $ktpPreview }}" alt="Pratinjau KTP" class="w-32 h-32 object-cover rounded-md">
                                </div>
                            @endif

                            @error('ktp') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="af-submit-app-category"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 ">
                                Ukuran Kemeja <span class="text-red-500">*</span>
                            </label>

                            <select id="af-submit-app-category" wire:model.live="shirt_size"
                                class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none  ">
                                <option selected>Pilih Ukuran Kemeja</option>
                                <option value="s">S</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                                <option value="xxl">XXL</option>
                                <option value="xxxl">XXXL</option>
                            </select>

                            @error('shirt_size') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>


                    </div>
                    <!-- End Grid -->

                    <div class="mt-5 flex  w-full justify-center gap-x-2">
                        <button type="submit"
                            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Daftar Sebagai Anggota
                        </button>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </form>
    </div>
    <!-- End Card Section -->
</div>
