<div class="container">
<div class="row">
<div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit PS Regions</h4>
                    <form id="defaultForm"  class="forms-sample" method="post" action="<?php echo base_url('regions/editpost'); ?>" >
					<input type="hidden" name="r_id" id="r_id" value="<?php echo isset($regions_details['r_id'])?$regions_details['r_id']:'' ?>" >
					<div class="row">
					
					 
					
					  
					  <div class="col-md-6">
					  <div class="form-group">
                        <label for="exampleInputConfirmPassword1">PS Regions</label>
                        <input type="text" class="form-control" name="region_name" value="<?php echo isset($regions_details['region_name'])?$regions_details['region_name']:'' ?>" required placeholder="Enter PS Regions">
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
			
			region_name: {
                 validators: {
					notEmpty: {
						message: 'PS Regions is required'
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
 