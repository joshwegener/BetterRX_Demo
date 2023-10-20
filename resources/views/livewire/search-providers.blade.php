<div>
    <input type="text" id="firstName" wire:model.live="firstName">

    <table>
        <th>
            <th>First Name</th>
        </th>
        @forelse($results as $result)
            <tr wire:loading.class="opacity-50">
                <br />
                <br />
                <hr />
                {{ var_dump($result) }}
                <hr />
                <br />
                <br />
            </tr>
        @empty
            <tr>
                <td>No results found</td>
            </tr>
        @endforelse
    </table>
</div>
