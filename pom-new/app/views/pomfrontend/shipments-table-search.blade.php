@if(empty($shipping_data))
<tr class="po-added">
<td colspan='11'>{{'NO RESULT FOUND'}}</td>
</tr>
@endif
@foreach($shipping_data as $data)
          <tr class="">
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
            @if($data->STATUS_NAME =='Scheduled')
            <td><a data-toggle="tooltip" title="Receive Cargo" href="<?php echo URL::to('/');?>/recive-cargo/{{$data->BOOKING_ID}}">Receive Cargo</a></td>
            @endif
            @if($data->STATUS_NAME =='Received')
            <td><a data-toggle="tooltip" title="Ship" href="<?php echo URL::to('/');?>/ship/{{$data->BOOKING_ID}}">Ship</a></td>
            @endif
            @if($data->STATUS_NAME =='Shipped')
            <td><a data-toggle="tooltip" title="Deliver at Air/Port" href="<?php echo URL::to('/');?>/deliver/{{$data->BOOKING_ID}}">Deliver at Air/Port</a></td>
            @endif
            @if($data->STATUS_ID =='20')
            <td><a data-toggle="tooltip" title="Dispatch / Deliver" href="<?php echo URL::to('/');?>/despatch-deliver/{{$data->BOOKING_ID}}"> Despatch / Deliver</a></td>
            @endif
            @if($data->STATUS_ID =='23')
            <td></td>
            @endif
            
            @if($data->STATUS_NAME=='Despatched')
            <td><a data-toggle="tooltip" title="Update Despatch" href="<?php echo URL::to('/');?>/update-despatch/{{$data->BOOKING_ID}}"> Update Despatch</a></td>
            @endif
             @if($data->STATUS_ID=='22')
             <td><a data-toggle="tooltip" title="View" href="<?php echo URL::to('/');?>/deliverd/{{$data->BOOKING_ID}}"> View</a></td>
             @endif
          </tr>
          @endforeach