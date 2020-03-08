</div><!--  end paig Container -->
</div>
<div class="subviews">
    <div class="subviews-container"></div>
</div>
</div>
<!-- end: PAGE -->
</div>
<!-- end: MAIN CONTAINER -->
<!-- start: FOOTER -->
<footer class="inner">
    <div class="footer-inner">
        <div class="pull-left">
            <?php echo $this->lang->line('common_copy_right'); ?>
        </div>
        <div class="pull-right">
            <span class="go-top"><i class="fa fa-chevron-up"></i></span>
        </div>
    </div>
</footer>
<!-- end: FOOTER -->
<!-- start: SUBVIEW SAMPLE CONTENTS -->
<!-- *** NEW NOTE *** -->
<div id="newNote">
    <div class="noteWrap col-md-8 col-md-offset-2">
        <h3>Add new note</h3>
        <form action="<?php echo base_url()?>index.php/msgNoticeControllers/priveateNote" method="post">
            <div class="form-group">
            	<input type="hidden" name="username" value="<?php echo $this->session->userdata("username");?>">
                <input class="note-title form-control" name="noteTitle" type="text" placeholder="Note Title...">
            </div>
            <div class="form-group">
                <textarea class="summernote" name="noteEditor" rows="10" cols="100" placeholder="Write note here..."></textarea>
            </div>
            <div class="pull-right">
                <div class="btn-group">
                    <a href="#" class="btn btn-info close-subview-button">
                        Close
                    </a>
                </div>
                <div class="btn-group">
                    <button class="btn btn-info save-note" type="submit">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- *** READ NOTE *** -->
<div id="readNote">
    <div class="barTopSubview">
        <a href="#newNote" class="new-note button-sv"><i class="fa fa-plus"></i> Add new note</a>
    </div>
    <div class="noteWrap col-md-8 col-md-offset-2">
        <div class="panel panel-note">
            <div class="e-slider owl-carousel owl-theme">
            
            <?php $this->db->where("user_id",$this->session->userdata("userid")); ?>
            <?php 
            $this->db->where("school_code",$this->session->userdata("school_code"));
            $res = $this->db->get("privatenote"); ?>
            <?php foreach($res->result() as $row):?>
                <div class="item">
                    <div class="panel-heading">
                        <h3><?php echo $row->title; ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="note-short-content">
                            <?php echo implode(' ', array_slice(explode(' ', $row->note), 0, 20)); ?>...
                        </div>
                        <div class="note-content">
                            <?php echo $row->note; ?>
                        </div>
                        <div class="note-options pull-right">
                            <a href="#readNote" class="read-note">
                            	<i class="fa fa-chevron-circle-right"></i> Read</a>
                            	<a href="<?php echo base_url()?>index.php/msgNoticeControllers/delNotice1/<?php echo $row->id;?>" class="delete-note">
                            		<i class="fa fa-times"></i> Delete
                            	</a>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <time class="timestamp" title="<?php echo $row->date; ?>">
                            <?php echo $row->date; ?>
                        </time>
                    </div>
                </div>
            <?php endforeach;?>
                
                
            </div>
        </div>
    </div>
</div>
<!-- *** SHOW CALENDAR *** -->
<div id="showCalendar" class="col-md-10 col-md-offset-1">
    <div class="barTopSubview">
        <a href="#newEvent" class="new-event button-sv" data-subviews-options='{"onShow": "editEvent()"}'><i class="fa fa-plus"></i> Add new event</a>
    </div>
    <div id="calendar"></div>
</div>
<!-- *** NEW EVENT *** -->
<div id="newEvent">
    <div class="noteWrap col-md-8 col-md-offset-2">
        <h3>Add new event</h3>
        <form class="form-event" action="<?php echo base_url()?>index.php/msgNoticeControllers/saveEvent" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input class="event-id hide" type="text">
                        <input class="event-name form-control" name="eventName" type="text" placeholder="Event Name...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="checkbox" class="all-day" data-label-text="All-Day" data-on-text="True" data-off-text="False">
                    </div>
                </div>
                <div class="no-all-day-range">
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="form-group">
								<span class="input-icon">
									<input type="text" class="event-range-date form-control" name="eventRangeDate" placeholder="Range date"/>
									<i class="fa fa-clock-o"></i> </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="all-day-range">
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="form-group">
											<span class="input-icon">
												<input type="text" class="event-range-date form-control" name="ad_eventRangeDate" placeholder="Range date"/>
												<i class="fa fa-calendar"></i> </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hide">
                    <input type="text" class="event-start-date" name="eventStartDate"/>
                    <input type="text" class="event-end-date" name="eventEndDate"/>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <select class="form-control selectpicker event-categories">
                            <option data-content="<span class='event-category event-cancelled'>Cancelled</span>" value="event-cancelled">Cancelled</option>
                            <option data-content="<span class='event-category event-home'>Home</span>" value="event-home">Home</option>
                            <option data-content="<span class='event-category event-overtime'>Overtime</span>" value="event-overtime">Overtime</option>
                            <option data-content="<span class='event-category event-generic'>Generic</span>" value="event-generic" selected="selected">Generic</option>
                            <option data-content="<span class='event-category event-job'>Job</span>" value="event-job">Job</option>
                            <option data-content="<span class='event-category event-offsite'>Off-site work</span>" value="event-offsite">Off-site work</option>
                            <option data-content="<span class='event-category event-todo'>To Do</span>" value="event-todo">To Do</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="summernote" placeholder="Write note here..."></textarea>
                    </div>
                </div>
            </div>
            <div class="pull-right">
                <div class="btn-group">
                    <a href="#" class="btn btn-info close-subview-button">
                        Close
                    </a>
                </div>
                <div class="btn-group">
                    <button class="btn btn-info" type="submit">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- *** READ EVENT *** -->
<div id="readEvent">
    <div class="noteWrap col-md-8 col-md-offset-2">
        <div class="row">
            <div class="col-md-12">
                <h2 class="event-title">Event Title</h2>
                <div class="btn-group options-toggle pull-right">
                    <button class="btn dropdown-toggle btn-transparent-grey" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                        <span class="caret"></span>
                    </button>
                    <ul role="menu" class="dropdown-menu dropdown-light pull-right">
                        <li>
                            <a href="#newEvent" class="edit-event">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                        </li>
                        <li>
                            <a href="#" class="delete-event">
                                <i class="fa fa-times"></i> Delete
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <span class="event-category event-cancelled">Cancelled</span>
                <span class="event-allday"><i class='fa fa-check'></i> All-Day</span>
            </div>
            <div class="col-md-12">
                <div class="event-start">
                    <div class="event-day"></div>
                    <div class="event-date"></div>
                    <div class="event-time"></div>
                </div>
                <div class="event-end"></div>
            </div>
            <div class="col-md-12">
                <div class="event-content"></div>
            </div>
        </div>
    </div>
</div>
<!-- *** NEW CONTRIBUTOR *** -->
<div id="newContributor">
    <div class="noteWrap col-md-8 col-md-offset-2">
        <h3>Add new contributor</h3>
        <form class="form-contributor">
            <div class="row">
                <div class="col-md-12">
                    <div class="errorHandler alert alert-danger no-display">
                        <i class="fa fa-times-sign"></i> You have some form errors. Please check below.
                    </div>
                    <div class="successHandler alert alert-success no-display">
                        <i class="fa fa-ok"></i> Your form validation is successful!
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="contributor-id hide" type="text">
                        <label class="control-label">
                            First Name <span class="symbol required"></span>
                        </label>
                        <input type="text" placeholder="Insert your First Name" class="form-control contributor-firstname" name="firstname">
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            Last Name <span class="symbol required"></span>
                        </label>
                        <input type="text" placeholder="Insert your Last Name" class="form-control contributor-lastname" name="lastname">
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            Email Address <span class="symbol required"></span>
                        </label>
                        <input type="email" placeholder="Text Field" class="form-control contributor-email" name="email">
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            Password <span class="symbol required"></span>
                        </label>
                        <input type="password" class="form-control contributor-password" name="password">
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            Confirm Password <span class="symbol required"></span>
                        </label>
                        <input type="password" class="form-control contributor-password-again" name="password_again">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">
                            Gender <span class="symbol required"></span>
                        </label>
                        <div>
                            <label class="radio-inline">
                                <input type="radio" class="grey contributor-gender" value="F" name="gender">
                                Female
                            </label>
                            <label class="radio-inline">
                                <input type="radio" class="grey contributor-gender" value="M" name="gender">
                                Male
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            Permits <span class="symbol required"></span>
                        </label>
                        <select name="permits" class="form-control contributor-permits" >
                            <option value="View and Edit">View and Edit</option>
                            <option value="View Only">View Only</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="fileupload fileupload-new contributor-avatar" data-provides="fileupload">
                            <div class="fileupload-new thumbnail"><img src="assets/images/anonymous.jpg" alt="" width="50" height="50"/>
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail"></div>
                            <div class="contributor-avatar-options">
											<span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> Select image</span><span class="fileupload-exists"><i class="fa fa-picture-o"></i> Change</span>
												<input type="file">
											</span>
                                <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                    <i class="fa fa-times"></i> Remove
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            SEND MESSAGE (Optional)
                        </label>
                        <textarea class="form-control contributor-message"></textarea>
                    </div>
                </div>
            </div>
            <div class="pull-right">
                <div class="btn-group">
                    <a href="#" class="btn btn-info close-subview-button">
                        Close
                    </a>
                </div>
                <div class="btn-group">
                    <button class="btn btn-info save-contributor" type="submit">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- *** SHOW CONTRIBUTORS *** -->
<div id="showContributors">
    <div class="barTopSubview">
        <a href="#newContributor" class="new-contributor button-sv"><i class="fa fa-plus"></i> Add new contributor</a>
    </div>
    <div class="noteWrap col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <div id="contributors">
                    <div class="options-contributors hide">
                        <div class="btn-group">
                            <button class="btn dropdown-toggle btn-transparent-grey" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                                <span class="caret"></span>
                            </button>
                            <ul role="menu" class="dropdown-menu dropdown-light pull-right">
                                <li>
                                    <a href="#newContributor" class="show-subviews edit-contributor">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="delete-contributor">
                                        <i class="fa fa-times"></i> Delete
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end: SUBVIEW SAMPLE CONTENTS -->

<?php echo $this->load->view($footerJs); ?>
</body>
<!-- end: BODY -->
</html>