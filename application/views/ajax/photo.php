<img style="width:100%;" src="<?php echo base_url().$photo->link; ?>">
<div style="margin-top:40px;">
    <?php if($photo->main_or_not == "0"): ?>
	   <a href="<?php echo base_url()."index.php/home/deletePhoto/$photo->photo_id/$photo->chassis_no"; ?>" class="btn btn-danger">Delete</a>
       <a href="<?php echo base_url()."index.php/home/changeDisplayPicture/$photo->photo_id/$photo->chassis_no"; ?>" class="btn btn-success">Make This Display Picture</a>
    <?php endif; ?>
    <h2>Change This Photo</h2>
    <form class="form-horizontal edit_carphotoext" style="margin-top:20px;" accept-charset="utf-8" enctype="multipart/form-data" method="POST" action="<?php echo base_url()."index.php/home/updateVehiclePhoto/$photo->photo_id/$photo->chassis_no";?>">
        <div class="form-group">
            <input name = "userfile" type="file" id="inputPhotoIndiv">
        </div>
        <button type="submit" class="btn" >Upload</button>
        <p id="error_file_edit_ext" style="padding:5px;"></p>
    </form>
</div>
<script type="text/javascript">
    
    $(document).ready(function(){
        $('.edit_carphotoext').submit(function(){

                    var file = $('#inputPhotoIndiv').prop('files')[0];
                    var fileclear = 1;
                    if(file != null)
                    {
                        var fileType = file.type;
                        var fileSize = file.size;
                        if((fileSize/1024) < 850 && (fileType == "image/jpeg" || fileType == "image/png")){
                            fileclear = 1;
                             $('#error_file_edit_ext').html("");
                        }
                        else
                        {
                            $('#error_file_edit_ext').html("Image Size Must be less than 800KB and Only jpeg or png Image is Allowed");
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
    });
</script>