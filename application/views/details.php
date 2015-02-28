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
        #details {
            margin-top: 5%;
            width: 100%;
            float: left;

        }   
        .container_main > div{
            height: 100%;
           float: left;
        }
        .left_main_div{
            width: 250mm;
        }
        .left_container{
            width:80mm;
            float: left;
            
        }
        .middle_container{
            width:170mm;
            float: left;
            
        }
        .right_container{
            width:88mm;
           
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
        .menu_div{
            margin-top: 20px;
            padding: 20px;
        }
        .menu_div ul li{
            float: left;
            padding:0 25px;
            font-family: Ravie;
            color: #339999;
        }
          .profile_info_div table{
            margin-left: 50px;
        }
        .profile_info_div table td{
            padding: 10px;
            font-family: impact;
           color: rgb(65, 153, 213);
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
        .slider_div{
            
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
        .error{
            padding: 10px 10px 10px 0;
           color: rgb(255, 0, 0);
              font-family: Segoe Print;
        }
        #details h2 {
            font-family: Ravie;
            color: rgb(89, 176, 173);
            padding-left:10px;
            padding-bottom: 30px; 
        }
        #user_info_table td, #vehicle_info_table td {
            font-family: Ravie;
            color: rgb(131, 197, 252);
        }
        #user_info_table tr td:nth-child(1), #vehicle_info_table tr td:nth-child(1){
            font-family: Ravie;
            color: rgb(60, 189, 125);
        }
        #log th{
            font-family: Ravie;
        }
        #log td{
            font-family: Ravie;
            text-align: center;
            color: rgb(47, 9, 36);
        }
       
    </style>
</head>
<body>
    <div class="container_main">
        <div class="left_main_div">
            <div class="left_container">
                <img src="<?php echo base_url();?>images/logo.png" style="width:100%;"/>
                <div>
                    <h2 style="font-family: Ravie; color: #339999;font-size:20px;">Vehicle Manager</h2>
                    <p style="font-family: Rockwell; color: #000000;font-size:11px;margin-left:23px;">A vehicle tracking solution</p>
                </div>
            </div>


            <div class="middle_container">
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
            </div>


            <div id="details">
                <h2 style="text-align:center;">Details Information of Vehicle.</h2>
                <table>
                    <tr>
                        <td>
                            <h2>Owner Information</h2>
                            <?php foreach ($owner_info->result_array() as $key):?>
                            <table id="user_info_table">
                                <tr>
                                    <td>Name: </td>
                                    <td><?php echo $key['name'];?></td>
                                </tr>
                                <tr>
                                    <td>Contact: </td>
                                    <td><?php echo $key['contact'];?></td>
                                </tr>
                                <tr>
                                    <td>Email: </td>
                                    <td><?php echo $key['email'];?></td>
                                </tr>
                                <tr>
                                    <td>Address: </td>
                                    <td><?php echo $key['address'];?></td>
                                </tr>
                            </table>
                            <?php endforeach; ?>
                        </td>

                        <td>
                            <h2>Vehicle Information</h2>
                            <?php foreach ($vehicle_info->result_array() as $key):?>
                            <table id="vehicle_info_table">
                                <tr>
                                    <td>Chassis No: </td>
                                    <td><?php echo $key['chassis_no']; ?></td>
                                </tr>
                                <tr>
                                    <td>Category: </td>
                                    <td><?php echo $key['category_name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Brand: </td>
                                    <td><?php echo $key['brand_name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Model: </td>
                                    <td><?php echo $key['model_name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Status: </td>
                                    <td><?php echo $key['status_name']; ?></td>
                                </tr>
                            </table>
                            
                            <?php endforeach; ?>
                        </td>         
                    </tr>
                </table>
                <div style="width:80%;margin:0 auto;">
                    <h2>Image of the vehicle</h2>
                    <?php foreach ($photos->result_array() as $photo):?>
                        <img style="width:100%;" src="<?php echo base_url().$photo['link'];?>"/>
                    <?php endforeach; ?>
                </div>
                <div style="margin-top:10mm;">
                    <h2>Log of This Vehicle.</h2>
                    <table id="log">
                        <thead>
                            <th>Date</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            <?php foreach ($logs->result_array() as $key):?>
                            <tr>
                                <td><?php echo $key['created_at']; ?></td>
                                <td><?php echo $key['category_name']; ?></td>
                                <td><?php echo $key['brand_name']; ?></td>
                                <td><?php echo $key['model_name']; ?></td>
                                <td><?php echo $key['status_name']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
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
