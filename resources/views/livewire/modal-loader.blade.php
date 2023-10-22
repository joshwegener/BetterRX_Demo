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
            <th class="col-3">Name</th>
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
                  {{ $providerData['basic']['organization_name'] }}
                @endif
              </td>
            </tr>
            @if(count($providerData['other_names']) > 0)
            <tr>
              <td>Other Name(s)</td>
              <td>
                @foreach($providerData['other_names'] as $otherName)
                  {{ trim(implode(' ', array_filter([
                    $otherName['type'] . ': ',
                    ($otherName['prefix'] ?? '') !== '--' ? ($otherName['prefix'] ?? '') : '',
                    $otherName['first_name'] ?? '',
                    $otherName['last_name'] ?? '',
                    ($otherName['suffix'] ?? '') !== '--' ? ($otherName['suffix'] ?? '') : '',
                    $otherName['credential'] ?? ''
                  ]))) }}<br/>
                @endforeach
              </td>
            </tr>
            @endif
            @if(isset($providerData['basic']['gender']))
            <tr>
              <td>Gender</td>
              <td>{{ $providerData['basic']['gender'] == 'M' ? 'Male' : 'Female' }}</td>
            </tr>
            @endif
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
            @if(isset($providerData['basic']['sole_proprietor']))
              <tr>
                <td>Sole Proprietor</td>
                <td>{{ $providerData['basic']['sole_proprietor'] }}</td>
              </tr>
            @endif
            <tr>
              <td>Active</td>
              <td>{{ $providerData['basic']['status'] == 'A' ? 'Active' : 'Inactive' }}</td>
            </tr>
            @if($providerData['enumeration_type'] == 'NPI-2')
            <tr>
              <td>Authorized Official Information</td>
              <td>
                Name:
                {{ trim(implode(' ', array_filter([
                  ($providerData['basic']['authorized_official_name_prefix'] ?? '') !== '--' ? ($providerData['basic']['authorized_official_name_prefix'] ?? '') : '',
                  $providerData['basic']['authorized_official_first_name'] ?? '',
                  $providerData['basic']['authorized_official_last_name'] ?? ''
                ]))) }}<br/>
                Position: {{ $providerData['basic']['authorized_official_title_or_position'] ?? '' }}<br/>
                Phone: {{ $providerData['basic']['authorized_official_telephone_number'] ?? '' }}
              </td>
            </tr>
            @endif
            @foreach($providerData['addresses'] as $address)
              <tr>
                @if($address['address_purpose'] == 'MAILING')
                  <td>Mailing Address</td>
                @else
                  <td>Practice Address</td>
                @endif
                <td>
                  {{ $address['address_1'] }}<br/>
                  @if(isset($address['address_2']))
                    {{ $address['address_2'] }}<br/>
                  @endif
                  {{ $address['city'] }}, {{ $address['state'] }} {{ $address['postal_code'] }}<br/>
                  {{ $address['telephone_number'] ?? '' }}
                </td>
              </tr>
            @endforeach
            <tr>
              <td>Secondary Practice Address(es)</td>
              <td>
                @foreach($providerData['practiceLocations'] as $address)
                  {{ $address['address_1'] }}<br/>
                  @if(isset($address['address_2']))
                    {{ $address['address_2'] }}<br/>
                  @endif
                  {{ $address['city'] }}, {{ $address['state'] }} {{ $address['postal_code'] }}<br/>
                  {{ $address['telephone_number'] ?? '' }}<br/><br/>
                @endforeach
            </tr>
            <tr>
                <td>Other Identifiers</td>
                <td>
                  @if(count($providerData['identifiers']) > 0)
                    <table class="table table-striped">
                      <tr>
                        <td>Code</td>
                        <td>Description</td>
                        <td>Issuer</td>
                        <td>Identifier</td>
                        <td>State</td>
                      </tr>
                      @foreach($providerData['identifiers'] as $identifier)
                      <tr>
                        <td>{{ $identifier['code'] }}</td>
                        <td>{{ $identifier['desc'] }}</td>
                        <td>{{ $identifier['issuer'] }}</td>
                        <td>{{ $identifier['identifier'] }}</td>
                        <td>{{ $identifier['state'] }}</td>
                      </tr>
                      @endforeach
                    </table>
                  @endif
                </td>
              </tr>
              <tr>
                <td>Taxonomy</td>
                <td>
                  @if(count(['taxonomies']) > 0)
                    <table class="table table-striped">
                      <tr>
                        <td>Code</td>
                        <td>Group</td>
                        <td>Description</td>
                        <td>State</td>
                        <td>License</td>
                        <td>Primary</td>
                      </tr>
                      @foreach($providerData['taxonomies'] as $taxonomy)
                      <tr>
                        <td>{{ $taxonomy['code'] }}</td>
                        <td>{{ $taxonomy['taxonomy_group'] }}</td>
                        <td>{{ $taxonomy['desc'] }}</td>
                        <td>{{ $taxonomy['state'] }}</td>
                        <td>{{ $taxonomy['license'] }}</td>
                        <td>{{ $taxonomy['primary'] ? 'Yes' : 'No' }}</td>
                      </tr>
                      @endforeach
                    </table>
                  @endif
                </td>
              </tr>
          </tbody>
          </table>
          {{ var_dump($providerData) }}
        @endif
      </div>
    </div>
  </div>
</div>