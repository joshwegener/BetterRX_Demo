<div>
    <input type="text" id="firstName" wire:model.live="firstName">

    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">NPI</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
        </tr>
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
