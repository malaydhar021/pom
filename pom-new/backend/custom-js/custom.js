/* 
Custom js for scripts using in pages 

*/
//check all checkbox 
$(document).ready(function(){ 
    $("#CbkAll").change(function(){
      $(".cbk").prop('checked', $(this).prop("checked"));
      });
});