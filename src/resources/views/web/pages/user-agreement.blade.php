<x-app-layout>
    @include("pp::web.pages.includes.agreement-metas")
    @include("pp::web.pages.includes.agreement-breadcrumbs")

    <div class="container">
        <div class="prose max-w-none">
            {!! $text !!}
        </div>
    </div>
</x-app-layout>
