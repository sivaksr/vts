<div class="container">

<div class="row">
<div class="col-md-12 grid-margin stretch-card">

                <div class="card">
                  <div class="card-body">
				  <a href="<?php echo base_url('profile/edit/'.base64_encode($user_details['u_id'])); ?>"><button class="btn btn-outline-primary my-2 my-sm-0" type="submit" style="float:right">Edit</button></a>
                    <h4 class="card-title">Profile</h4>
                    
					<div class=" col-md-9 col-lg-9 "> 
											  
											  <div class="row">
												  <div class="col-md-6 col-xs-6 col-sm-6">
													<strong>Name&nbsp;:</strong>
												  </div>
												  <div class="col-md-6 col-xs-6 col-sm-6">
												  <?php echo isset($user_details['name'])?$user_details['name']:''?>
												  </div>
											  </div>
											   <div class="row">
												  <div class="col-md-6 col-xs-6 col-sm-6">
													<strong>Email&nbsp;:</strong>
												  </div>
												  <div class="col-md-6 col-xs-6 col-sm-6">
												   <?php echo isset($user_details['email'])?$user_details['email']:''?>
												  </div>
											  </div>
											  
											  <div class="row">
												  <div class="col-md-6 col-xs-6 col-sm-6">
													<strong>Mobile Number&nbsp;:</strong>
												  </div>
												  <div class="col-md-6 col-xs-6 col-sm-6">
												 <?php echo isset($user_details['mobile_number'])?$user_details['mobile_number']:''?>
												  </div>
											  </div>
											  
											  <div class="row">
												  <div class="col-md-6 col-xs-6 col-sm-6">
													<strong>Working Station Region&nbsp;:</strong>
												  </div>
												  <div class="col-md-6 col-xs-6 col-sm-6">
												   <?php echo isset($user_details['region_name'])?$user_details['region_name']:''?>
												  </div>
											  </div>
											  <div class="row">
												  <div class="col-md-6 col-xs-6 col-sm-6">
													<strong>Working Station Address&nbsp;:</strong>
												  </div>
												  <div class="col-md-6 col-xs-6 col-sm-6">
												   <?php echo isset($user_details['address'])?$user_details['address']:''?>
												  </div>
											  </div>
											  
											  
											  
											  
										  </div>
					
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
  