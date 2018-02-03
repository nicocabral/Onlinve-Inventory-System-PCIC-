

<script src="dist/js/app.min.js"></script>

<script src="bootstrap/js/bootstrap.min.js"></script>


<script type="text/javascript">
	$("#formUpdate").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: 'update_accountprocess',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	     $("#logMsg").empty();
	     $("#logMsg").html(data);
	    //alert(returndata);
	  }
	  });
	  return false;
	});

</script>


<script type="text/javascript">
	$("#formChangepassword").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: 'change_passwordprocess',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	     $("#logMsg").empty();
	     $("#logMsg").html(data);
	    //alert(returndata);
	  }
	  });
	  return false;
	});

</script>

  <script type="text/javascript">
    $("#range").hide();
    $("#single").hide();
    $("#btn-all").hide();

   $(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="range"){
                $("#single").hide();
                $("#range").show(200);
                $("#btn-all").hide();
            }
            else if($(this).attr("value")=="inventory"){
                 $("#single").show(200);
                $("#range").hide();
                $("#btn-all").hide();
            }
            else if($(this).attr("value")=="all"){
                 $("#btn-all").show(200);
                $("#range").hide();
                $("#single").hide();
            }else{
                $("#single").hide();
                $("#range").hide();
                $("#btn-all").hide();
            }

        });
    }).change();
    });
  </script>
   <script type="text/javascript">
    $("#peoOthers").hide();
   

   $(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="others"){
                $("#peoRow").hide();
                $("#peoOthers").show(200);
				$("#modalFooterbtn").hide(200)
            }
			else if($(this).attr("value")=="printPeo"){
                 $("#peoRow").show(200);
                $("#peoOthers").hide();
                $("#modalFooterbtn").show(200);
            }
          

        });
    }).change();
    });
  </script>
  <script>
  $('.modal.draggable.fade.bs-example-modal-lg>.modal-dialog.modal-lg').draggable({
    cursor: 'move',
    handle: '.modal-header'
});
$('.modal.draggable.fade.bs-example-modal-lg>.modal-dialog.modal-lg>.modal-content>.modal-header').css('cursor', 'move');
  </script>
  
