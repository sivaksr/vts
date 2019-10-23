<div class="container">
<div class="row">
<div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Profile</h4>
                    <form  id="suscribe" class="" method="post" action="<?php echo base_url('profile/editpost');?>"  enctype="multipart/form-data">
					<input type="hidden" name="u_id" id="u_id" value="<?php echo isset($user_details['u_id'])?$user_details['u_id']:'' ?>" >
					<div class="row">
					<div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo isset($user_details['name'])?$user_details['name']:'' ?>" required placeholder="Enter Name">
                      </div>
                      </div>
					  <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo isset($user_details['email'])?$user_details['email']:'' ?>" required placeholder="Enter Email">
                      </div>
                      </div>
					  <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Mobile Number</label>
                        <input type="text" class="form-control" name="mobile_number" value="<?php echo isset($user_details['mobile_number'])?$user_details['mobile_number']:'' ?>" required  placeholder="Enter Mobile Number">
                      </div>
                      </div>
					 
					 
					 
					 <div class="col-md-6">
					  <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Working Station Region</label>
                        <input type="text" class="form-control" name="region" required placeholder="Enter Working Region" value="<?php echo isset($user_details['region'])?$user_details['region']:'' ?>">
                      
					  
					  </div>
                      </div>
					  <div class="col-md-6">
					  <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Working Station Address</label>
                        <textarea type="text" class="form-control" name="address" required placeholder="Enter Address"><?php echo isset($user_details['address'])?$user_details['address']:'' ?></textarea>
                      </div>
                      </div>
					  
					  <div class="col-md-6">
					  <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Profile pic</label>
                        <input type="file" class="form-control" name="profile_pic" >
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
    $('#suscribe').bootstrapValidator({
		fields: {
            name: {
                validators: {
					notEmpty: {
						message: 'Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Name can only consist of alphanumeric, space and dot'
					}
				}
            },			
			email: {
                 validators: {
					notEmpty: {
						message: 'Email is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
				}
            },
			mobile_number: {
                 validators: {
					notEmpty: {
						message: 'Mobile Number is required'
					},
					regexp: {
					regexp:  /^[0-9]{10}$/,
					message:'Mobile Number must be 10 digits'
					}
				
				}
            },
			gender: {
                validators: {
					notEmpty: {
						message: 'Gender is required'
					}
				}
            },
			password: {
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
           
           org_password: {
					 validators: {
						 notEmpty: {
						message: 'Confirm Password is required'
					},
					identical: {
						field: 'password',
						message: 'password and Confirm Password do not match'
					}
					}
				},
			address: {
                 validators: {
					notEmpty: {
						message: 'Working Station Address is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Working Station Address wont allow <> [] = % '
					}
				
				}
            },
			region:{
			validators: {
					notEmpty: {
						message: 'Working Station Region is required'
					}
				}
            },	
			profile_pic: {
                validators: {
					regexp: {
					regexp: "(.*?)\.(png|jpeg|jpg|gif)$",
					message: 'Uploaded file is not a valid. Only png,jpg,jpeg,gif files are allowed'
					}
				}
            }
			
			
			
			
			
			
			
				
			}
        })

    });
</script>
  