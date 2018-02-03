 <script src="Assets/js/jquery.js"></script>
    <script src="Assets/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="Assets/js/jquery.scrollTo.min.js"></script>
    <script src="Assets/js/jquery.nicescroll.js" type="text/javascript"></script>

    <!--custome script for all page-->
    <script src="Assets/js/scripts.js"></script>
    
    
<script type="text/javascript">
	$("#formCheckusername").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: 'username_check',
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