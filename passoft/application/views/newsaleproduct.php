 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                             <div class="container">
                             <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Zero config.table start -->
                                            <div class="panel panel-white">
                                                <div class="panel-heading panel-red" style="text-align:center;color:#01a9ac;">
                                                  
                                                </div>
                                                
                                                <div class="panel-body">
                                                    <div class="row col-md-12">
                                                        <div class="col-md-6">
                                                            <div class="col-md-4">
                                                            <label class="control-label">Direct Sale</label>
                                                            </div>
                                                             <div class="col-md-4">
                                                            <input type="radio" class="form-control" name="sale" id="directsale" value="1">
                                                            </div>
                                                        </div>
                                                     <div class="col-md-6">
                                                          <div class="col-md-4">
                                                             <label>Online Order</label>
                                                             </div>
                                                              <div class="col-md-4">
                                                            <input type="radio" class="form-control" name="sale" id="online" value="2">
                                                            </div>
                                                    </div>
                                                  </div>
                                                   <div class="row col-md-12">
                                                  <div class=" col-md-6" id="subs">
                                                      <label>Subscriber Username</label>
                                                            <input type="text" class="form-control" name="sale" id="subsnm" >
                                                      
                                                  </div>
                                                  
                                                    <div class=" col-md-6" id="subssms">
                                                      
                                                  </div>
                                                  </div>
                                                  <div class="row col-md-12">
                                                    <div class = "col-md-6" id="order">
                                                      <label>Enter Order Number</label>
                                                            <input type="text" name="sale" class="form-control" id="orderno" value=" ">
                                                      
                                                  </div>
                                                   <div class = "col-md-6" id = "num1"> <a href ="#" class ="btn btn-success" id = "num2" >Get Details</a></div>
                                                  <div class = "col-md-6"  id="num" >
                                                      <label> Enter Number Of Item</label>
                                                      <input type="number" class="form-control" id="rows"   vale=""> 
                                                     
                                                  </div>
                                                  </div>
                                                 
                                                   <div class="row" id="directrows">
                
                                                     </div>
                                              
                             
                              <script>
                                  $(document).ready(function(data){
                                     
                                      $('#num').hide();
                                       $('#num1').hide();
                                       $('#subs').hide();
                                       $('#order').hide();
                                    $('#directrows').hide();
                                  
                                  $('#directsale').click(function(){
                                        $('#order').hide();
                                         $('#num').hide();
                                    var dr= $('#directsale').val();
                                    if(dr==1){
                                          $('#subs').show();
                                    }
                                    else{
                                        $('#subs').hide(); 
                                    }
                                        
                                    
                                  });
                                   $('#online').click(function(){
                                        $('#subs').hide();
                                         $('#num').hide();
                                    var dr= $('#online').val();
                                   
                                    if(dr==2){
                                         $('#subs').hide();
                                          $('#order').show();
                                    }
                                    else{
                                        $('#order').hide(); 
                                    }
                                        
                                    
                                  });
                                  $('#subsnm').keyup(function(){
                                      var subsnumber =$('#subsnm').val();
                                      
                                       $.post("<?= site_url();?>index.php/stockController/checkValidSubscriber" , { subsnumber : subsnumber } , function(data){
                                         $('#subssms').html(data);
                                      });
                                      
                                  });
                                  
                                   $('#orderno').keyup(function(){
                                      
                                    var dr= $('#orderno').val();
                                      $.post("<?= site_url();?>index.php/stockController/checkValidOrder" , { dr : dr } , function(data){
                                         $('#subssms').html(data);
                                    
                                      });
                                    
                                  });
                                  
                                  $('#rows').keyup(function(data){
                                     var numrow= $('#rows').val();
                                     if($('#directsale').is(':checked')){
                                      var comm = $('#subsnm').val();
                                    //   alert(comm);
                                     }
                                     else if($('#online').is(':checked')){
                                         var comm = $('#orderno').val();
                                    //   alert(comm);

                                     }
                                    //  alert(comm);
                                    
                                   
                                      $.post("<?= site_url();?>index.php/stockController/direct" , { numrow : numrow , comm : comm } , function(data){
                                           $('#directrows').show();
                                            $('#directrows').html(data);
                                      });
                                  });
                                  
                                   $('#num2').click(function(data){
                                        var comm= $('#orderno').val();
                                    
                                    
                                   
                                      $.post("<?= site_url();?>index.php/stockController/onlinedirect" , {  comm : comm } , function(data){
                                           $('#directrows').show();
                                            $('#directrows').html(data);
                                      });
                                  });
                                  
                                  });
                              </script>
                              
                              
               
                              
             </div>
         </div>
                     </div>
          </div>
          </div>