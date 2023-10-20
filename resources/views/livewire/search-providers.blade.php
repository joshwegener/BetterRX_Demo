<div>
    <input type="text" id="firstName" wire:model.live="firstName">

    <table class="table table-striped">
    <thead>
        <th>
            <td scope="col">NPI</td>
            <td scope="col">First Name</td>
            <td scope="col">Last Name</td>
        </th>
    </thead>
    <tbody>
        @forelse($results as $result)
            <tr wire:loading.class="opacity-50">
                <td>{{ $result['number'] }}</td>
                <td>{{ $result['basic']['first_name'] }}</td>
                <td>{{ $result['basic']['last_name'] }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No results found</td>
            </tr>
        @endforelse
    </tbody>
    </table>
</div>
