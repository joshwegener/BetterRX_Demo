<div>
    <input type="text" id="firstName" wire:model.live="firstName">

    <table class="table table-striped">
    <thead>
        <th>
            <th scope="col">NPI</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
        </th>
    </thead>
    <tbody>
        @forelse($results as $result)
            <tr wire:loading.class="opacity-50">
                <td scope="role">{{ $result['number'] }}</td>
                <td>{{ $result['basic']['first_name'] }}</td>
                <td>{{ $result['basic']['last_name'] }}</td>
            </tr>
        @empty
            <tr>
                <td>No results found</td>
            </tr>
        @endforelse
    </tbody>
    </table>
</div>
