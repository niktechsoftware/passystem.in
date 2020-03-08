<div class="container">
        <div class="row">


        <div class="col-lg-6">
                <h3>Login</h3>
                                <div class="theme-card">
                    <form class="theme-form" method="post" action="<?php echo base_url();?>passoft/login/authentication">
                        <div class="form-group">

                            <label for="email">UserID </label>
                            <input type="text" class="form-control" id="cusername" name="username" placeholder="User ID" style="text-transform: uppercase;">
                        </div>
                        <div class="form-group">
                            <label for="review">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                           <div style="text-align:right;">
                            <!--<a href="#" style="color:#f20089;" id="show">Forgot Password</a>-->
                            </div>
                        </div>

                        <button class=" btn button contact_submit_button" style="background: rgb(242, 0, 137); color:white;" type="submit">Login</button>
                    </form>
                </div>
            </div>

        <div class="col-lg-6">
                <h3>New SubsCriber</h3>
                <div class="theme-card authentication-right">
                    <h6 class="title-font">Create An Account</h6>
                    <p>Sign up for a free account at our store. Registration is quick and easy. It allows you to be able
                        to order from our shop. To start shopping click register.</p>
                    <a href="<?php echo base_url();?>index.php/auth/signupSubscriber" class="btn btn-solid" style="color:#f20089;">Create an
                        Account</a>
                </div>
            </div>



           

        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>

    $(document).ready(function(){
      $('.theme-card').css({

        'padding': '30px',
        'border': '1px solid #dddddd',
        'line-height': '1',
        'position': 'relative',
        'display':'block'
      });
      
      $('h3').css({
        'padding' : '10% 0 4% 0',
      });

      $('.form-control').css({

        'padding': '14px 20px',
        'margin-bottom' : '20px'

      });





    })
    </script>