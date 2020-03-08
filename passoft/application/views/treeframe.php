<style type="text/css">
    #printable { display: block; }
    @media print
    {
    	#non-printable { display: none; }
    	#printable { display: block; }
    }
/*    @media print {*/
/*    tr.vendorListHeading {*/
/*        background-color: red !important;*/
/*        -webkit-print-color-adjust: exact; */
/*    }*/
/*}*/

/*@media print {*/
/*    .vendorListHeading th {*/
/*        color: red !important;*/
/*    }*/
/*}*/
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
					<div class="col-sm-12">
						<IFRAME SRC="<?php echo base_url(); ?>subscriberController/tree" width="100%" height="66%" id="iframe1" style="border: 1px;" onLoad="autoResize('iframe1');"></iframe>
					</div>
				</div>
			</div>
			<!-- end: INLINE TABS PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>