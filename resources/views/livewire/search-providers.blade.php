<div>
    <form class="form-inline">
        <input class="form-control" type="text" id="firstName" wire:model.live="firstName" placeholder="First Name">
        <input class="form-control" type="text" id="lastName" wire:model.live="lastName" placeholder="Last Name">
        <input class="form-control" type="text" id="npiNumber" wire:model.live="npiNumber" placeholder="NPI Number">
        <input class="form-control" type="text" id="taxonomyDescription" wire:model.live="taxonomyDescription" placeholder="Taxonomy Description">
        <input class="form-control" type="text" id="city" wire:model.live="city" placeholder="City">
        <input class="form-control" type="text" id="state" wire:model.live="state" placeholder="State">
        <input class="form-control" type="text" id="zip" wire:model.live="zip" placeholder="Zip">
    </form>

    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">NPI</th>
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
</div>
