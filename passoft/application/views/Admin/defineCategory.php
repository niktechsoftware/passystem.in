<!-- start: PAGE CONTENT -->
<div class="row">
  <div class="col-sm-12">
    <!-- start: INLINE TABS PANEL -->
    <div class="panel panel-white">
      <!-- <div class="panel-heading">
										<div class="panel-tools">
											<div class="dropdown">
											<a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
												<i class="fa fa-cog"></i>
											</a>
											<ul class="dropdown-menu dropdown-light pull-right" role="menu">
												<li>
													<a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
												</li>
												<li>
													<a class="panel-refresh" href="#"> <i class="fa fa-refresh"></i> <span>Refresh</span> </a>
												</li>
												<li>
													<a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a>
												</li>
											</ul>
											</div>
										</div>
									</div> -->
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="tabbable">
              <ul id="myTab" class="nav nav-tabs">
                <li class="active">
                  <a href="#myTab_example1" data-toggle="tab">
                    <i class="green fa fa-home"></i> Defne Category
                  </a>
                </li>
                <li>
                  <a href="#myTab_example2" data-toggle="tab">
                    <i class="green fa fa-home"></i> Define Sub Category
                  </a>
                </li>
            
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade in active" id="myTab_example1">
                  <div class="alert panel-pink">
                    <button data-dismiss="alert" class="close"></button>
                    <h3 class="media-heading text-center">Welcome to Stock Category Section.</h3>
                    <a class="alert-link" href="#"></a>
                    This is very important to create Category first because Stock  requires a valid
                    Category.You should not change Category after creating and declare the Stocks. If you
                    change it may affect your Stock and product.<p>If you want to <strong>Add</strong> a new
                      Category to PASS System, Please type in the Category Name into the box given below the Category
                      Name and Press <strong>Add Category </strong> Button.To <strong>Edit</strong> existing Category Edit
                      it's Name and Press <strong>Edit</strong> Button , And to <strong>Delete</strong> a Category simply Press <strong>Delete</strong> Button.
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="panel panel-calendar">
                        <div class="panel-heading panel-blue border-light">
                          <h4 class="panel-title">Define Category</h4>
                        </div>
                        <div class="panel-body">
                          <div class="text-black text-large">
                          <span id="message"></span>
                          <input type="text" id="addStream" class="text-uppercase"  maxlength="50" onkeypress="return isAlaphabte(event)">
                            <a href="#" class="btn btn-sm btn-blue" id="addStreamButton"><i class="fa fa-check"></i>
                              Add Category</a></<br><br><br>
                            <div class="alert alert-warning"> Type a Category Name and Press Add Category.If Category added
                              successfully then it show in right side panel where you can change the Name and Delete it.
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="panel panel-calendar">
                        <div class="panel-heading panel-green border-light">
                          <h4 class="panel-title">Category List</h4>
                        </div>
                        <div class="panel-body" id="streamList1">

                        </div>
												<div class="container">
                        <div class="alert alert-success">
                          You can <strong>Edit </strong> or <strong>Delete </strong>
                          Category by Press concern Button it sure that you have not created
                          Stock and classes depending Edited or Deleted Category.</div>
                      </div>
											</div>
                    </div>
                  </div>
                </div>
               
                <div class="tab-pane fade" id="myTab_example2">
                  <div class="alert btn-azure">
                    <button data-dismiss="alert" class="close">
                      ×
                    </button>
                    <h3 class="media-heading text-center">Welcome To Add Sub-Category Area </h3>
                    <a class="alert-link" href="#"></a>
                   You should not change sub category name after creating and declare the Stocks and
                    Products.If you change it may affect your pass products. <br>If you
                    want to <strong>Add</strong> a new sub category to your System, Please type in the <strong> Sub category
                      Name</strong> into the box given below the <strong>Sub Category column</strong> and press 
                    <strong>Add Sub Category</strong> Button.To <strong>Edit</strong> existing Sub Category Edit it's Name and
                    Press <strong>Edit</strong> Button next to the row ,
                    And to <strong>Delete</strong> a Section simply Press <strong>Delete</strong> Button.
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="panel panel-calendar">
                        <div class="panel-heading panel-red border-light">
                          <h4 class="panel-title">Add Sub Category</h4>
                        </div>
                        <div class="panel-body">

                        <div class="row">
                         <div class="col-sm-6">
                         <div class="text-white text-large">
                            <!-- <span id="nameCate" Style="color:red;">Select Category </span> -->

                          

										<label class="control-label">
											Select Category<span class="symbol"></span>
										</label>
										<select class="form-control" name="sub_cate" id="sub_cate" >
		                                      <option value="">Categories</option>
		                                      <?php $category = $this->db->get("category");
		                                      foreach($category->result() as $c):?>
		                                      <option value="<?php echo $c->id; ?>"><?php echo $c->name;?></option>
		                                     <?php endforeach;?>
	                                	</select>
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="text-white text-large">
	                                	<label class="control-label ">
											Sub Category Name <span class="symbol"></span>
										</label>
                            <input type="text" minLength="1" maxLength="50" class="text-uppercase" id="addSubCategory">
                            <a style="margin-top:10px;" href="#" class="btn btn-sm btn-light-red" id="addSectionButton"><i
                                class="fa fa-check"></i> Add Sub Category</a>
                           
                            <br>
                           
                          </div>
                        </div>
                        <div class="alert alert-warning"> Type a Sub Category Name and Press Add Sub Category.If Sub Category added
                              successfully then it show in right side panel where you can change the Name and Delete it.
                              <h1>
                            </div>
                      </div>
                      </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="panel panel-calendar">
                        <div class="panel-heading panel-blue border-light">
                          <h4 class="panel-title">Sub Category List</h4>
                        </div>
                        <div class="panel-body" id="sectionList">
                            
                        </div>
                        <div class="alert alert-success">
                          <p>You can <strong>edit </strong> or <strong> Delete </strong>Sub Category by press concern Button
                            it sure that you have not created
                            Stock and Category depending Edited or Deleted Section.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               
            </div>
          </div>
        </div>
      </div>
      <!-- end: INLINE TABS PANEL -->
    </div>
  </div>
</div>
</div>
<!-- end: PAGE CONTENT-->
	<script>
					   
	               //         Main.init();
				            // SVExamples.init();
					</script>
