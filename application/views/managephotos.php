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
        .details_div {
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
        .vehicle_info_div h2 {
            font-family: Ravie;
            color: rgb(89, 176, 173);
            padding-left:10px;
            padding-bottom: 30px; 
        }
        #vehicle_info_table td {
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
        #details img{
            position: relative;
            width: 180px;
            padding: 10px;
            float: left;
            
        }
        #details{
        	padding: 20px;
        	
        	width:200px;
        	float: left;
        }
         #details img:hover{
            background: rgb(18, 162, 168);
        }
        .details_div h2{
            margin-top: 20px;
            font-family: Ravie;
            color: rgb(89, 176, 173);
        }
        .tempshowphotoinfo{
        	float: left;
        	padding: 10px;
        	width: 680px;
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

			<div class="details_div">
	                
	                    <div id="details">
	                        <?php foreach ($photos->result_array() as $key):?>
	                            <img class="smallthumb" data-photo-id="<?php echo $key['photo_id'];?>" src="<?php echo base_url().$key['link']; ?>">
	                        <?php endforeach; ?>
	                        <div style="clear:both;">
	                            
	                        </div>
	                        <?php if($vehicle_count != 5): ?>
		                         <div>
				                    <h2>Upload New Photo.</h2>
				                    <form class="form-horizontal edit_carphoto" style="margin-top:20px;" accept-charset="utf-8" enctype="multipart/form-data" method="POST" action="<?php echo base_url().'index.php/home/addVehiclePhoto/'.$vehicle->chassis_no;?>">
				                        <div class="form-group">
				                            <input name = "userfile" type="file" id="inputPhotoEdit">
				                        </div>
				                        <button type="submit" class="btn" >Upload</button>
				                         <p id="error_file_edit" style="padding:5px;"></p>
				                    </form>
				                </div>
			                <?php endif; ?>
	                    </div>
	                    
	                    <div class="tempshowphotoinfo">
	                        
	                        

	                    </div>
	                    <div style="clear:both;">
	                    	
	                    </div>
	                
                
               
            </div>    
        

        </div>
        
        <div class="right_container">
            <img src="<?php echo base_url();?>images/logo_plane.png" style="width:100%;">
            <div class="vehicle_info_div">
                <h2>Vehicle Information</h2>
                    <table id="vehicle_info_table">
                            <tr>
                                <td>Chassis No: </td>
                                <td><?php echo $vehicle->chassis_no; ?></td>
                            </tr>
                            <tr>
                                <td>Category: </td>
                                <td><?php echo $vehicle->category_name; ?></td>
                            </tr>
                            <tr>
                                <td>Brand: </td>
                                <td><?php echo $vehicle->brand_name; ?></td>
                            </tr>
                            <tr>
                                <td>Model: </td>
                                <td><?php echo $vehicle->model_name; ?></td>
                            </tr>
                            <tr>
                                <td>Status: </td>
                                <td><?php echo $vehicle->status_name; ?></td>
                            </tr>
                    </table>
                    
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
    	$.ajax({
                url:"<?php echo base_url();?>index.php/home/ajaxGetPhotoEditView/"+<?php echo $photo->photo_id; ?>, 
                async: false,
                success:function(msg){
                    $('.tempshowphotoinfo').html(msg);
                }
            });
        $('.edit_carphoto').submit(function(){

                    var file = $('#inputPhotoEdit').prop('files')[0];
                    var fileclear = 1;
                    if(file != null)
                    {
                        var fileType = file.type;
                        var fileSize = file.size;
                        if((fileSize/1024) < 850 && (fileType == "image/jpeg" || fileType == "image/png")){
                            fileclear = 1;
                             $('#error_file_edit').html("");
                        }
                        else
                        {
                            $('#error_file_edit').html("Image Size Must be less than 800KB and Only jpeg or png Image is Allowed");
                            fileclear  = 0;
                        }
                    }
                    if(fileclear == 1) {
                        return true;
                    }
                    else{
                        return false;
                    } 
                        
            });
		$('.smallthumb').click(function(){
           //alert($(this).attr('data-photo-id'));
          	$.ajax({
                url:"<?php echo base_url();?>index.php/home/ajaxGetPhotoEditView/"+$(this).attr('data-photo-id'), 
                async: false,
                success:function(msg){
                    $('.tempshowphotoinfo').html(msg);
                }
            });
            $('.tempshowphotoinfo').css('display', 'none');
            $('.tempshowphotoinfo').slideDown(400);
        });

    });
</script>
