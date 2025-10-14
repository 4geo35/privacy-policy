@if (count($metas))
    <x-slot name="rawMeta">@foreach($metas as $meta) {!! $meta !!} @endforeach</x-slot>
@else
    <x-slot name="rawTitle">{{ config("privacy-policy.agreementPageTitle") }}</x-slot>
@endif
