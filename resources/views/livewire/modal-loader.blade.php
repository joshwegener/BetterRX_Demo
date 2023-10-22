<div class="modal fade" id="providerDetails" tabindex="-1" x-data="{ isOpen: false }" @modal-open="isOpen = true; alert($wire.isOpen)" x-show="$wire.isOpen">
  <div class="modal-dialog" x-show="$wire.isOpen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="providerDetailsLabel">Provider Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{ var_dump($providerData) }}
      </div>
    </div>
  </div>
</div>