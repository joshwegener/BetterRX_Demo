<div>
    <input type="text" id="firstName" wire:model.live="firstName">

    <table>
        <th>
            <th>First Name</th>
        </th>
        @forelse($results as $result)
            <tr wire:loading.class="opacity-50">
                {{ ($result['result_count'] ?? 0) > 0 ? $result['result_count'] : 'No results found!' }}
                {{ var_dump($result) }}
            </tr>
        @empty
            <tr>
                <td>No results found</td>
            </tr>
        @endforelse
    </table>
</div>
