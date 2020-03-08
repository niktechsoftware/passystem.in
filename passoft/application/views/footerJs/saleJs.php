

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>


<!-- start: MAIN JAVASCRIPTS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/plugins/respond.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/excanvas.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-1.11.1.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
<!--<![endif]-->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/blockUI/jquery.blockUI.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/jquery.icheck.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootbox/bootbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery.scrollTo/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/ScrollToFixed/jquery-scrolltofixed-min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery.appear/jquery.appear.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/velocity/jquery.velocity.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/TouchSwipe/jquery.touchSwipe.min.js"></script>
<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
<script src="<?php echo base_url(); ?>assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-modal/js/bootstrap-modal.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
<!--<script src="<?php echo base_url(); ?>assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>-->
<script src="<?php echo base_url(); ?>assets/plugins/truncate/jquery.truncate.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/summernote/dist/summernote.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/subview.js"></script>
<script src="<?php echo base_url(); ?>assets/js/subview-examples.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nvd3/lib/d3.v3.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nvd3/nv.d3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nvd3/src/models/historicalBar.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nvd3/src/models/historicalBarChart.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nvd3/src/models/stackedArea.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nvd3/src/models/stackedAreaChart.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery.sparkline/jquery.sparkline.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/index.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- start: CORE JAVASCRIPTS  -->
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>



<script>
$(document).ready(function() {


<?php $i = 1; for($i = 1; $i<=15; $i++){ ?>

$('#item_nu<?php echo $i; ?>').keyup(function(){
var name = $('#item_nu<?php echo $i; ?>').val();
      //alert(name);
$.post("<?php echo site_url("stockController/checkStock") ?>", {name : name}, function(data){	
 //alert(data);	
var d = $.parseJSON(data);				
$('#item_nm<?php echo $i; ?>').val(d.itemName);
$('#item_cate<?php echo $i; ?>').val(d.itemCat);
$('#item_catidd<?php echo $i; ?>').val(d.itemCatid);
$('#item_quantity2<?php echo $i;?>').val(d.qunatity);
$('#item_sieze<?php echo $i; ?>').val(d.itemsize);
$('#item_pric<?php echo $i; ?>').val(d.price);
});
});

$('input#item_quntity<?php echo $i; ?>').keyup(function(){
   
var a = 0;
var name = $('#item_pric<?php echo $i; ?>').val();
var name1 = Number($('#item_quntity<?php echo $i; ?>').val());
var name2 = Number($('#item_quantity2<?php echo $i; ?>').val());
var tot = $('#totel').val();

alert(name2);
  if(name2>=name1){
var total = name * name1;
var totmat = tot +total;
document.getElementById('total_pric<?php echo $i; ?>').value=total;
document.getElementById('sub_totel<?php echo $i; ?>').value=total;
document.getElementById('totel').value=totamt;
$("#submit").show();
}
else
{

alert('Please update your stock');
document.getElementById('total_pric<?php echo $i; ?>').value=0;
document.getElementById('sub_totel<?php echo $i; ?>').value=0;
$("#submit").hide();

}
});



<?php } ?>

$('input#totel').focusin(function(){

var name =  Number($('#valid_id').val()) + Number($('#sub_totel1').val()) + Number($('#sub_totel2').val()) + Number($('#sub_totel3').val()) + Number($('#sub_totel4').val()) + Number($('#sub_totel5').val()) + Number($('#sub_totel6').val()) + Number($('#sub_totel7').val()) + Number($('#sub_totel8').val()) + Number($('#sub_totel9').val()) + Number($('#sub_totel10').val()) + Number($('#sub_totel11').val()) + Number($('#sub_totel12').val()) + Number($('#sub_totel13').val()) + Number($('#sub_totel14').val()) + Number($('#sub_totel15').val());				
$("#totel").val(name);
});


});

$(document).ready(function() {
 

<?php $i = 1; for($i = 1; $i<=15; $i++){ ?>

$('#item_no<?php echo $i; ?>').keyup(function(){
var name = $('#item_no<?php echo $i; ?>').val();
     // alert(name);
$.post("<?php echo site_url("stockController/checkStock") ?>", {name : name}, function(data){	
 //alert(data);	
var d = $.parseJSON(data);				
$('#item_name<?php echo $i; ?>').val(d.itemName);
$('#item_cat<?php echo $i; ?>').val(d.itemCat);
$('#item_catid<?php echo $i; ?>').val(d.itemCatid);
$('#item_quantity1<?php echo $i;?>').val(d.qunatity);
$('#item_size<?php echo $i; ?>').val(d.itemsize);
$('#item_price<?php echo $i; ?>').val(d.price);
});
});


$('input#item_quantity<?php echo $i; ?>').keyup(
function(){
var a = 0;
var name = $('#item_price<?php echo $i; ?>').val();
var name1 = Number($('#item_quantity<?php echo $i; ?>').val());
var name2 = Number($('#item_quantity1<?php echo $i; ?>').val());
var tot =  Number($('#totel').val());

// alert(tot);
  if(name2>=name1){
var total = name * name1;
// var totmat = tot +total;
// alert(totamt);
document.getElementById('total_price<?php echo $i; ?>').value=total;
document.getElementById('sub_total<?php echo $i; ?>').value=total;
$('#totel').val(totamt);
$("#submit").show();
}
else
{

alert('Please update your stock');
document.getElementById('total_price<?php echo $i; ?>').value=0;
document.getElementById('sub_total<?php echo $i; ?>').value=0;
$("#submit").hide();

}
});

$('input#item_discount<?php echo $i; ?>').keyup(
function(){
var name = $('#total_price<?php echo $i; ?>').val();
var name1 = $('#item_discount<?php echo $i; ?>').val();

var dis = (name1 * name)/100;
var total = name - dis;
document.getElementById('total_price<?php echo $i; ?>').value=name;
document.getElementById('sub_total<?php echo $i; ?>').value=total;
document.getElementById('discount<?php echo $i; ?>').value=dis;
});

// $('#sub_total<?php echo $i; ?>').change(function(){
//   var tot = Number($("#total").val());
//   var tt = $('#sub_total<?php echo $i; ?>').val();
//   var totamt = tot + tt;
//   alert(tot);
//   $("#total").val(totamt);
    
    
// });



<?php } ?>

$('input#total').focusin(function(){

var name =  Number($('#valid_id').val()) + Number($('#sub_total1').val()) + Number($('#sub_total2').val()) + Number($('#sub_total3').val()) + Number($('#sub_total4').val()) + Number($('#sub_total5').val()) + Number($('#sub_total6').val()) + Number($('#sub_total7').val()) + Number($('#sub_total8').val()) + Number($('#sub_total9').val()) + Number($('#sub_total10').val()) + Number($('#sub_total11').val()) + Number($('#sub_total12').val()) + Number($('#sub_total13').val()) + Number($('#sub_total14').val()) + Number($('#sub_total15').val());				
$("#total").val(name);
});

$('input#paid').keyup(
function(){
var name = $('#paid').val();
var name1 = $('#total').val();
var a = name1 - name;				
document.getElementById('balance').value=a;
});


});
Main.init();
SVExamples.init();
TableData.init();
</script>
