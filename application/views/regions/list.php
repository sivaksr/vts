
  <div class="clearfix">&nbsp;</div>
  <div class="container">
			<a href="<?php echo base_url('regions/add'); ?>"><button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="float:right">Add<i class="fa fa-plus" aria-hidden="true"></i></button></a>
		     <h4 class="card-title">PS Regions List</h4>
			<div class="clearfix">&nbsp;</div>
		    <div class="clearfix">&nbsp;</div>
			  <!-- Simple Datatable start -->
			  <?php if(isset($regions_list)&& count($regions_list)>0){?>
					<div class="row">
						<table class="data-table stripe table-bordered">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">#</th>
									<th>PS Regions</th>
									<th>Date</th>
									<th>Status</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
							<?php $cnt=1; foreach($regions_list as $list){?>
								<tr>
									<td class="table-plus"><?php echo $cnt;?></td>
									<td><?php echo isset($list['region_name'])?$list['region_name']:'' ?></td>
									<td><?php echo isset($list['created_at'])?$list['created_at']:'' ?></td>
									<td><?php if($list['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>
									 <td>

									  <a href="<?php echo base_url('regions/edit/'.base64_encode($list['r_id'])); ?>" title="Edit"><i class="fa fa-pencil btn btn-sm btn-success"></i></a>
									  <a href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['r_id'])).'/'.base64_encode(htmlentities($list['status']));?>');adminstatus('<?php echo $list['status'];?>')" data-toggle="modal" data-target="#myModal" title="Edit"><i class="fa fa-info-circle btn btn-sm btn-warning"></i></a>
									<a href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode(htmlentities($list['r_id']));?>');admin('');" data-toggle="modal" data-target="#myModal" title="delete"><i class="fa fa-trash btn btn-sm btn-danger"></i></a>	
							  
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
	$(".popid").attr("href","<?php echo base_url('regions/status'); ?>"+"/"+id);
}
function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('regions/delete'); ?>"+"/"+id);
	
}
function adminstatus(id){
	if(id==1){
			$('#content1').html('Are you sure you want to deactivate?');
		
	}if(id==0){
			$('#content1').html('Are you sure you want to activate?');
	}
}

function admin(id){
			$('#content1').html('Are you sure you want to delete?');

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