<div>
    @if ($displayText)
        <div class="fixed bottom-0 w-full z-modal" x-data="{ show: true }">
            <div class="container" x-show="show">
                <div class="bg-white shadow-lg rounded-base border border-stroke p-indent my-indent flex items-end justify-between space-x-indent">
                    <div class="prose max-w-none prose-p:leading-6">{!! $text !!}</div>
                    <button type="button" class="btn btn-primary"
                            @click="show = false"
                            wire:click="close" wire:loading.attr="disabled">
                        Хорошо
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
