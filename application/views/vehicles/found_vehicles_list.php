
  <div class="clearfix">&nbsp;</div>
  <div class="container">
  			 <h4 class="card-title">Found Vehicles List</h4>

		    <div class="clearfix">&nbsp;</div>
		    <div class="clearfix">&nbsp;</div>
			  <!-- Simple Datatable start -->
			  <?php if(isset($found_vehicles_list)&& count($found_vehicles_list)>0){?>
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
									<th>Created By</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
							<?php $cnt=1; foreach($found_vehicles_list as $list){?>
								<tr>
									<td class="table-plus"><?php echo $cnt;?></td>
									<td><?php echo isset($list['vehicle_number'])?$list['vehicle_number']:'' ?></td>
									<td><?php echo isset($list['owner_name'])?$list['owner_name']:'' ?></td>
									<td><?php echo isset($list['chasis_number'])?$list['chasis_number']:'' ?></td>
									<td><?php echo isset($list['city'])?$list['city']:'' ?></td>
									<td><?php echo isset($list['ps_region'])?$list['ps_region']:'' ?></td>
									<td>
								<span class="badge badge-success"><?php echo isset($list['vehicle_type'])?$list['vehicle_type']:'' ?></span>
									</td>
									<td><?php echo isset($list['name'])?$list['name']:'' ?></td>
									<td><?php echo isset($list['created_at'])?$list['created_at']:'' ?></td>
								</tr>
								
							<?php $cnt++;}?>
							</tbody>
						</table>
					</div>
			  <?php }else{?>
					<div>No data avalible</div>
			  <?php }?>
	
			  
			  
			  
			  
			  
				</div>
				<!-- Simple Datatable End -->
   
	
	
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