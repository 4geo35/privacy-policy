<div>
    @if ($displayText)
        <div class="fixed bottom-0 w-full z-modal" x-data="{ show: true }">
            <div class="container" x-show="show">
                <div class="bg-white shadow-lg rounded-base border border-stroke p-indent my-indent flex flex-col md:flex-row items-end justify-between md:space-x-indent space-y-indent-half md:space-y-0">
                    <div class="prose max-w-none prose-p:text-sm md:prose-p:text-base prose-p:leading-6">{!! $text !!}</div>
                    <button type="button" class="btn btn-sm md:btn-base btn-primary"
                            @click="show = false"
                            wire:click="close" wire:loading.attr="disabled">
                        Хорошо
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
