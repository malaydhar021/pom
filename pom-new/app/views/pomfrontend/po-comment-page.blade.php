
            <table class='table'>
            <tr class='blue-bg'>
              <td>DATE</td>
              <td>Review By</td>
              <td>COMMENT</td>
              
              
            </tr>
            @foreach($po_comment as $data)
            <tr>
              <td><?php echo date('Y-m-d h:i A',strtotime($data->APPROVED_ON)); ?></td>
              <td>{{$data->USER_NAME}}</td>
              <td>{{$data->APPROVAL_COMMENT}}</td>
              
            </tr>
            @endforeach
          </table>
        
   