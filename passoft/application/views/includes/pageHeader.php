<!-- start: MAIN CONTAINER -->
<div class="main-container inner">
<?php $school_code = $this->session->userdata("school_code");?>
<!-- start: PAGE -->
<div class="main-content">
<!-- start: PANEL CONFIGURATION MODAL FORM -->
<div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">Panel Configuration</h4>
            </div>
            <div class="modal-body">
                Here will be a configuration form
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">
                    Save changes
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- end: SPANEL CONFIGURATION MODAL FORM -->
<div class="container">
<!-- start: PAGE HEADER -->
<!-- start: TOOLBAR -->
<div class="toolbar row table-responsive">
    <div class="col-sm-4">
        <div class="page-header">
            <h1><?php echo $pageTitle; ?> <small><?php echo $smallTitle; ?> </small></h1>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="page-header">
             <?php if($this->session->userdata("login_type")=="1"){?>
             <center><a class="" style="font-size:16px; color: #f5f5f5;" href="#">Customer Care&nbsp;:<br>&nbsp;<i class="fa fa-phone"></i>+91-&nbsp;6389027901,&nbsp;6389027903,&nbsp;6389027904,&nbsp;6389027905
                <br>WhatsApp Number&nbsp;: <i class="fab fa-whatsapp"></i>+91-&nbsp;9580121878</a></center>
        <?php } else { ?>
            <center><a class="" style="font-size:16px; color: #f5f5f5;" href="#">Customer Care&nbsp;:<br>&nbsp;<i class="fa fa-phone"></i>+91-&nbsp;7394826066,&nbsp;9450536966
                <br>WhatsApp Number&nbsp;: <i class="fab fa-whatsapp"></i>+91-&nbsp;7394826066,&nbsp;9450536966</a></center>
        <?php } ?>
        </div>
    </div>
      <?php if($this->session->userdata("login_type")=="1"){?>
     <div class="col-sm-3" style="float:right; margin-top:15px;">
        <div class="page-header">
        <?php 
        $this->db->where("uname",'PASS');
		$sender=$this->db->get("sms_setting")->row(); 
        // $sender = $this->smsmodel->getsmssender($this->session->userdata("school_code"))->row(); ?>
        <a class="button_blink" href="#">Remaining SMS&nbsp;<br><?php echo checkBalSms($sender->uname,$sender->password);?></a>
        </div>
    </div>
    <?php } ?>
    
    <!--    <div class="col-sm-3 hidden-xs center">-->
    <!--    <div class="page-header">-->
    <!--        <small>Download our Android App <i class="fa fa-refresh fa-spin"></i> -->
    <!--        <h1> <a href="<?php echo base_url();?>assets/apk/niktech_software.apk" target="_blank" style="color:white;"><i class="fa fa-download"></i></a></h1>-->
    <!--        </small>-->
            
    <!--    </div>-->
    <!--</div>-->
    <!--====pcode=====-->
    <!--<div class="col-sm-6 col-xs-12">-->
    <!--    <a href="#" class="back-subviews">-->
    <!--        <i class="fa fa-chevron-left"></i> BACK-->
    <!--    </a>-->
    <!--    <a href="#" class="close-subviews">-->
    <!--        <i class="fa fa-times"></i> CLOSE-->
    <!--    </a>-->

    <!--    <div class="toolbar-tools pull-right">-->
            <!-- start: TOP NAVIGATION MENU -->
            <!--<ul class="nav navbar-right">-->
                <!-- start: TO-DO DROPDOWN -->
                <!--<li class="">-->
                <!--    <a class="" href="#">-->
                        <!--<i class="fa fa-download"></i> Our App-->
                <!--        <img src="<?php echo base_url();?>assets/apk/download6.gif" style="max-width:40px;"><p> Our App </p>-->
                <!--    </a>-->
                <!--</li>-->
                <!--<li class="dropdown">-->
                <!--    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">-->
                        <!--<i class="fa fa-plus"></i> SUBVIEW-->
                <!--        <div class="tooltip-notification hide">-->
                <!--            <div class="tooltip-notification-arrow"></div>-->
                <!--            <div class="tooltip-notification-inner">-->
                <!--                <div>-->
                <!--                    <div class="semi-bold">-->
                <!--                        Hi...-->
                <!--                    </div>-->
                <!--                    <div class="message">-->
                <!--                        <?php echo $this->session->userdata("name");?>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </a>-->
                    <!--<ul class="dropdown-menu dropdown-light dropdown-subview">-->

                    <!--    <li class="dropdown-header">-->
                    <!--        Notes-->
                    <!--    </li>-->
                    <!--    <li>-->
                    <!--        <a href="#newNote" class="new-note"><span class="fa-stack"> <i class="fa fa-file-text-o fa-stack-1x fa-lg"></i> <i class="fa fa-plus fa-stack-1x stack-right-bottom text-danger"></i> </span> Add new note</a>-->
                    <!--    </li>-->
                    <!--    <li>-->
                    <!--        <a href="#readNote" class="read-all-notes"><span class="fa-stack"> <i class="fa fa-file-text-o fa-stack-1x fa-lg"></i> <i class="fa fa-share fa-stack-1x stack-right-bottom text-danger"></i> </span> Read all notes</a>-->
                    <!--    </li>-->
                    <!--    <li class="dropdown-header">-->
                    <!--        Calendar-->
                    <!--    </li>-->
                    <!--    <li>-->
                    <!--        <a href="#newEvent" class="new-event"><span class="fa-stack"> <i class="fa fa-calendar-o fa-stack-1x fa-lg"></i> <i class="fa fa-plus fa-stack-1x stack-right-bottom text-danger"></i> </span> Add new event</a>-->
                    <!--    </li>-->
                    <!--    <li>-->
                    <!--        <a href="#showCalendar" class="show-calendar"><span class="fa-stack"> <i class="fa fa-calendar-o fa-stack-1x fa-lg"></i> <i class="fa fa-share fa-stack-1x stack-right-bottom text-danger"></i> </span> Show calendar</a>-->
                    <!--    </li>-->
                    <!--    <li class="dropdown-header">-->
                    <!--        Contributors-->
                    <!--    </li>-->
                    <!--    <li>-->
                    <!--        <a href="#newContributor" class="new-contributor"><span class="fa-stack"> <i class="fa fa-user fa-stack-1x fa-lg"></i> <i class="fa fa-plus fa-stack-1x stack-right-bottom text-danger"></i> </span> Add new contributor</a>-->
                    <!--    </li>-->
                    <!--    <li>-->
                    <!--        <a href="#showContributors" class="show-contributors"><span class="fa-stack"> <i class="fa fa-user fa-stack-1x fa-lg"></i> <i class="fa fa-share fa-stack-1x stack-right-bottom text-danger"></i> </span> Show all contributor</a>-->
                    <!--    </li>-->
                    <!--</ul>-->
                <!--</li>-->
                <?php  
            //     $v=$this->session->userdata('username');
			         //   $abc = $this->db->query("SELECT * FROM message WHERE reciever_id='$v' AND open='n' AND school_code ='$school_code'");
			         //   $total = $abc->num_rows();
			         //   $this->db->where("school_code",$this->session->userdata("school_code"));
			         //   $total1=$this->db->count_all("notice");
			         //   $totalNoti = $total1 + $total;
			            ?>

                <!--<li class="dropdown">-->
                    <!--<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">-->
                    <!--    <span class="messages-count badge badge-default hide">3</span> <i class="fa fa-envelope"></i> MESSAGES-->
                    <!--</a>-->
                    
                    <!--<a  href="<?php echo base_url();?>assets/apk/niktech_software.apk" target="_blank"">-->
                    <!--    <span class="messages-count badge badge-default hide">3</span> <img src="<?php echo base_url();?>assets/apk/download6.gif" style="max-width:40px; margin:0; padding:0;"><span style="margin-top:-5px;">  Download App </span>-->
                    <!--</a>-->
                    <!--<ul class="dropdown-menu dropdown-light dropdown-messages">-->
                    <!--    <li>-->
                    <!--        <span class="dropdown-header"> You have  messages</span>-->
                    <!--    </li>-->
                    <!--    <li>-->
                    <!--        <div class="drop-down-wrapper ps-container">-->
                    <!--            <ul>-->
                    <!--                <li class="unread">-->
                    <!--                    <a href="javascript:;" class="unread">-->

                    <!--                    </a>-->
                    <!--                </li>-->
                                    <?php  
                    //                 $v=$this->session->userdata('username');
								            //  $r = $this->db->query("select * from message where reciever_id='$v' AND school_code ='$school_code'")->result();
								            // foreach($r as $rcom):
								            ?>
								            <!--<ul class="pageslide-list">-->
								            <!--    <li>-->
								            <!--        <a href="<?php //echo base_url();?>msgNoticeControllers/showAllMessage/">-->
								            <!--            <span class="label label-primary"><?php //echo $rcom->reciever_id;?><i class="fa fa-user"></i></span>-->
								            <!--            <span class="message"> <?php //echo implode(' ',array_slice(explode(' ',$rcom->message),0,7));?>...</span>-->
								            <!--            <span class="time"> <?php //echo date("D/M",strtotime($rcom->send_date))." ".$rcom->send_time;?></span>-->
								            <!--        </a>-->
								            <!--    </li>-->
								               <?php //endforeach;?>
								            <!--</ul>  <li class="view-all">-->
                            <!--<a href="<?php echo base_url();?>msgNoticeControllers/showAllMessage">-->
                                <!--See All-->
    <!--                        </a>-->
    <!--                    </li>-->

    <!--                            </ul>-->
    <!--                        </div>-->

    <!--                    </li>-->

    <!--                </ul>-->
    <!--            </li>-->
    <!--        </ul>-->
            <!-- end: TOP NAVIGATION MENU -->
    <!--    </div>-->
    <!--</div>-->
</div>
<!-- end: TOOLBAR -->
<!-- end: PAGE HEADER -->
<!-- start: BREADCRUMB -->
<div class="container">
<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <?php echo $mainPage; ?>
                </a>
            </li>
            <li class="active">
                <?php echo $subPage; ?>
            </li>

        </ol>

       
    </div>
</div>
 <br>

<!-- end: BREADCRUMB -->