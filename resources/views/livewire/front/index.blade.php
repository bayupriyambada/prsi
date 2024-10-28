@section('title', 'Home')
<div>
    <section class="mx-auto container my-5 md:px-0 px-5">
        <x-slider-component :sliders="$sliders" />
    </section>

    <section id="main-content" class="my-10 flex flex-col mx-auto container">
        <div class="md:px-0 px-5">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                <x-custom.shared.sidebar.left :blogs="$blogs" />
                <x-custom.shared.sidebar.right :regionalBranches="$regionalBranches" :calendars="$calendars" />
            </div>
        </div>

        <!-- sponsor -->
        <div class="md:px-0 px-5">
            {{-- <x-sponsor.view :sponsorship="'sponsors'" :sponsors="$sponsors" /> --}}
            <x-sponsor.view :sponsorship="'coSponsors'" :coSponsors="$coSponsors" />
        </div>
        <!-- sponsor -->
    </section>

</div>
