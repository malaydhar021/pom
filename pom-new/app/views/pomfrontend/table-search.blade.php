@if(empty($po_overview))
<tr class="po-added">
<td colspan='20'>{{'NO RESULT FOUND'}}</td>
</tr>
@endif
@foreach($po_overview as $data)
<tr class="po-added">
          <td>{{$data->STATUS_NAME}}</td>
          <td id='po_creation_date'>{{$data->PO_CREATION_DATE}}</td>
          <td id='customer_name'>@if(empty($data->CUSTOMER_NAME)){{$data->FWDR_NAME}}@elseif(empty($data->FWDR_NAME)){{$data->CUSTOMER_NAME}}@endif</td>
          <td>{{$data->SHIPPER_NAME}}<input type='hidden' id='shipper_id' value='{{$data->SHIPPER_ID}}'></td>
          <td>{{$data->CONSINE_NAME}}<input type='hidden' id='consine_id' value='{{$data->CONSINE_ID}}'></td>
          <td id='po_num'>{{$data->PO_NUMBER}}</td>
          <td id='po_date_new'>{{$data->PO_DATE}}</td>
          <td id='po_product_pn'>{{$data->PO_PRODUCT_PN}}</td>
          <td id='po_product_name'>{{$data->PO_PRODUCT_NAME}}</td>
          <td id='po_product_type'>{{$data->PO_PRODUCT_TYPE}}</td>
          <td id='po_product_qty'>{{$data->PO_PRODUCT_QTY}}</td>
          <td id='po_product_value'>{{$data->PO_PRODUCT_VALUE}}</td>
          <td id='po_currency'>{{$data->PO_CURRENCY}}</td>
          <td id='po_gross_wt'>{{$data->PO_GROSS_WEIGHT}}</td>
          <td id='po_cbm_vol'>{{$data->PO_CBM_VOLUME}}</td>
          <td id='po_pack_one'>{{$data->PO_PACKING_TYPE1}}</td>
          <td id='po_nbr_one'>{{$data->PO_NBR1}}</td>
          <td id='po_pack_two'>{{$data->PO_PACKING_TYPE2}}</td>
          <td id='po_nbr_two'>{{$data->PO_NBR2}}</td>
          
          @if($data->STATUS_NAME == 'PO Added' && $usr_account_id != $data->PO_ACCOUNT_ID)
          <td>
          
           </td>
          @elseif($data->STATUS_NAME == 'PO Added' && $usr_account_id == $data->PO_ACCOUNT_ID)
          <td>
          <button name='edit_po' id='po-edit' data-toggle="tooltip" title="Edit" class="editsec" data-toggle="modal" data-target="#exampleModalEdit"  data-id='{{$data->PO_ID}}'></button>
          <button name='del_po' class="deletesec" data-toggle="tooltip" title="Delete" data-toggle="modal" data-target="#ModalDelete" data-id='{{$data->PO_ID}}'></button> 
          <a href='<?php echo URL::to('/'); ?>/po-conf-send/{{$data->PO_ID}}' data-toggle="tooltip" title="Send For Confirmation" class="send_for_approval"></a>
          </td>
          @elseif($usr_account_id != $data->PO_ACCOUNT_ID && $data->STATUS_NAME == 'Approval Awaiting')
           <td>
            <button name='edit_po' id='po-edit' class="editsec" data-toggle="modal" data-target="#exampleModalEdit"  data-id='{{$data->PO_ID}}' data-toggle="tooltip" title="Edit"></button>
            <button name='conf_po' class='confirmsec' data-toggle="modal" data-target="#ConfirmModal" data-id='{{$data->PO_ID}}' data-toggle="tooltip" title="Confirm PO"></a></td>
            </td>
          @endif
          @if($data->STATUS_NAME == 'PO Review' && $usr_account_id == $data->PO_ACCOUNT_ID)
          <td>
          <button name='edit_po' id='po-edit' class="editsec" data-toggle="modal" data-target="#exampleModalEdit"  data-id='{{$data->PO_ID}}' data-toggle="tooltip" title="Edit"></button>
          <button name='del_po' class="deletesec" data-toggle="modal" data-target="#ModalDelete" data-id='{{$data->PO_ID}}' data-toggle="tooltip" title="Delete" ></button> 
          <a href='<?php echo URL::to('/'); ?>/po-conf-send/{{$data->PO_ID}}' data-toggle="tooltip" title="Send For Confirmation" class="send_for_approval"></a>
          </td>
          @endif
    </tr>
        @endforeach
