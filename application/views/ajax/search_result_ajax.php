<?php if($records->num_rows() == 0): ?>
    <h2 style="padding:20px;color:red;">Vehicle Not Found!</h2>
<?php else : ?>
	<img src="<?php echo base_url();?>images/upper_table_image.png" style="width:100%;">
                <table class="result_info">
                        <thead>
							<th>Serial</th>
							<th>Vehicle Type</th>
							<th>Brand</th>
							<th>Model</th>
							<th>Chassis No</th>
							<th>Owner Name</th>
							<th>email</th>
							<th>Status</th>
							<th></th>
        				</thead>
                        <?php if($chas != 'yes')
									$i = $next - 9;
								else
									$i = 1;

								foreach ($records->result_array() as $key):?>
                        
                        <tr>
                           <td><?php echo $i++;?></td>
								<td><img style="height:30px;" src="<?php echo base_url().'images/'.$key['link'].'.png';?>"></td>
                                <td><?php echo $key['brand_name'];?></td>
                                <td><?php echo $key['model_name'];?></td>
                                <td><?php echo $key['chassis_no'];?></td>
								<td><?php echo $key['name'];?></td>
								
								<td><?php echo $key['email'];?></td>
                                <!--<td><a class="link" href="<?php echo base_url().$key['photo'];?>">Show</a></td>-->
                                <td><?php echo $key['status_name'];?></td>
                                <td><a href="<?php echo base_url().'index.php/home/details/'.$key['chassis_no'].'/'.$key['username'];?>"><img style="width:25px;" src="<?php echo base_url(); ?>images/details.png"></a></td>
                         </tr>
                        <?php 
                            endforeach;
                         ?>
                </table>
        <?php if($chas != 'yes'): ?>
            
        <div style="position:relative; margin:20px 0 20px 20px;width:92%;"> 
            <?php if($prev >= 0): ?>
            <button class="btn btn-success" id="prev" style="position:relative;float:left;">Prev</button>
        <?php endif; ?>
            <?php if($next < $limit): ?>
            <button class="btn btn-success" id="next" style="position:relative;float:right;">Next</button>
        <?php endif; ?>
            <div style="clear:both;"></div>
        </div>
            <script type="text/javascript">
            next = <?php echo $next ?>;
            prev = <?php echo $prev ?>;
        </script>
        <?php endif; ?>
        
        <?php endif; 
?>