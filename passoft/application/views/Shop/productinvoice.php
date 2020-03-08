<style type="text/css">
    #printable { display: block; }
    @media print
    {
    	#non-printable { display: none; }
    	#printable { display: block; }
    }
</style>
<script>
    function autoResize(id){
        var newheight;
        var newwidth;

        if(document.getElementById){
            newheight=document.getElementById(id).contentWindow.document .body.scrollHeight;
            newwidth=document.getElementById(id).contentWindow.document .body.scrollWidth;
        }

        document.getElementById(id).height= (newheight) + "px";
        document.getElementById(id).width= (newwidth) + "px";
    }
</script>


<div class="row">
	<div class="col-sm-12">
		<!-- start: INLINE TABS PANEL -->
		<div class="panel panel-white">
			<div class="panel-heading">
				<div class="panel-tools">										
					<div class="dropdown">
					
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
				<?php $invoiceno = $this->uri->segment(3);?>
					<div class="col-sm-12">
						<IFRAME SRC="<?php echo base_url(); ?>stockController/genrateproductinvoice/<?php echo $invoiceno;?>" width="100%" height="150px" id="iframe1" style="border: 1px;" onLoad="autoResize('iframe1');"></iframe>
					</div>
				</div>
			</div>
			<!-- end: INLINE TABS PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>