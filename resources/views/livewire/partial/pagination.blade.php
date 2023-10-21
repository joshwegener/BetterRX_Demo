@if(count($results) > 0)
    <nav>
        <ul class="pagination justify-content-end">
            <li class="page-item {{ $this->pageNumber ? '' : 'disabled' }}">
                <a class="page-link" href="#" wire:click="previousPage">Previous</a>
            </li>
            <li class="page-item {{ $this->hasMorePages ? '' : 'disabled' }}">
                <a class="page-link" href="#" wire:click="nextPage">Next</a>
            </li>
        </ul>
    </nav>
@endif
