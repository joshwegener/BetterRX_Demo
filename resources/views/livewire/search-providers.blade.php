<div>
    <input type="text" id="firstName" wire:model.live="firstName">

    <table>
        <th>
            <th>First Name</th>
        </th>
        @forelse($results as $result)
            <tr wire:loading.class="opacity-50">
                @if ($result['result_count'] > 0)
                    <td>$result['result_count']</td>
                @else
                    <td>No results found!</td>
                @endif
            </tr>
        @empty
            <tr>
                <td>No results found</td>
            </tr>
        @endforelse
    </table>
</div>
