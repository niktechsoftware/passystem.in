<div class="row">
  <div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
    <div class="panel panel-white">

      <div class="panel-heading panel-pink">
        <h3 class="panel-title"> <span class="text-bold">Admin Demand By Category </span></h3>
        <div class="panel-tools">
          <div class="dropdown">
            <a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
              <i class="fa fa-cog"></i>
            </a>
            <ul class="dropdown-menu dropdown-light pull-right" role="menu" style="display: none;">
              <li>
                <a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
              </li>
              <li>
                <a class="panel-refresh" href="#">
                  <i class="fa fa-refresh"></i> <span>Refresh</span>
                </a>
              </li>
              <li>
                <a class="panel-config" href="#panel-config" data-toggle="modal">
                  <i class="fa fa-wrench"></i> <span>Configurations</span>
                </a>
              </li>
              <li>
                <a class="panel-expand" href="#">
                  <i class="fa fa-expand"></i> <span>Fullscreen</span>
                </a>
              </li>
            </ul>
          </div>
          <!-- <a class="btn btn-xs btn-link panel-close" href="#">
          <i class="fa fa-times"></i>
        </a> -->
        </div>
      </div>

      <div class="panel-body">
          
        <div class="alert alert-info">
          <button data-dismiss="alert" class="close">Ã—</button>
          <h3 class="media-heading text-center">Welcome to Admin Demand List</h3>
        
        </div>

        <form action="<?php echo base_url();?>index.php/adminController/getaddemand" method="post" role="form"
          class="form-horizontal" id="form">
          <div class="panel-heading panel-green">
            <span class="panel-title">Demand  <span class="text-bold">List</span></h4>
          </div>
          <div class="panel-body text-uppercase">
            <div id="wizard" class="swMain">
            

             
             
              <div class="form-group">
                <div class="col-sm-5">
                  <label class="col-sm-5">
                   Select Category <span class="symbol required"></span>
                  </label>
                  <div class="col-sm-7">
                    <select class="form-control text-uppercase" id="demandc" name="type"
                       required="required">
                      <option value=0>-Select Category-</option>
                      <option value=1>Branch Wise</option>
                      <option value=2>Shop Wise</option>
                      <option value=3>Overall </option>
                    </select>
                  </div>
                 
                </div>
               <div class="col-sm-5" id="cste">
                  <label class="col-sm-5">
                    Username
                  </label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control text-uppercase" id="categoryd" name="username" />
                  </div>
                </div>
              </div>
              
                <div class="form-group" >
                <div class="col-sm-5" id="dfname">
                 
                
                </div>
               <div class="col-sm-5" id="subb">
                 
                    <input type="submit" class="btn btn-success" name ="Get Demand"  />
                  </div>
                </div>
              
              
              
              
              
             </div>
             
            </form>
            <script>
             $("#subb").hide();
              $("#cste").hide();
                $("#demandc").change(function(){
					var demandc = $("#demandc").val();
					if(demandc>0){
					    if(demandc==3){
					     $("#cste").hide();
					    }else{
					      $("#cste").show();  
					    }
					    $("#subb").show();
					    
			
					}else{
					    $("#subb").hide();
					     $("#cste").hide();
					    alert("please Select Valid Demand Category Report");
					}
					//alert(cat);
				
                });
                
                $("#categoryd").keyup(function(){
					var categoryd = $("#categoryd").val();	
					var demandc = $("#demandc").val();
					if(demandc>0){
					    $("#subb").show();
					    	$.post("<?php echo site_url("index.php/adminController/checkbsid") ?>",{categoryd : categoryd, demandc : demandc}, function(data){
						$("#dfname").html(data);
					
				});
					}else{
					     $("#cste").hide();
					    $("#subb").hide();
					    alert("please Select Valid Demand Category Report");
					}
					//alert(cat);
				
                });
                
            </script>
          </div><!-- end: BODY PANEL -->
      </div>
      <!-- end: FORM WIZARD PANEL -->
    </div>
  </div>
</div>
<!-- ------------------------------------------------ BANK DETAIL --------------------------------------------- -->

<!-- ------------------------------------------------ LOGIN INFORMATION --------------------------------------------- -->
