<x-app-layout>
    @include("pp::web.pages.includes.privacy-metas")
    @include("pp::web.pages.includes.privacy-breadcrumbs")

    <div class="container">
        <div class="prose max-w-none">
            {!! $text !!}
        </div>
    </div>
</x-app-layout>
