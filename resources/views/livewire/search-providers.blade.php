<div>
    <form class="row">
        <div class="col">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" wire:model.live="firstName" placeholder="First name">
        </div>
        <div class="col">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" id="lastName" wire:model.live="lastName" placeholder="Last name">
        </div>
        <div class="col">
            <label for="npiNumber">NPI Number</label>
            <input type="text" class="form-control" id="npiNumber" wire:model.live="npiNumber" placeholder="NPI Number">
        </div>
        <div class="col">
            <label for="taxonomyDescription">Taxonomy Description</label>
            <input class="form-control" type="text" id="taxonomyDescription" wire:model.live="taxonomyDescription" placeholder="Taxonomy Description">
        </div>
        <div class="col">
            <label for="city">City</label>
            <input class="form-control" type="text" id="city" wire:model.live="city" placeholder="City">
        </div>
        <div class="col">
            <label for="State">State</label>
            <input class="form-control" type="text" id="state" wire:model.live="state" placeholder="State">
        </div>
        <div class="col">
            <label for="zip">Zip</label>
            <input class="form-control" type="text" id="zip" wire:model.live="zip" placeholder="Zip">
        </div>
    </form>

    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col-2">NPI</th>
            <th scope="col">Name</th>
        </tr>
    </thead>
    <tbody>
        @forelse($results as $result)
            <tr wire:loading.class="opacity-50">
                @if($result['enumeration_type'] === 'NPI-1')
                    <td>{{ $result['number'] }}</td>
                    <td>{{ Str::title($result['basic']['first_name'] . ' ' . $result['basic']['last_name']) }}</td>
                @else
                    <td>{{ $result['number'] }}</td>
                    <td>{{ $result['basic']['organization_name'] }}</td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="3">No results found</td>
            </tr>
        @endforelse
    </tbody>
    </table>

    @include('livewire.partial.pagination')
</div>
