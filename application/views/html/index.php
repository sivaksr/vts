<head>
   </head>
<style>
.container1 {
  position: relative;
  text-align: center;
  color: white;
}

.centered {
  position: relative;
  top: 200px;
  left: 45%;
  width: 52%;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 450px;
  background: #fff;
  border-radius:15px;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
#fakebox-search {
    cursor: pointer;
    margin-inline-end: 16px;
    padding: 22px 12px 0;
    position: absolute;
    right: 0;
	bottom: 33px;
    width: 21px;
}
</style>
</head>
    <div class="container mt-2">

        <div class="col-12 hmbnrimg">

			
			 <div class="centered">
			 <form  id="suscribe" method="post" class="example" action="<?php echo base_url('home');?>">
			  <div class="form-group">
			  <input type="text" autocomplete="off" onchange="get_vehicle_list(this.value);" id="vehicle_numbers"  name="vehicle_numbers"  Placeholder="Enter Vehicle Number or Chasis Number"   id="automplete-1" required>
			  </div>
			  <br><br><br>
			  <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="signup" value="submit">Search</button>
			
			</form>
			
			  </div>
			  <div id="student_data" class="" style="">
              </div>
			  
			  
			  
			  
			  
			  
			  
			  
        </div>



    



    </div>
	
	
	
	
	
    <hr>
	<script>
    $(document).ready(function() {
    $('#suscribe').bootstrapValidator({
		fields: {
            vehicle_numbers: {
                 validators: {
					notEmpty: {
						message: 'Vehicle Number or Chasis Number is required'
					}
				}
            },
			
			
		
				
			}
        })

    });
</script>
<script>
  
  function get_type(vehicle_numbers){
	  	if(vehicle_numbers!=''){
			jQuery.ajax({

			url: "<?php echo base_url('home/get_vehicle_list');?>",
			type: 'post',
			data: {
			vehicle_numbers: vehicle_numbers,
			},
			dataType: 'html',
			success: function (data) {
			$("#student_data").empty();
			$("#student_data").append(data);
			}
			
			});

	}
	  
  }
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
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
