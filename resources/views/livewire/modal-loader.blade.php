<div x-data="{ open: false }" @modal-open.window="open = true" style="display: none;" x-show="open" x-cloak>
    <div class="modal fade show" tabindex="-1" style="display: block; background-color: rgba(0,0,0,.5);" x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Provider Information</h5>
                    <button type="button" class="btn-close" @click="open = false" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe :src="open ? '{{ $modalUrl }}' : ''" class="w-100" style="height:60vh;" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>