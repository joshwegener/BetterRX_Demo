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
            <th class="col-2">NPI</th>
            <th class="col">Name</th>
        </tr>
    </thead>
    <tbody>
        @forelse($results as $result)
            <tr wire:loading.class="opacity-50">
            <td><a href="#" x-data @click="$dispatch('open-modal', {providerData: '{{ $result }}'})" data-bs-toggle="modal" data-bs-target="#providerDetails">{{ $result['number'] }}</a></td>
                @if($result['enumeration_type'] === 'NPI-1')
                    <td>{{ Str::title($result['basic']['first_name'] . ' ' . $result['basic']['last_name']) }}</td>
                @else
                    <td>{{ $result['basic']['organization_name'] }}</td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="2">No results found</td>
            </tr>
        @endforelse
    </tbody>
    </table>

    @include('livewire.partial.pagination')
    <livewire:modal-loader />
</div>
