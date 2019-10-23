
  <div class="clearfix">&nbsp;</div>
  <div class="container">
		     <h4 class="card-title">Vehicles All List</h4>
			<div class="clearfix">&nbsp;</div>
		    <div class="clearfix">&nbsp;</div>
			  <!-- Simple Datatable start -->
			  <?php if(isset($vehicles_list)&& count($vehicles_list)>0){?>
					<div class="row">
						<table class="data-table stripe table-bordered">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">#</th>
									<th>Vehicle Number</th>
									<th>Owner Name</th>
									<th>Chasis Number</th>
									<th>City</th>
									<th>PS Region</th>
									<th>Vehicle Type</th>
									<th>Date</th>
									<th>Status</th>
									<th>Created By</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
							<?php $cnt=1; foreach($vehicles_list as $list){?>
								<tr>
									<td class="table-plus"><?php echo $cnt;?></td>
									<td><?php echo isset($list['vehicle_number'])?$list['vehicle_number']:'' ?></td>
									<td><?php echo isset($list['owner_name'])?$list['owner_name']:'' ?></td>
									<td><?php echo isset($list['chasis_number'])?$list['chasis_number']:'' ?></td>
									<td><?php echo isset($list['city'])?$list['city']:'' ?></td>
									<td><?php echo isset($list['region_name'])?$list['region_name']:'' ?></td>
									<td>
									<?php if($list['vehicle_type']=='Found Vehicle'){?>
									<span class="badge badge-success"><?php echo isset($list['vehicle_type'])?$list['vehicle_type']:'' ?></span>
									<?php }else{ ?>
								<span class="badge badge-danger"><?php echo isset($list['vehicle_type'])?$list['vehicle_type']:'' ?></span>

									<?php } ?>
									</td>
									<td><?php echo isset($list['created_at'])?$list['created_at']:'' ?></td>
									<td><?php if($list['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>
                                     <td><?php echo isset($list['name'])?$list['name']:'' ?></td>
									 <td>

									<a href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode(htmlentities($list['v_id']));?>');admin('');" data-toggle="modal" data-target="#myModal" title="delete" class="btn btn-sm btn-warning">Slove</a>	
							  
									</td>
									
								</tr>
								
							<?php $cnt++;}?>
								
								
								
								
								
							</tbody>
						</table>
					</div>
			  <?php }else{?>
					<div>No data avalible</div>
			  <?php }?>
	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
			
			<div style="padding:10px">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 style="pull-left" class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">
			<div class="alert alert-danger alert-dismissible" id="errormsg" style="display:none;"></div>
			  <div class="row">
				<div id="content1" class="col-xs-12 col-xl-12 form-group">
				Are you sure ? 
				</div>
				<div class="col-xs-6 col-md-6">
				  <button type="button" aria-label="Close" data-dismiss="modal" class="btn  blueBtn">Cancel</button>
				</div>
				<div class="col-xs-6 col-md-6">
                <a href="?id=value" class="btn  blueBtn popid" style="text-decoration:none;float:right;"> <span aria-hidden="true">Ok</span></a>
				</div>
			 </div>
		  </div>
      </div>
      
    </div>
  </div>	
			  
			  
			  
			  
			  
			  
				</div>
				<!-- Simple Datatable End -->
   
	
	<script>
function admindeactive(id){
	$(".popid").attr("href","<?php echo base_url('vehicles/status'); ?>"+"/"+id);
}
function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('vehicles/sloved'); ?>"+"/"+id);
	
}
function adminstatus(id){
	if(id==1){
			$('#content1').html('Are you sure you want to deactivate?');
		
	}if(id==0){
			$('#content1').html('Are you sure you want to activate?');
	}
}

function admin(id){
			$('#content1').html('Are you sure you want to slove vehicles details?');

}



</script>
	<script>
		$('document').ready(function(){
			$('.data-table').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
			});
			$('.data-table-export').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
				dom: 'Bfrtip',
				buttons: [
				'copy', 'csv', 'pdf', 'print'
				]
			});
			var table = $('.select-row').DataTable();
			$('.select-row tbody').on('click', 'tr', function () {
				if ($(this).hasClass('selected')) {
					$(this).removeClass('selected');
				}
				else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
				}
			});
			var multipletable = $('.multiple-select-row').DataTable();
			$('.multiple-select-row tbody').on('click', 'tr', function () {
				$(this).toggleClass('selected');
			});
		});
	</script>