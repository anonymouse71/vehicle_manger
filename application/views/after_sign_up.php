<!DOCTYPE html>
<html>
<head>
	<title>Vehicle Manager</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>bootstrap/css/reset_css.css">
    <script src="<?php echo base_url();?>bootstrap/js/jquery.min.js"></script>
    <style type="text/css">
        .container_main{
            width: 1280px;
            margin: auto;
            height:700px;
        }
        .container_main > div{
            height: 100%;
           float: left;
        }
        .left_container{
            width:300px;
            
        }
        .middle_container{
            width:680px;
            
        }
        .right_container{
            width:300px;
           
        }
         .about_div{
            background: url('<?php echo base_url();?>images/about_holder.png');
            margin-top: 60%;
            padding: 40px 55px 0 0px;
            background-repeat: no-repeat;
            margin-left: -7%;
        }
        .slider_div{
            width: 94%;
margin: 20px;
margin-top: 60px;
        }
        .menu_div{
            padding: 20px;
        }
        .menu_div ul li{
            float: left;
            padding:0 44px;
            font-family: Ravie;
            color: #339999;
        }
        a:hover{
           color: #ff8128;
        }
        #sign_up_form_div{
            display: none;
        }
        #sign_in_form_div{
            margin-top:100px;
        }
        .double_div{
            width: 100%;
            height: 100%;
        }
        .double_div div{
            width: 100%;
            height: 100%;
        }
        .double_div div div div{
            width: 50%;
            height: 100%;
            float: left;
        }
        .double_div div div
        {
            height:84%;
        }
        .double_div > div > p{
            padding: 10px;
            color:#339999;
            font-family: Ravie;
        }
        table td{
            padding: 10px;
            font-family: Rockwell;
        }
        table{
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container_main">
        <div class="left_container">
            <img src="<?php echo base_url();?>images/logo.png" style="width:100%;"/>
            <div>
                <h2 style="font-family: Ravie; color: #339999;font-size:20px;">Vehicle Manager</h2>
                <p style="font-family: Rockwell; color: #000000;font-size:11px;margin-left:23px;">A vehicle tracking solution</p>
            </div>
            <div class="about_div">
                <h2 style="font-family: Ravie;color: #02c0ff;font-size: 25px;text-align: center;">About</h2>
                <p style="font-family: Rockwell;text-align: center;padding: 30px;">This is vehicle tracking
                    website dedicated to the
                    security of a vehcle, the 
                    owner can list his vehicle
                    in the database and enter
                    his vehicle information. If
                    the vehicle is stolen the 
                    website will view it as stolen
                    and notify all about the theft
                    thus anyone seeing the stolen 
                    vehicle can report</p>
            </div>
        </div>
        <div class="middle_container">
            <img src="<?php echo base_url();?>images/logo_house.png" style="width:100%;">
            <div class="menu_div">
                <ul>
                    <li><a href="<?php echo base_url();?>">Home</a></li>
                    <li><a href="" id="sign_up_button">Sign Up</a></li>
                    <li><a href="" id="sign_in_button">Sign In</a></li>
                    <li><a href="<?php echo base_url().'index.php/home/search';?>">Search</a></li>
                </ul>
            </div>
            <div class="slider_div">
                <p style="padding: 10px;text-align: center;font-family: Rockwell;font-size: 25px;">Sign Up Succesfull</p>
                <p style="padding: 20px;text-align: center;font-family: Ravie;color: rgb(43, 99, 128);">Dear User , You Have Succesfully Signed Up,You can Log in Now with your Username and Password</p>
            </div>
        </div>
        <div class="right_container">
            <img src="<?php echo base_url();?>images/logo_plane.png" style="width:100%;">
            <div id="sign_up_form_div">
                <h2 style="color: #ff8128;font-family: Ravie;text-align: center;font-size: 25px;padding: 25px;">Sign Up</h2>
                <form style="margin-left:50px;" action="<?php echo base_url().'index.php/home/validateSignUpForm' ?>" method="POST">
                    <input name="name" type="text" id="inputName" value = "" placeholder="Name"/>
                    <input name="address" type="text" id="inputAddress" value = "" placeholder="Address"/>
                    <input name="contact_no" type="text" id="inputContactNo" value = "" placeholder="Contact No"/>
                    <input type="text" name="username" id="inputUsername" value = "" placeholder="Username"/>
                    <input type="password" name="password" placeholder="Password" id="inputPassword" placeholder="Password"/>
                    <input type="password" name="repass" id="inputRePassword" placeholder="Re-type-Password"/>
                    <input type="text" id="inputEmail" name="email" value = "" placeholder="Email"/><br>
                    <button type="submit" class="btn">Sign Up</button><br>
                </form>
            </div>
            <div id="sign_in_form_div">
                <h2 style="color: #ff8128;font-family: Ravie;text-align: center;font-size: 25px;padding: 25px;">Sign In</h2>
                <form style="margin-left:50px;" action="<?php echo base_url().'index.php/home/validateLoginForm' ?>" method="POST">
                    <input type="text" name="username" id="inputUsername" value = "<?php echo $this->input->post('username');?>" placeholder="Username"/>
                    <input type="password" name="password" placeholder="Password" id="inputPassword" placeholder="Password"/>
                    <button type="submit" class="btn">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        $('#sign_in_button').click(function(){

            
             $('#sign_up_form_div').slideUp(200);
             $('#sign_in_form_div').slideDown(400);
             return false;
        });
        $('#sign_up_button').click(function(){
            $('#sign_in_form_div').slideUp(200);
             $('#sign_up_form_div').slideDown(400);
             return false;
        });
    });
</script>