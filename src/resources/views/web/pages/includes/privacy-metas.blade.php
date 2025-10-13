@if (count($metas))
    <x-slot name="rawMeta">@foreach($metas as $meta) {!! $meta !!} @endforeach</x-slot>
@else
    <x-slot name="rawTitle">Политика в отношении обработки персональных данных</x-slot>
@endif
