<div class="container">
<div class="row">
<div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Change Password</h4>
                    <form  id="change_password" class="" method="post" action="<?php echo base_url('profile/changepasswordpost');?>"  enctype="multipart/form-data">
					<div class="row">
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Old Password</label>
                        <input type="password" class="form-control" name="oldpassword"   placeholder="Enter Old Password">
                      </div>
                      </div>
					  <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">New Password</label>
                        <input type="password" class="form-control" name="password"   placeholder="Enter New Password">
                      </div>
                      </div>
					  <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Confirm New Password</label>
                        <input type="password" class="form-control" name="confirmpassword"   placeholder="Confirm New Password">
                      </div>
                      </div>
					 
					   <div class="form-group col-md-12">
                        <div class="col-lg-offset-3">
                         <button type="submit" class="btn btn-dark mr-2" name="signup" value="Sign up">Submit</button>
						 </div>
					  </div>
				   </div>
					
                    </form>
                  </div>
                </div>
              </div>
              </div>
              </div>
		</body>
</html>	  
<script>
	$(document).ready(function() {
    $('#change_password').bootstrapValidator({
        
        fields: {
            oldpassword: {
                validators: {
					notEmpty: {
						message: 'Old Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Old Password  must be at least 6 characters'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Old Password wont allow <>[]'
					}
				}
            }, password: {
                validators: {
					notEmpty: {
						message: 'Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Password  must be at least 6 characters'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Password wont allow <>[]'
					}
				}
            },
           
            confirmpassword: {
					 validators: {
						 notEmpty: {
						message: 'Confirm Password is required'
					},
					identical: {
						field: 'password',
						message: 'password and confirm Password do not match'
					}
					}
				}
            }
        })
     
});

</script>
