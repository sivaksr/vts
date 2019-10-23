<div class="container">

<div class="row">
<div class="col-md-12 grid-margin stretch-card">

                <div class="card">
                  <div class="card-body">
				  <a href="<?php echo base_url('vehicles/lists'); ?>"><button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="float:right">Vehicles List<i class="fa fa-plus" aria-hidden="true"></i></button></a>
                    <h4 class="card-title">Add Vehicles</h4>
                    <form id="suscribe"  class="forms-sample" method="post" action="<?php echo base_url('vehicles/addpost'); ?>" >
					<div class="row">
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Vehicle Number</label>
                        <input type="text" class="form-control" name="vehicle_number" required placeholder="Enter Vehicle Number">
                      </div>
                      </div>
					  <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Owner Name</label>
                        <input type="text" class="form-control" name="owner_name" required placeholder="Enter Owner Name">
                      </div>
                      </div>
					  <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Chasis Number</label>
                        <input type="text" class="form-control" name="chasis_number" required   placeholder="Enter Chasis Number">
                      </div>
                      </div>
					  <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">City</label>
                        <input type="text" class="form-control" name="city" required placeholder="Enter City">
                      </div> 
                      </div> 
					 
					  
					  <div class="col-md-6">
					  <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Vehicle Type</label>
						<select name="vehicle_type" class="form-control" required>
						<option value="">Select</option>
						<option value="Found Vehicle">Found Vehicle</option>
						<option value="Lost Vehicle">Lost Vehicle</option>
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
    $('#suscribe').bootstrapValidator({
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
			ps_region: {
                 validators: {
					notEmpty: {
						message: 'PS Region is required'
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
        })

    });
</script>