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
            border: 1px solid gray;
            margin: 20px;
        }
        .double_div > div > p{
            padding: 10px;
        }
        .double_div > div{
            display: none;
        }
        .menu_div{
            padding: 20px;
        }
        .menu_div ul li{
            float: left;
            padding:0 30px;
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
        .profile_info_div table{
            margin-left: 50px;
        }
        .profile_info_div table td{
            padding: 10px;
            font-family: impact;
           color: rgb(65, 153, 213);
        }
        .slider_div table td{
            padding: 10px;
            font-family: impact;
            color: rgb(38, 86, 124);
        }
        table{
            width: 100%;
        }
        .error{
            padding: 10px 10px 10px 0;
            color: rgb(255, 0, 0);
            font-family: Segoe Print;
        }
        .recent_para{
            font-family: fantasy;
            color: rgb(255, 134, 134);
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
                    <?php if($this->session->userdata('logged_in') == 'yes'): ?>
                        <li><a href="<?php echo base_url().'index.php/home/loggedin';?>" id="profile_details">Profile Details</a></li>
                         <li><a href="<?php echo base_url().'index.php/home/logout';?>" id="sign_out">Sign Out</a></li>
                    <?php else: ?>
                        
                    <?php endif; ?>
                    
                    <li><a href="<?php echo base_url().'index.php/home/search';?>">Search</a></li>
                </ul>
            </div>
            <div class="slider_div">
                <div class="double_div">
                    <?php
                        $i = 0;
                        foreach ($recent_lost->result_array() as $key): 
                    ?>
                    <?php 
                        if($i == 3)
                        {
                            break;
                        } 
                    ?>
                    <div class="slide_div_<?php echo $i++;?>">
                        <p class="recent_para">Recently Lost Vehicle.</p>
                         <div style="width:100%;">
                             <div style="width:50%;float:left;">
                                <?php 
                                    $link = $this->photo->getPhotosActive($key['chassis_no'])->row()->link;
                                       
                                 ?>
                                <table>
                                    <tr>
                                        <td>Brand :</td>
                                        <td><?php echo $key['brand_name'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Model :</td>
                                        <td><?php echo $key['model_name'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Chassis No :</td>
                                        <td><?php echo $key['chassis_no'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Owner Name :</td>
                                        <td><?php echo $key['name'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Contact :</td>
                                        <td><?php echo $key['contact'];?></td>
                                    </tr>
                                </table>
                             </div>
                             <div style="width:50%;float:left;">
                                    <a href="<?php echo base_url(); ?>/index.php/home/details/<?php echo $key['chassis_no']; ?>/<?php echo $key['username']; ?>"><img style="width:70%;" src="<?php echo base_url().$link;?>"></a>
                             </div>
                             <div style="clear:both;"></div>
                         </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="right_container">
            <img src="<?php echo base_url();?>images/logo_plane.png" style="width:100%;">
            <?php if($this->session->userdata('logged_in') != 'yes'): ?>
            <div id="sign_up_form_div">
                <h2 style="color: #ff8128;font-family: Ravie;text-align: center;font-size: 25px;padding: 25px;">Sign Up</h2>
                <form style="margin-left:50px;" action="<?php echo base_url().'index.php/home/validateSignUpForm' ?>" method="POST">
                    <input name="name" type="text" id="inputName" value = "<?php echo $this->input->post('name');?>" placeholder="Name"/>
                    <input name="address" type="text" id="inputAddress" value = "<?php echo $this->input->post('address');?>" placeholder="Address"/>
                    <input name="contact_no" type="text" id="inputContactNo" value = "<?php echo $this->input->post('contact_no');?>" placeholder="Contact No"/>
                    <input type="text" name="username" id="inputUsername" value = "<?php echo $this->input->post('username');?>" placeholder="Username"/>
                    <input type="password" name="password" placeholder="Password" id="inputPassword" placeholder="Password"/>
                    <input type="password" name="repass" id="inputRePassword" placeholder="Re-type-Password"/>
                    <input type="text" id="inputEmail" name="email" value = "<?php echo $this->input->post('email');?>" placeholder="Email"/><br>
                    <button type="submit" class="btn">Sign Up</button><a href="#" id="sign_in_button" class="btn">Sign In</a><br>
                    <?php echo validation_errors(); ?>
                </form>
            </div>
            <div id="sign_in_form_div">
                <h2 style="color: #ff8128;font-family: Ravie;text-align: center;font-size: 25px;padding: 25px;">Sign In</h2>
                <form style="margin-left:50px;" action="<?php echo base_url().'index.php/home/validateLoginForm' ?>" method="POST">
                    <input type="text" name="username" id="inputUsername" value = "<?php echo $this->input->post('username');?>" placeholder="Username"/>
                    <input type="password" name="password" placeholder="Password" id="inputPassword" placeholder="Password"/>
                    <button type="submit" class="btn">Sign In</button><a href="#" id="sign_up_button" class="btn">Sign Up</a>
                </form>
            </div>
            <?php else: ?>
            <div class="profile_info_div" style="margin-top: 70px;">
                <h2 style="text-align: right;font-family: Ravie;color: rgb(38, 60, 148);padding: 20px;">Profile Information.</h2>
                <?php foreach ($user_info->result_array() as $key): ?>
                <table>
                    <tr>
                        <td>Name :</td>
                        <td><?php echo $key['name']; ?></td>
                    </tr>
                    <tr>
                        <td>Address :</td>
                        <td><?php echo $key['address']; ?></td>
                    </tr>
                    <tr>
                        <td>Contact :</td>
                        <td><?php echo $key['contact']; ?></td>
                    </tr>
                    <tr>
                        <td>Email :</td>
                        <td><?php echo $key['email']; ?></td>
                    </tr>
                </table>
            <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
    </div>
    
</body>

<script type="text/javascript">
    $(document).ready(function(){
        var cur_div = 0;
        setInterval(sliding, 3000);
        $('.slide_div_'+cur_div).slideDown(200);
        cur_div++;
        cur_div = cur_div % 3;
        function sliding(){
            $('.double_div > div').slideUp(200);
            $('.slide_div_'+cur_div).slideDown(200);
            cur_div++;
            cur_div = cur_div % 3;

        }
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
        <?php if($success == 'false'): ?>
           $('#sign_in_form_div').slideUp(200);
             $('#sign_up_form_div').slideDown(400);
        <?php endif; ?>
    });
</script>
