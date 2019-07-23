@if(empty($fetch_booked_data))
<tr class="po-added">
<td colspan='11'>{{'NO RESULT FOUND'}}</td>
</tr>
@endif
<?php foreach($fetch_booked_data as $data) { ?>
          <tr>
            <td>{{$data->STATUS_NAME}}</td>
            <td>{{$data->TRANSPORT_MODE_NAME}}</td>
            <td>{{$data->SHIPPING_MODE_NAME}}</td>
            <td>{{$data->INCOTERM_NAME}}</td>
            <td>{{$data->BOOKING_PICK_UP_PLACE}}</td>
            <td>{{$data->BOOKING_POL}}</td>
            <td>{{$data->BOOKING_POD}}</td>
            <td>{{$data->BOOKING_DELEVERY_PLACE}}</td>
            <td>{{$data->BOOKING_REQUESTED_SIPPING_DATE}}</td>
            <td>{{$data->BOOKING_REQUESTED_DELIVERY_DATE}}</td>
              <?php $user_account_type=\Session::get('account_type'); $user_account_type[0]->ACCOUNT_TYPE_ID ?>
              @if($user_account_type[0]->ACCOUNT_TYPE_ID == 2)
            <td colspan='20'>
              @if($data->STATUS_NAME=='Booked' || $data->STATUS_NAME=='Booked (To be Confirmed)')
              <a class='confirmsec' data-toggle="tooltip" title="Confirm" href="<?php echo URL::to('/');?>/conf-booking/{{$data->BOOKING_ID}}"></a> 
              <a class='editsec' data-toggle="tooltip" title="EDIT" href="<?php echo URL::to('/');?>/edit-booking/{{$data->BOOKING_ID}}"></a> 
              <a class='deletesec' data-toggle="tooltip" title="Delete" href="<?php echo URL::to('/');?>/delete-booking/{{$data->BOOKING_ID}}"></a>
              <a class='viewsec' data-toggle="tooltip" title="View" href="<?php echo URL::to('/');?>/view-booking/{{$data->BOOKING_ID}}"></a>
              @elseif($data->STATUS_NAME=='Confirmed (Waiting for Schedule)')
              <a class='' data-toggle="tooltip" title="Schudule Shipment" href='<?php echo URL::to('/');?>/shipment-status-updating/{{$data->BOOKING_ID}}'>Schudule Shipment</a>
              @endif
            </td>
            @endif
          </tr>
          <?php } ?>