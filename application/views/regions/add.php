<div class="container">

<div class="row">
<div class="col-md-12 grid-margin stretch-card">

                <div class="card">
                  <div class="card-body">
				  <a href="<?php echo base_url('regions/lists'); ?>"><button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="float:right">List<i class="fa fa-plus" aria-hidden="true"></i></button></a>
                    <h4 class="card-title">Add PS Regions</h4>
                   
				    <form id="suscribe"  class="forms-sample" method="post" action="<?php echo base_url('regions/addpost'); ?>" >
					<div class="row">
					
					 
					 
					  <div class="col-md-6">
					  <div class="form-group">
                        <label for="exampleInputConfirmPassword1">PS Regions</label>
                        <input type="text" class="form-control" name="region_name" required placeholder="Enter PS Regions">
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
            
			region_name: {
                 validators: {
					notEmpty: {
						message: 'PS Region is required'
					}
				}
            },
			
				
			}
        })

    });
</script>