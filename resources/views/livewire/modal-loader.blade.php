<div class="modal fade" id="providerDetails" tabindex="-1" @modal-open="providerModal = new bootstrap.Modal(document.getElementById('providerDetails')); providerModal.show();">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="providerDetailsLabel">Provider Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          @if(count($providerData) > 0)
          <table class="table table-striped">
          <thead>
          <tr>
            <th class="col">Name</th>
            <th class="col">Value</th>
          </tr>
          </thead>
          <tbody>
            <tr>
              <td>Name</td>
              <td>
                @if($providerData['enumeration_type'] == 'NPI-1')
                  {{ trim(implode(' ', array_filter([
                    ($providerData['basic']['name_prefix'] ?? '') !== '--' ? ($providerData['basic']['name_prefix'] ?? '') : '',
                    $providerData['basic']['first_name'] ?? '',
                    $providerData['basic']['last_name'] ?? '',
                    ($providerData['basic']['name_suffix'] ?? '') !== '--' ? ($providerData['basic']['name_suffix'] ?? '') : '',
                    $providerData['basic']['credential'] ?? ''
                  ]))) }}
                @else
                @endif
              </td>
            </tr>
            <tr>
              <td>NPI</td>
              <td>{{ $providerData['number'] }}</td>
            </tr>
            <tr>
              <td>Enumeration Date</td>
              <td>{{ $providerData['basic']['enumeration_date'] }}</td>
            </tr>
            <tr>
              <td>NPI Type</td>
              <td>{{ $providerData['enumeration_type'] }}</td>
            </tr>
            <tr>
              <td>Is Sole Proprietor?</td>
              <td>{{ $providerData['basic']['sole_proprietor'] }}</td>
            </tr>
            <tr>
              <td>Active</td>
              <td>{{ $providerData['basic']['status'] == 'A' ? 'Active' : 'Inactive' }}</td>
            </tr>
          </tbody>
          </table>
          {{ var_dump($providerData) }}
        @endif
      </div>
    </div>
  </div>
</div>