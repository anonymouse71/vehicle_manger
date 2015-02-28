<?php foreach ($car->result_array() as $key):?>
<p style="color: gray;font-family: Ravie;font-size: 20px;text-align: center;">Edit Vehicle Information</p>
    <form class="form-horizontal edit_car_form" style="margin-top:20px;" accept-charset="utf-8" enctype="multipart/form-data" method="POST" action="<?php echo base_url().'index.php/home/updateVehicle/'.$key['chassis_no'];?>">
            <label for="editChassisNo">Chassis No :</label>
                <input name="chassis_no" type="text" id="editChassisNo" placeholder="Chassis No" value="<?php echo $key['chassis_no'];?>" readonly/>
            <script type="text/javascript">
            var cat = "<?php echo $key['category_id']; ?>";
            var bra = "<?php echo $key['brand_id']; ?>";
            var model = "<?php echo $key['model_id']; ?>";
            var stat = "<?php echo $key['status_id']; ?>";
            </script>
            <label  for="editCategory">Category :</label>
                    <select name="category" id="editCategory"> 
                            <?php foreach ($category as $val):?>
                               <option value="<?php echo $val['category_id']; ?>"><?php echo $val['category_name']; ?></option>
                             <?php endforeach; ?>
                    </select>
            <label  for="editBrand">Brand :</label>
                <select name="brand" id="editBrand"> 
                </select>
            <label  for="editModelNo">Model No :</label>
                <select name="model_no" id="editModelNo"> 
                           
                </select>
            <label for="editStatus">Status :</label>
                    <select name="status" id="editStatus">
                            <?php foreach ($statuses->result_array() as $status):?>
                                    <option value="<?php echo $status['status_id']; ?>"><?php echo $status['status_name']; ?></option>
                                <?php endforeach; ?>
                    </select>
					<br>
					<br>
                    <a class="btn" id="edit_car">Edit</a>
                    <a class="btn" id="delete_car" href="<?php echo base_url().'index.php/home/deleteVehicle/'.$key['chassis_no'];?>">Delete</a><br>
                   
        </form>
        <!--<form class="form-horizontal edit_carphoto" style="margin-top:20px;" accept-charset="utf-8" enctype="multipart/form-data" method="POST" action="<?php echo base_url().'index.php/home/updateVehiclePhoto/'.$key['chassis_no'];?>">
            <label  for="inputPhoto">Photo :</label>
            <input name = "userfile" type="file" id="inputPhotoEdit"/><br>
            <button type="submit" class="btn" >Upload</button>
             <p id="error_file_edit" style="padding:5px;"></p>
        </form>-->
<?php endforeach; ?>
<script type="text/javascript">
    //alert(cat+" "+bra+" "+model);
    $(document).ready(function(){
                $('#editCategory').val(cat);
                //alert($('#editCategory').val());
               $.ajax({
                    url: "<?php echo base_url();?>index.php/home/afterSelectCategoryAjax/"+cat,
                    success: function(msg){
                       // alert(msg);
                        $('#editBrand').html(msg);
                        $('#editBrand').val(bra);
                        $.ajax({url:"<?php echo base_url();?>index.php/home/afterSelectBrandAjax/"+bra, 
                                success:function(msg){
                                    $('#editModelNo').html(msg);
                                    $('#editModelNo').val(model);
                                    $('#editStatus').val(stat);
                                }
                            });

                }});
            $('#editCategory').change(function(){
                $.ajax({
                        url: "<?php echo base_url();?>index.php/home/afterSelectCategoryAjax/"+$('#editCategory').val(),
                        success: function(msg){
                           // alert(msg);
                            $('#editBrand').html(msg);
                            $.ajax({url:"<?php echo base_url();?>index.php/home/afterSelectBrandAjax/"+$('#editBrand').val(), 
                        success:function(msg){
                            $('#editModelNo').html(msg);
                        }
                    });

                        }
                    });

               
            });
            $('#editBrand').change(function(){
                
                    $.ajax({url:"<?php echo base_url();?>index.php/home/afterSelectBrandAjax/"+$('#editBrand').val(), 
                        success:function(msg){
                            $('#editModelNo').html(msg);
                        }
                    });
            });
           
    });
   
</script>