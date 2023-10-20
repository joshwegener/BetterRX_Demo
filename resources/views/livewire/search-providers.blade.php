<div>
    <input type="text" id="firstName" wire:model.live="firstName">

    <table>
        <th>
            <th>First Name</th>
            <th>Last Name</th>
        </th>
        @forelse($results as $result)
            <tr wire:loading.class="opacity-50">
                <td>{{ $result['basic']['first_name'] }}</td>
                <td>{{ $result['basic']['last_name'] }}</td>
            </tr>
        @empty
            <tr>
                <td>No results found</td>
            </tr>
        @endforelse
    </table>
</div>
