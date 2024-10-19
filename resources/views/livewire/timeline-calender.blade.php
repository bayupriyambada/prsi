@section('title', 'Timeline & Calender')

<div>
    <div class="flex flex-col lg:px-0 px-5 space-y-4 container mx-auto my-4">
        <ol class="flex items-center whitespace-nowrap"></ol>
        <x-custom.breadcrumb-view :links="[['label' => 'Beranda', 'url' => route('home')], ['label' => 'Timeline & Calender']]" />
        </ol>

        <div class="bg-white p-3 rounded-md mb-5">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 ">
                                <thead>
                                    <tr class="">
                                        <th scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase ">
                                            Perlombaan / Seminar</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase ">
                                            Tanggal</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase ">
                                            Kategori</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase ">
                                            Kota / Negara</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase ">
                                            Status Timeline</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase ">
                                            Dokumen Resmi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 ">

                                    @foreach ($groupTimelineCalenders as $monthYear => $eventsInMonth)
                                        <tr>
                                            <td colspan="6"
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium
                                        text-center text-gray">
                                                {{ $monthYear }}
                                            </td>
                                        </tr>

                                        @foreach ($eventsInMonth as $item)
                                            <tr class="hover:bg-gray-100 ">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-800 ">
                                                    {{ $item->title }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">
                                                    {{ $item->date }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">
                                                    {{ $item->category }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">
                                                    {{ $item->district }} / {{ $item->country }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">
                                                    @if ($item->date <= \Carbon\Carbon::now())
                                                        <span class="text-red-500">Selesai</span>
                                                    @else
                                                        <span class="text-green-500">Mendatang</span>
                                                    @endif

                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                    <a href="javascript:void(0)"
                                                        class="border border-gray-200 rounded-md px-2 py-1 text-xs text-gray-500">
                                                        Link Dokumen
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
