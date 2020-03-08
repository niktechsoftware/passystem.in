<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading panel-blue border-light">
                <h4 class="panel-title">Add Product Area </h4>
            </div>
            <div class="panel-body">

                <div class="col-md-12">
                    <div class="alert alert-info">
                        <button data-dismiss="alert" class="close"></button>
                        <h3 class="media-heading text-center">Welcome To Add And Update Product Area</h3>
                        Here you can add New Product and update product details in this page.

                    </div>
                    <div class="errorHandler alert alert-danger no-display">
                        <i class="fa fa-times-sign"></i> You have some form errors. Please check below.
                    </div>
                    <?php if($this->uri->segment(3)== 'false'){?>
                    <div class="successHandler alert alert-danger">
                        <i class="fa fa-ok"></i> <h4 style="color:red">Please Enter Same Hsn And Sec Number!!!!!</h4>
                    </div>
                    <?php }?>
                </div>
                <form action="<?php echo base_url();?>stockController/addproduct_value" method="post"
                    enctype="multipart/form-data" role="form" id="form">

                    <div class="row">
                        <div class="col-md-12 register-right"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div id="validId"></div>
                                <div id="validId1"></div>
                                <?php 
                                      
                                 $cat =$this->db->get("category")->result();?>
                            </div>
                            <div class="form-group">
                                <label><strong>Product Code<span style="color:red;"> *</span></strong> </label>
                                <input type="text" class="form-control text-uppercase" id="hsn" name="p_code"
                                    placeholder="Product Code (HSN)" required="" />
                                   <input type="hidden" class="form-control text-uppercase" id="hsn1" name="" />
                                   <input type="hidden" class="form-control text-uppercase" id="p_idd" name="p_idd" />
                            </div>
                            <div class="form-group" id="cate">
                                <label><strong>Product Category <span style="color:red;"> *</span></strong> </label>
                                <select name="category" id="cate1" class="form-control">
                                    <option value="" disabled selected>------ Select Category-------</option>
                                    <?php foreach($cat as $row):?>
                                    <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group" id="com">
                                <label><strong>Product Company Name <span style="color:red;"> *</span></strong> </label>
                                <input type="text" class="form-control text-uppercase" name="cname" id="cname"
                                    placeholder="Company Name" required="" />

                            </div>
                            <div class="form-group" id="companyname1">
                                <label><strong>Product Company Name <span style="color:red;"> *</span></strong> </label>
                                <input type="text" class="form-control text-uppercase" name="cname1" readonly
                                    id="companyname" placeholder="Company Name" required="" />

                            </div>

                            <div class="form-group" id="categoryname">
                                <label><strong>Product Category Name<span style="color:red;"> *</span></strong> </label>
                                <input type="text" class="form-control text-uppercase" readonly id="categoryname1" />


                            </div>
                            <div class="form-group" id="prnmae">
                                <label><strong>Product Name <span style="color:red;"> *</span></strong> </label>
                                <input type="text" class="form-control text-uppercase" name="name" id="name"
                                    placeholder="Product Name" required="" />
                            </div>

                            <div class="form-group" id="pna">
                                <label><strong>Product Name <span style="color:red;"> *</span></strong> </label>
                                <input type="text" class="form-control text-uppercase" name="name1" readonly id="pnname"
                                    placeholder="Product Name" required="" />
                            </div>
                            <div class="form-group" id="quantity">
                                <label><strong>Product Quantity</strong> </label>
                                <input type="text" class="form-control text-uppercase" name="quantity" id="quantity"
                                    placeholder="Product Quantity" value="0" required="" />
                            </div>
                            <div class="form-group" id="onupadtequantity1">
                                <label><strong>Product Quantity</strong> </label>
                                <input type="text" class="form-control text-uppercase" readonly name="quantity1"
                                    id="onupadtequantity" placeholder="Product Quantity" value="0" required="" />
                            </div>

                            <div class="form-group" id="extraqunatity">
                                <label><strong>Product Extra Qunatity</strong> </label>
                                <input type="text" class="form-control" id="extraqunatity1"
                                    placeholder="Product extra Quantity" />
                            </div>
                            <div class="form-group" id="file1">
                                <label><strong>Product File 1 <span style="color:red;"> *</span></strong> </label>
                                <input type="file" class="form-control" name="file1" placeholder="Image 1"
                                    required="" />
                            </div>
                            <div class="form-group" id="file2">
                                <label><strong>Product File 2<span style="color:red;"> *</span></strong> </label>
                                <input type="file" class="form-control" name="file2" placeholder="Image 2"
                                    required="" />
                            </div>

                            <div class="form-group" id="billno">
                                <label><strong>Purchase Invoice NO</strong> </label>
                                <input type="text" class="form-control" name="invoice_no" id="invoice_no"
                                    placeholder="Invoice Number">
                            </div>
                            <div class="form-group" id="cgst1">
                                <label><strong>CGST Amount</strong> </label>
                                <input type="text" class="form-control" name="cgst" id="cgst" placeholder="CGST Amount">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                                <label><strong>Product Serial Number</strong> </label>
                                <input type="text" class="form-control text-uppercase" name="sno" id="sno"
                                    placeholder="Product Code (SEC)" />
                            </div>
                            <div class="form-group" id="sub_category1">
                                <label><strong>Product Sub Category <span style="color:red;"> *</span></strong> </label>
                                <select name="sub_category" id="sub_category" class="form-control text-uppercase">
                                    <option value="" disabled selected></option>

                                </select>
                            </div>
                            <div class="form-group" id="sub_categoryname">
                                <label><strong>Product Sub Category</strong> </label>
                                <input type="text" class="form-control text-uppercase" readonly
                                    id="sub_categoryname1" />
                            </div>

                            <div class="form-group" id="hideee">
                                <label><strong>Product Type</strong> </label>
                                <input type="text" name="scname" id="scname" class="form-control text-uppercase"
                                    placeholder="Type Of Product" />
                            </div>
                            <div class="form-group" id="ptp1">
                                <label><strong>Product Type</strong> </label>
                                <input type="text" name="scname1" id="ptp" readonly class="form-control text-uppercase"
                                    placeholder="Type Of Product" />
                            </div>
                            <div class="form-group" id="size1">
                                <label><strong>Product Size<span style="color:red;"> *</span></strong> </label>
                                <input type="text" class="form-control text-uppercase" name="size" id="size"
                                    placeholder="Product Size" required="" />
                            </div>
                            <div class="form-group" id="size21">
                                <label><strong>Product Size<span style="color:red;"> *</span></strong> </label>
                                <input type="text" class="form-control text-uppercase" readonly name="size1" id="size2"
                                    placeholder="Product Size" required="" />
                            </div>
                            <div class="form-group" id="price1">
                                <label><strong>Our Price<span style="color:red;"> *</span></strong> </label>
                                <input type="text" class="form-control text-uppercase" name="price" id="price"
                                    placeholder="Product Price" required="" />
                            </div>
                            <div class="form-group" id="price1">
                                <label><strong>MRP Price<span style="color:red;"> *</span></strong> </label>
                                <input type="text" class="form-control text-uppercase" name="mrpprice" id="mrpprice"
                                    placeholder="MRP Product Price" required="" />
                            </div>
                            <!--<div class="form-group" id="price21">-->
                            <!--  <label><strong>Product Price<span style="color:red;"> *</span></strong> </label>-->
                            <!--  <input type="text" class="form-control text-uppercase" readonly name="price1" id="price2"-->
                            <!--    placeholder="Product Price" required="" />-->
                            <!--</div>-->

                            <div class="form-group" id="file4">
                                <label><strong>Offer Image</strong> </label>
                                <input type="file" class="form-control" name="file3" placeholder="Offer Image">
                            </div>

                            <div class="form-group" id="Purchase_total">
                                <label><strong>Total Purchase Amount</strong> </label>
                                <input type="text" class="form-control" name="totamount" id="total_amount" readonly
                                    placeholder="Purchase Total Amount" required="" />
                            </div>

                            <div class="form-group" id="sgst1">
                                <label><strong>SGST Amount</strong> </label>
                                <input type="text" class="form-control" name="sgst" id="sgst" placeholder="SGST Amount">
                            </div>
                            <!--<div class="form-group">-->
                            <!--  <input type="submit" class="btnRegister"  value="Register"/>-->
                            <!--</div>-->
                            <div class="form-group" id="productadd" style="margin-top:50px;">

                                <button type="submit" class=" form-control btn-primary" id="productadd">Add
                                    Product</button>
                            </div>
                            <div class="form-group">
                                <button type="submit" class=" form-control btn-danger" id="updatequantity">Update
                                    product & Qunatity</button>
                            </div>
                            <input type="hidden" class="form-control" name="total_amount" id="total_amount1"
                                placeholder="Purchase Total Amount" required="" />

                        </div>

                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
jQuery(document).ready(function() {


    $("#validId").hide();
    $("#categoryname").hide();
    $("#sub_categoryname").hide();
    $("#extraqunatity").hide();
    $("#updatequantity").hide();
    $("#onupadtequantity1").hide();
    $("#companyname1").hide();
    $("#ptp1").hide();
    $("#pna").hide();
    $("#size21").hide();

    $("#hsn").change(function() {


        var cat = $("#hsn").val();
        //alert(cat);
        $.post("<?php echo site_url("stockController/checkp_code") ?>", {
            cat: cat
        }, function(data) {
            //alert(data);
            var d = jQuery.parseJSON(data);
           // alert(data);
            $("#validId").show();

            $("#validId").html(d.msg);
            $("#hsn1").val(d.hsn);
            $("#cname").val(d.cname);
            $("#p_idd").val(d.idd);
            $("#companyname").val(d.cname);
            $("#name").val(d.name);
            $("#pnname").val(d.name);
            $("#quantity").val(d.quantity);
            $("#onupadtequantity").val(d.quantity);
            $("#sno").val(d.sno);
            $("#scname").val(d.scname);
            $("#ptp").val(d.scname);
            $("#categoryname1").val(d.cat);
            $("#sub_categoryname1").val(d.subcat);
            $("#size").val(d.size);
            $("#size2").val(d.size);
            $("#price").val(d.price);
             $("#mrpprice").val(d.mrpprice);
            $("#price2").val(d.price);
            if (d.quantity >= 0) {
                $("#extraqunatity").show();
                $("#cate").hide();
                $("#quantity").hide();
                $("#sub_category1").hide();
                $("#categoryname").show();
                $("#sub_categoryname").show();
                $("#file1").hide();
                $("#onupadtequantity1").show();
                $("#companyname1").show();
                 $("#categoryname1").show();
                  $("#sub_categoryname1").show();
                $("#file2").hide();
                $("#com").hide();
                $("#ptp1").show();
                $("#file3").hide();
                $("#pna").show();
                $("#hideee").hide();
                $("#size1").hide();

                $("#size21").show();

                $("#prnmae").hide()
                $("#file4").hide();
                $("#productadd").hide();
                $("#updatequantity").show();

            }


        });

    });


    $("#invoice_no").keyup(function() {

        var cat = $("#invoice_no").val();
        //	alert(cat);
        $.post("<?php echo site_url("stockController/checkp_billno") ?>", {
            cat: cat
        }, function(data) {
            var d = jQuery.parseJSON(data);
            //alert(data);
            $("#validId1").show();

            $("#validId1").html(d.msg);
            // $("#hsn").val(d.hsn);
            $("#cgst").val(d.cgst);
            $("#sgst").val(d.sgst);
            $("#invoice_no").val(d.bill_no);
            $("#total_amount1").val(d.totalamount);

        });

    });

    $("#extraqunatity1").change(function() {
        var oldQt = Number($("#quantity").val());
        var newQt = Number($("#extraqunatity1").val());
        var add = oldQt + newQt;
        $("#quantity").val(add);

    });



    $("#updatequantity").click(function() {

        var hsn1 = $("#hsn").val();
     
        var hsn = $("#hsn1").val();
        var idd2 = $('#p_idd').val();
        var price = $("#price").val();
        var sec = $("#sno").val();
        var Qt = Number($("#quantity").val());
        var Qt1 = Number($("#extraqunatity1").val());
        var invoice_no = $('#invoice_no').val();
        var cgst = $('#cgst').val();
        var total_amount = $('#total_amount').val();
        var mrpprice = $('#mrpprice').val();
        var sgst = $('#sgst').val();
        // alert(hsn + Qt);
        if(sec.toUpperCase() == hsn1.toUpperCase())
        {
            if (Qt1 != 0 || price != 0 || sec != " ") {
            $.post("<?php echo site_url('stockController/updatequantity')?>", {
                hsn: hsn,
                hsn1: hsn1,
                price: price,
                idd2: idd2,
                sec: sec,
                Qt: Qt,
                Qt1: Qt1,
                invoice_no: invoice_no,
                cgst: cgst,
                total_amount: total_amount,
                sgst: sgst,
                mrpprice : mrpprice
            }, function(data) {
                // alert(data);
                $("#updatequantity").html(data);
                alert("Updated Successfully");
                window.location.reload();
            });
            } else {
                alert('Sorry!Please Update Somthing');
                return false;
    
            }
        }
        else
        {
            alert(hsn1+" "+sec);
            alert("Enter Same Sec And Hsn");
        }
    });



$("#cate1").change(function() {
    var classv = $("#cate1").val();
    //alert(classv);
    $.post("<?php echo site_url("/stockController/getsubcat") ?>", {
        classv: classv
    }, function(data) {
        $("#sub_category").html(data);
        //alert("data");
    });

});

$("#total_amount").mouseover(function() {
    var totamount = Number($("#total_amount1").val());
    var quantity = Number($("#quantity").val());
    var exquantity = $("#extraqunatity1").val();
    var price = Number($("#price").val());
    if (exquantity == "") {
        var totp = quantity * price;
    } else {
        var exquantity1 = Number($("#extraqunatity1").val());
        var totp = exquantity1 * price;

    }

    var totalamt = totp + totamount;
    //alert(totalamt);
    $("#total_amount").val(totalamt);

});
});
</script>