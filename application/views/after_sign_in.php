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
            position: relative;
        }
        .container_main > div{
            height: 100%;
           float: left;
        }
        .left_middle_div{
            width:980px;
            height: 100%;
        }
        .left_container{
            width:300px;
            float: left;
            
        }
        .middle_container{
            width:680px;
            float: left;
            
        }
        .information_div{
             width:100%;
             float: left;
        }
        .right_container{
            width:300px;
           
        }
        .about_div{
            background: url('<?php echo base_url();?>images/about_holder.png');
            margin-top: 70px;
            padding: 40px 10px 0 0;
            background-repeat: no-repeat;
        }
        .slider_div{
            width: 94%;
            margin: 20px;
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
        .profile_info_div{
            width:100%;
        }
        .car_info{

            width:95%;
            padding: 20px;
        }
        .car_info th{
            font-family: Impact;
            color: #ffbda7;
            font-size: 25px;
        }
        .car_info th, .car_info td{
            text-align: center;
            padding: 10px 0 10px 0;
        }
        .car_info td{
            font-family: Rockwell;
            color: black;
        }
        
        label{
           padding: 10px 10px 10px 0;
            width: 200px;
            font-family: Ravie;
            color: black;
        }
        .form{
            margin: 10px 0 0 40px;
        }
        .form input{
            width:200px;
        }
        .edit_prof_close_button{
            margin-left: 6px;
        }
        .addCarform label{
            text-align: left;
        }
        .profile_info_div table{
            margin-left: 50px;
        }
        .profile_info_div table td{
            padding: 10px;
            font-family: impact;
           color: rgb(65, 153, 213);
        }
        .background{
            width: 100%;
            height: 100%;
            position: absolute;
            background: rgb(2, 2, 2);
            opacity: 0.2;
        }
        .confirmation_menu{
            width:400px;
            height: 300px;
            background: red;
        }
         .error{
            padding: 10px 10px 10px 0;
            color: rgb(255, 0, 0);
            font-family: Segoe Print;
        }
    </style>
</head>
<body>
    <div class="container_main">
        <div class="left_middle_div">
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
                        <li><a href="" id="edit_profile_button">Edit Profile</a></li>
                        <li><a href="<?php echo base_url().'index.php/home/logout';?>" id="sign_out">Sign Out</a></li>
                        <li><a href="<?php echo base_url().'index.php/home/search';?>">Search</a></li>
                    </ul>
                </div>
                 <p class="btn add_vehicle_button" style="margin-left: 7%;margin-top: 18%;font-family:Ravie;color: rgb(39, 190, 121);">+ Add New Vehicle</p>
            
                <!--<img src="<?php echo base_url();?>images/logo_house.png" style="width:100%;">-->
            </div>
            <div class="information_div">
                <img src="<?php echo base_url();?>images/upper_table_image.png" style="width:100%;">
                <table class="car_info">
                        <thead>
                                <th>Vehicle Type</th>
                                <th>Brand</th>
                                <th>Model No</th>
                                <th>Chassis No</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                                <th></th>
                        </thead>
                        <?php
                            //echo $car_info->num_rows();
                            foreach ($car_info->result_array() as $key ):
                        ?>
                        <tr>
                               <td><img style="height:30px;" src="<?php echo base_url().'images/'.$key['link'].'.png';?>"></td>
                                <td><?php echo $key['brand_name'];?></td>
                                <td><?php echo $key['model_name'];?></td>
                                <td><?php echo $key['chassis_no'];?></td>
                                <!--<td><a class="link" href="<?php echo base_url().$key['photo'];?>">Show</a></td>-->
                                <td><?php echo $key['status_name'];?></td>
                                <td><a title="Details Of This Vehicle" href="<?php echo base_url().'index.php/home/details/'.$key['chassis_no'].'/'.$key['username'];?>"><img style="width:25px;" src="<?php echo base_url(); ?>images/details.png"></a></td>
                                <td class="edit_vehicle_button"><a title="Edit Vehicle" href="#"><img style="width:25px;" src="<?php echo base_url(); ?>images/setting.png"></a><span style="display:none;"><?php echo $key['chassis_no'];?></span></td>
                                <td><a title="Manage Photos" href="<?php echo base_url().'index.php/home/photoManager/'.$key['chassis_no'];?>"><img style="width:25px;" src="<?php echo base_url(); ?>images/managephoto.png"></a></td>
                        </tr>
                        <?php 
                            endforeach;
                         ?>
                </table>
            </div>
        </div>
        
        <div class="right_container">
            <img src="<?php echo base_url();?>images/logo_plane.png" style="width:100%;">
            <div class="profile_info_div popups">
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
            <div class="edit_profile_div popups">
                <p style="text-align: center;font-family: Ravie;color: rgb(84, 110, 237);">Edit Information</p>
                <form class="form" method="POST" action="<?php echo base_url(); ?>index.php/home/edit_profile">
                    <?php foreach ($user_info->result_array() as $key):?>  
                            <label  for="inputName">Name :</label>
                            <input name="name" type="text" id="inputName" placeholder="Name" value="<?php echo $key['name'];?>"/>
                            <label  for="inputAddress">Address :</label>
                            <input name="address" type="text" id="inputAddress" placeholder="Address" value="<?php echo $key['address'];?>"/>
                            <label  for="inputContactNo">Contact No :</label>
                            <input name="contact_no" type="text" id="inputContactNo" placeholder="Contact No" value="<?php echo $key['contact'];?>"/>
                            <label for="inputEmail">Email:</label>
                            <input name="email" type="text" id="inputEmail" placeholder="Email" value="<?php echo $key['email'];?>"/>
                            <button type="submit" class="btn">Apply</button><button class="btn edit_prof_close_button">Cancel</button>
                    <?php endforeach; ?>   
                     <?php echo validation_errors(); ?>   
                </form>
            </div>
            <div class = "add_vehicle_menu popups" style="display:none; margin-top: 20px">
                    <p style="font-family: Ravie;color: rgb(123, 0, 255);text-align: center;padding: 20px;font-size: 20px;">Add Vehicle Menu</p>
                   <form class="form-horizontal addCarform" method="POST" action="<?php echo base_url().'index.php/home/addCarInfo' ?>" accept-charset="utf-8" enctype="multipart/form-data">
                      
                        <label for="inputCategory">Category :</label>
                                <select name="category" id="inputCategory"> 
                                        <?php foreach ($category as $key):?>
                                            <option value="<?php echo $key['category_id']; ?>"><?php echo $key['category_name']; ?></option>
                                        <?php endforeach; ?>
                                </select>
                        <label  for="inputBrand">Brand :</label>
                            <select name="brand" id="inputBrand"> 
                            
                            </select>
                        <label  for="inputModelNo">Model No :</label>
                            <select name="model_no" id="inputModelNo"> 
                                       
                            </select>
                        <label  for="inputChassisNo">Chassis No :</label>
                            <input name="chassis_no" type="text" id="inputChassisNo" placeholder="Chassis No"/>
                            
                        <label  for="inputPhoto">Photo :</label>
                                <input name = "userfile" type="file" id="inputPhoto"/>
                                
                        <label  for="inputStatus">Status :</label>
                        <select name="status" id="inputStatus"> 
                                <?php foreach ($statuses->result_array() as $key):?>
                                    <option value="<?php echo $key['status_id']; ?>"><?php echo $key['status_name']; ?></option>
                                <?php endforeach; ?>
                        </select><br><br>
                        <button type="submit" class="btn add_vehicle_submit">Add</button>
                        <button class="btn edit_prof_close_button">Cancel</button><br><br>
                        <p id="error_file"></p><br>
                        <p id="error_chassisNo"></p>
                     
                        
                </form>
                    
                </div>
                <div class="edit_vehicle_menu popups">

                </div>

        </div>
        <div style="clear:both;float:none;"></div>
    </div>
    <div class="confirmation_dailoge">
        <div style="position:relative;" class="confirm_header">
            <p style="text-align: center;color: rgb(36, 43, 219);font-size: 25px;padding: 10px;font-family: fantasy;">Confirmation</p>
        </div>
        <div style="position:relative;" class="confirm_body">
            <p style="padding:10px;font-family:fantasy;color:red;">Are You Sure ?</p>
            <div>
                <a href="#" class="btn confirm_yes" >Yes</a>
                <a href="#" class="btn confirm_no">No</a>
            </div>
        </div>
        
    </div>
</body>
<style type="text/css">
    .confirmation_dailoge{
        position: fixed;
        top: 60mm;
        left: 130mm;
        width: 400px;
        background: rgb(202, 201, 182);
        z-index: 0;
        display: none;
    }
    .confirmation_dailoge > .confirm_header{
        background: black;
    }
    .confirm_body > div{
        padding: 10px;
        width: 84px;
        margin: 0 auto;
     }
     .confirmation_dailoge > .confirm_body{
        
     }
</style>
<script type="text/javascript">
    $(document).ready(function()
    {
        var confirm_type = "";
        $('.popups').css('display', 'none');
        $('.profile_info_div').slideDown(200);
        $.ajax({
            url: "<?php echo base_url();?>index.php/home/afterSelectCategoryAjax/"+$('#inputCategory').val(),
            success: function(msg){
               //alert(msg);
                $('#inputBrand').html(msg);
                $.ajax({url:"<?php echo base_url();?>index.php/home/afterSelectBrandAjax/"+$('#inputBrand').val(), 
                success:function(msg){
                //alert(msg);
                $('#inputModelNo').html(msg);
            }
            });

            }
        });

       $('#edit_profile_button').click(function(){
            $('.popups').slideUp(200);
            $('.edit_profile_div').slideDown(500);
            
            return false;
       });
       $('.edit_prof_close_button').click(function(){
            $('.popups').slideUp(200);
            $('.profile_info_div').slideDown(500);
            return false;
       });
       $('.add_vehicle_button').click(function(){
            $('.popups').slideUp(200);
            $('.add_vehicle_menu').slideDown(500);
            return false;
       });
       $('#inputCategory').change(function(){
            $.ajax({
                    url: "<?php echo base_url();?>index.php/home/afterSelectCategoryAjax/"+$('#inputCategory').val(),
                    success: function(msg){
                        //alert($('#inputCategory').val());
                       //alert(msg);
                        $('#inputBrand').html(msg);
                        $.ajax({url:"<?php echo base_url();?>index.php/home/afterSelectBrandAjax/"+$('#inputBrand').val(), 
                    success:function(msg){
                        $('#inputModelNo').html(msg);
                    }
                });

                    }
                });

                           
        });
        $('#inputBrand').change(function(){
            
                $.ajax({url:"<?php echo base_url();?>index.php/home/afterSelectBrandAjax/"+$('#inputBrand').val(), 
                    success:function(msg){
                        $('#inputModelNo').html(msg);
                    }
                });

        });
        $(".addCarform").submit(function(e)
        {
            var check;
            var chassis_no = $('#inputChassisNo').val();
            var file = $('#inputPhoto').prop('files')[0];
            var fileclear = 1,chassisClear = 1;
            if(file == null){
                $('#error_file').html("Select An Image");
                 fileclear = 0; 
            }
            else
            {
                var fileType = file.type;
                var fileSize = file.size;
                if((fileSize/1024) < 850 && (fileType == "image/jpeg" || fileType == "image/png")){
                    fileclear = 1;
                     $('#error_file').html("");
                }
                else
                {
                    $('#error_file').html("Image Size Must be less than 800KB and Only jpeg or png Image is Allowed");
                    fileclear  = 0;
                }
                
            }
            if(chassis_no == "")
            {
                $('#error_chassisNo').html("Chassis Number Required");
                chassisClear = 0;
            }
            else
            {
                var regex = new RegExp("^[a-zA-Z0-9]+$");
                 

                    
                    if(!regex.test(chassis_no))
                    {
                        $('#error_chassisNo').html("Chassis No Must be Alphanumeric");
                        chassisClear = 0;

                    }
                    else
                    {
                           $.ajax({
                                async: false,
                                url: "<?php echo base_url();?>index.php/home/chassisCheck/"+chassis_no,
                                success: function(msg){
                                   check = msg;

                                }
                            });
                         if(check == 1){
                            $('#error_chassisNo').html("Chassis Number Already Exist");
                            chassisClear = 0;       
                         }
                         else
                         {
                            $('#error_chassisNo').html("");
                            chassisClear = 1;
                         }
                    }
                  console.log(chassisClear);
            }
           
            if(fileclear == 1 && chassisClear == 1)
            {
                return true;
            }
            else
            {
                // alert(fileclear+":"+chassisClear);
                return false;    
            }
            
        
        });
        $('.edit_vehicle_button').click(function(){
            var Chassis = $(this).children("span").html();
            //alert(Chassis);
            
            $(".popups").slideUp(200);
            $.ajax({
                    async: false,
                    url: "<?php echo base_url();?>index.php/home/ajaxEditVehicleStatusChange/"+Chassis,
                    success: function(msg){
                        //alert(msg);
                        $('.edit_vehicle_menu').html(msg);
                        $(".edit_vehicle_menu").slideDown(400);
                    }
                });
           return false;
            
        });
        $('.edit_vehicle_menu').on('click','#edit_car', function(){
            $('.confirmation_dailoge').slideDown(200);
            confirm_type = "edit_car";
            return false;
        });
        $('.edit_vehicle_menu').on('click','#delete_car', function(){
            $('.confirmation_dailoge').slideDown(200);
            confirm_type = "delete_car";
            return false;
        });
        $('.confirm_yes').click(function(){
            if(confirm_type == "edit_car"){
                $('.confirmation_dailoge').slideUp(200);
                $('.edit_car_form').submit();
            }
            else if(confirm_type == "delete_car"){
                $('.confirmation_dailoge').slideUp(200);
                window.location = $('#delete_car').attr('href');

            }
            return false;
        });
        $('.confirm_no').click(function(){
            $('.confirmation_dailoge').slideUp(200);
            return false;
        });
        <?php if($edit_profile_success != null && $edit_profile_success == 'no'): ?>
            $('.popups').css('display', 'none');
            $('.edit_profile_div').slideDown(200);
        <?php  endif;?>
    });
</script>