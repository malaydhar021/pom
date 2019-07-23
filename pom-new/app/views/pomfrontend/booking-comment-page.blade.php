
            <table class='table'>
            <tr class='blue-bg'>
              <td>DATE</td>
              <td>COMMENT</td>
              
            </tr>
            @foreach($booking_comment as $data)
            <tr>
              <td><?php echo date('Y-m-d',strtotime($data->APPROVED_ON)); ?></td>
              <td>{{$data->APPROVAL_COMMENT}}</td>
            </tr>
            @endforeach
          </table>
        
   