<div class="modal fade" id="providerDetails" tabindex="-1" @modal-open="providerModal = new bootstrap.Modal(document.getElementById('providerDetails')); providerModal.show();">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="providerDetailsLabel">Provider Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if(count($providerData) > 0)
          @if($providerData['enumeration_type'] == 'NPI-1')
            {{ $providerData['basic']['name_prefix'] . ' ' . $providerData['basic']['first_name'] . ' ' . $providerData['basic']['last_name'] . ' ' . $providerData['basic']['name_suffix'] . ' ' . $providerData['basic']['credential'] }}
          @endif
          {{ var_dump($providerData) }}
        @endif
      </div>
    </div>
  </div>
</div>