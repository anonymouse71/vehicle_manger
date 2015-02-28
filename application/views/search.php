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

            width:80%;
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
        .result_info{
            width: 95%;
        }
        .result_info th{
            font-family: Impact;
            color: #ffbda7;
            font-size: 25px;
        }
        .result_info th, .result_info td{
            text-align: center;
            padding: 10px 5px 10px 5px;
            font-size: 15px;
            border: 1px solid rgb(201, 236, 140);
        }
        .result_info td{
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
        #next, #prev{
            
        }
        .advance_search_div, .normal_search_div{
            padding-bottom: 10px;
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
                        <?php if($this->session->userdata('logged_in') == 'yes'): ?>
                            <li><a href="<?php echo base_url().'index.php/home/loggedin';?>" id="profile_details">Profile Details</a></li>
                        <li><a href="<?php echo base_url().'index.php/home/logout';?>" id="sign_out">Sign Out</a></li>
                    <?php endif; ?>
                        <li><a href="<?php echo base_url().'index.php/home/search';?>">Search</a></li>
                    </ul>
                </div>
                <h2 style="text-align: center; padding: 0px 0 0 20px;color: rgb(3, 202, 228);font-family: Ravie;margin-top: 20px;">Search Criteria</h2>
                <div style="padding:20px;">
                    <form id="search_form">
                            <div style="position: relative;float: left;">
                                <label for="inputCategory">By Category </label> 
                                <select id="inputCategory">
                                    <option value="0">All</option>
                                    <option value="1">Cycle</option>
                                    <option value="2">Motor Bike</option>
                                    <option value="3">Car</option>
                                </select>
                            </div>
                            <div style="position: relative;float: left;padding-left: 10px;">
                                <label for="inputStatus">By Status </label> 
                                <select id="inputStatus">
                                    <option value="0">All</option>
                                    <option value="1">Ok</option>
                                    <option value="2">Lost</option>
                                </select>
                            </div>
                            <div style="clear:both;"></div>
                            <div class="normal_search_div search_criteria">
                                <a class="btn normal_search">Search</a>
                                 <a class="btn advance_search_button">Advance Search</a>
                            </div>
                        
                         <div class="advance_search_div search_criteria" style="display:none;">
                            <label>Starting Date</label>
                             <input name="start_date" type="date" id="inputStartDate"/>
                             <label>Ending Date</label>
                             <input name="end_date" type="date" id="inputEndDate"/><br>
                             <a class="btn advance_search">Search</a>
                             <a class="btn normal_search_button">Normal Search</a>
                         </div>
                        <div>
                            <input name="chassis_no" type="text" id="inputChassisNo" placeholder="Enter Chassis No"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="information_div">
                <div id="search_result_div">
               
             </div>
            </div>
            
        </div>
        
        <div class="right_container">
            <img src="<?php echo base_url();?>images/logo_plane.png" style="width:100%;">
            <?php if($this->session->userdata('logged_in') == 'yes'): ?>
            <div class="profile_info_div popups" style="margin-top: 70px;">
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
        <?php else: ?>
             <div id="sign_in_form_div">
                <h2 style="color: #ff8128;font-family: Ravie;text-align: center;font-size: 25px;padding: 25px;">Sign In</h2>
                <form style="margin-left:50px;" action="<?php echo base_url().'index.php/home/validateLoginForm' ?>" method="POST">
                    <input type="text" name="username" id="inputUsername" value = "<?php echo $this->input->post('username');?>" placeholder="Username"/>
                    <input type="password" name="password" placeholder="Password" id="inputPassword" placeholder="Password"/>
                    <button type="submit" class="btn">Sign In</button>
                </form>
            </div>
        <?php endif; ?>
        </div>
    </div>
</body>
<script type="text/javascript">
            var next,prev,which="searchResultByCategory";
            var catValue="0", statValue="0",startDate="",endDate="",link="",search = 1;
            $(document).ready(function(){
                $.get("<?php echo base_url(); ?>index.php/home/search_ajax",function(msg){
                   // alert(msg);
                        $('#search_result_div').html(msg);
                    });
                $('.normal_search').click(function(){
                    search = 1;
                    which = "searchResultByCategory";
                    catValue = $('#inputCategory').val();
                    statValue = $('#inputStatus').val();
                    $.get("<?php echo base_url(); ?>index.php/home/searchResultByCategory/"+catValue+"/"+statValue,function(msg){
                        $("#search_result_div").html(msg);
                        which = "searchResultByCategory";
                    });
                    return false;
                });
                $('.advance_search').click(function(){
                    search = 2;
                    which = "searchResultByDate";
                    catValue = $('#inputCategory').val();
                    statValue = $('#inputStatus').val();
                    startDate = $('#inputStartDate').val();
                    endDate = $('#inputEndDate').val();
                    if(startDate == "" || endDate == "")
                    {
                        alert('Invalid Date');
                        return false;
                    }
                    link = catValue+"/"+statValue+"/"+startDate+"/"+endDate;
                    $.get("<?php echo base_url(); ?>index.php/home/searchResultByDate/"+link,function(msg){
                        //alert(msg);
                        $("#search_result_div").html(msg);
                    });
                    return false;
                });
                $('#search_form').submit(function(){
                    return false;
                });
                $('#inputChassisNo').keyup(function(e){
                        $.get("<?php echo base_url(); ?>index.php/home/searchResultByChassis/"+$(this).val(),function(msg){
                        //console.log(msg);
                        $("#search_result_div").html(msg);
                    });
                });
                $('#search_result_div').on('click','#next',function(){
                    if(search == 1){

                        link = which+"/"+catValue+"/"+statValue+"/"+next;
                    }
                    else if(search == 2)
                    {
                        link = which+"/"+catValue+"/"+statValue+"/"+startDate+"/"+endDate+"/"+next;
                    }
                    $.get("<?php echo base_url(); ?>index.php/home/"+link,function(msg){
                        //alert(msg);
                        $('#search_result_div').html(msg);
                    });
                });
                $('#search_result_div').on('click','#prev',function(){
                     if(search == 1){
                        link = which+"/"+catValue+"/"+statValue+"/"+prev;
                    }
                    else if(search == 2)
                    {
                        link = which+"/"+catValue+"/"+statValue+"/"+startDate+"/"+endDate+"/"+prev;
                    }
                    //alert(link);
                    $.get("<?php echo base_url(); ?>index.php/home/"+link,function(msg){
                        $('#search_result_div').html(msg);
                    });
                });
                $('.advance_search_button').click(function(){
                    $('.search_criteria').slideUp(200);
                    $('.advance_search_div').slideDown(400);
                    return false;
                });
                $('.normal_search_button').click(function(){
                    $('.search_criteria').slideUp(200);
                    $('.normal_search_div').slideDown(400);
                    return false;
                });
            });

        </script>