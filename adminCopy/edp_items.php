<script>
function totalCost() {
            var txtnumberUcost = document.getElementById('ucost').value;
			var txtnumberqty = document.getElementById('qty').value;
            var resTcost = parseFloat(txtnumberUcost).toFixed(2) * parseFloat(txtnumberqty).toFixed(2);
            
			
            if (!isNaN(resTcost)) {
                document.getElementById('tcost').value = resTcost.toFixed(2);
				}
			if(txtnumberUcost == '' && txtnumberqty ==''){
				restTcost = 0;
				
				}

}		
			
			
</script>
    <!------modal------->
    <div class="modal fade" id="addModalitem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="font-family:'Comic Sans MS', cursive;">
      <div class="modal-header" style="background-color:#0C3;">
       <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/img/icons/add2.ico" width="45px"/> ADD ITEM</span>
       </div> 
<div class="col-md-2">
    <div class="a_close"><a  href="edp"  data-toggle="tooltip" title="Close" class="pull-right" ><span class="glyphicon glyphicon-remove"></span></a></div><br>
                                        </div>
                                    </div>
      </div>
      <div class="modal-body">
      <div id="logMsg"></div>
    
      </div>
      
    </div>
  </div>
</div>
<!----end of modal-------->
