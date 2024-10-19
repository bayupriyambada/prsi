<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') - PRSI </title>

    @stack('seo')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles()
</head>

<body class="bg-gray-100">

    @include('components.inc._header')
    {{ $slot }}

    @include('components.inc._footer')

    @livewireScripts()
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper(".swiper", {
            loop: true,
            slidesPerView: 1,
            autoplay: {
                delay: 3000,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

    <script>
        document.addEventListener("livewire:navigated", () => {
            window.HSStaticMethods.autoInit();
        });
    </script>

    <script>
        function copyToClipboard(text) {
            // Buat elemen input sementara untuk menyalin teks
            const input = document.createElement('input');
            input.value = text;
            document.body.appendChild(input);
            input.select();
            document.execCommand('copy');
            document.body.removeChild(input);

            // Tampilkan notifikasi
            const notification = document.getElementById('copy-notification');
            notification.classList.remove('hidden');

            // Sembunyikan notifikasi setelah beberapa detik
            setTimeout(() => {
                notification.classList.add('hidden');
            }, 2000);
        }
    </script>


</body>

</html>