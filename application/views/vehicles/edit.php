<div class="container">
<div class="row">
<div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Vehicles</h4>
                    <form id="defaultForm"  class="forms-sample" method="post" action="<?php echo base_url('vehicles/editpost'); ?>" >
					<input type="hidden" name="v_id" id="v_id" value="<?php echo isset($vehicles_details['v_id'])?$vehicles_details['v_id']:'' ?>" >
					<div class="row">
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Vehicle Number</label>
                        <input type="text" class="form-control" name="vehicle_number" value="<?php echo isset($vehicles_details['vehicle_number'])?$vehicles_details['vehicle_number']:'' ?>" required placeholder="Enter Vehicle Number">
                      </div>
                      </div>
					  <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Owner Name</label>
                        <input type="text" class="form-control" name="owner_name" value="<?php echo isset($vehicles_details['owner_name'])?$vehicles_details['owner_name']:'' ?>" required placeholder="Enter Owner Name">
                      </div>
                      </div>
					  <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Chasis Number</label>
                        <input type="text" class="form-control" name="chasis_number" required value="<?php echo isset($vehicles_details['chasis_number'])?$vehicles_details['chasis_number']:'' ?>"  placeholder="Enter Chasis Number">
                      </div>
                      </div>
					  <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">City</label>
                        <input type="text" class="form-control" name="city" value="<?php echo isset($vehicles_details['city'])?$vehicles_details['city']:'' ?>" required placeholder="Enter City">
                      </div> 
                      </div> 
					  
					  
					  <div class="col-md-6">
					  <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Vehicle Type</label>
						<select name="vehicle_type" class="form-control" required>
						<option value="">Select</option>
						<option value="Found Vehicle" <?php if($vehicles_details['vehicle_type']=='Found Vehicle'){ echo "selected"; } ?>>Found Vehicle</option>
						<option value="Lost Vehicle" <?php if($vehicles_details['vehicle_type']=='Lost Vehicle'){ echo "selected"; } ?>>Lost Vehicle</option>
						</select>
                      </div>
                      </div>
					  
					   </div>
					   <br>
                      <button type="submit" class="btn btn-dark mr-2">Submit</button>
					 
                    </form>
                  </div>
                </div>
              </div>
              </div>
              </div>
<script>
$(document).ready(function() {
 
   $('#defaultForm').bootstrapValidator({
//       
        fields: {
			vehicle_number: {
                validators: {
					notEmpty: {
						message: 'Vehicle Number is required'
					}
					
				}
            },
			owner_name: {
                validators: {
					notEmpty: {
						message: 'Owner Name is required'
					}
				}
            },
			chasis_number: {
                 validators: {
					notEmpty: {
						message: 'Chasis Number is required'
					}
				
				}
            },
			city: {
                 validators: {
					notEmpty: {
						message: 'City is required'
					}
				
				}
            },
			vehicle_type: {
                 validators: {
					notEmpty: {
						message: 'Vehicle Type is required'
					}
				
				}
            }, 
			
			
			
			
			
			
			
        }
    });
	
    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
	
});


</script>
 