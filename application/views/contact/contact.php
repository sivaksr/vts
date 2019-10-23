<head>
<style>
.contact-form{
    background: #fff;
    margin-top: 10%;
    margin-bottom: 5%;
    width: 100%;
}
.contact-form .form-control{
    border-radius:1rem;
}
.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius: 6rem;
    width: 11%;
    transform: rotate(29deg);
}
.contact-form form{
	padding-top:10%;
}
.contact-form form .row{
    margin-bottom: -7%;
}
.contact-form h3{
    margin-bottom: 8%;
    margin-top: -10%;
    text-align: center;
    color: #000000;
}
.contact-form .btnContact {
    width: 50%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #353232;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
}
.btnContactSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    color: #fff;
    background-color: #0062cc;
    border: none;
    cursor: pointer;
}
.card{
	background-color: transparent;
    border: none;
}
.card-block{
	letter-spacing: 0.03em;
    position: relative;
    background: #efeeee;
    color: #000000;
    box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.08);
    padding: 1.5rem;
	border-radius:15px;
}

</style>
</head>
<div class="container contact-form">
           
           
               <div class="row" style="margin-top:-10%;">
				<div class="col-md-6" style="margin-top:100px;">

			    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
               
					  <div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-block">
							<p><i class="fa fa-map-marker" aria-hidden="true"></i><strong> Prachatech </strong><br>MIG – 68, Road no - 1, Near YSR Statue, KPHB-500072, Hyderabad, Telangana, India</p>
						</div>
					</div>
				</div>
				</div>
				
				</div>	 
				
				 <div class="col-md-12 col-md-12 col-sm-12 col-xs-12 mb-3">
               
					  <div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-block">
							<p><i class="fa fa-map-marker" aria-hidden="true"></i><strong><?php echo isset($contact_list['region'])?$contact_list['region']:''?> </strong><br><?php echo isset($contact_list['address'])?$contact_list['address']:''?></p>
						</div>
					</div>
				</div>
				</div>
				
				</div>	 
				
				 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               
					  <div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-block">
							<p><i class="fa fa-map-marker" aria-hidden="true"></i><strong> Prachatech </strong><br>MIG – 68, Road no - 1, Near YSR Statue, KPHB-500072, Hyderabad, Telangana, India</p>
						</div>
					</div>
				</div>
				</div>
				</div>	 
				</div>
                    <div class="col-md-6">
					 <div class="contact-image">
						<img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
					</div>
					 <form method="post" action="<?php echo base_url('contact/contactpost');?>" enctype="multipart/form-data">
					<h3>Drop Us a Message</h3>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your Name *"  required value="" />
                        </div>
                       
                        <div class="form-group">
                            <input type="text" name="phone_number" class="form-control" required placeholder="Your Phone Number *" value="" />
                        </div>
						<div class="form-group">
                            <input type="text" name="vehicle_number" class="form-control" required placeholder="Vehicle Number *" value="" />
                        </div>
						<div class="form-group">
                            <input type="text" name="chasis_number" class="form-control" required placeholder="Chasis Number *" value="" />
                        </div>
						<div class="form-group">
                            <input type="text" name="form_police_station" class="form-control" required placeholder="From Police Station Email*" value="" />
                        </div>
						<div class="form-group">
                            <input type="text" name="to_police_station" class="form-control" required placeholder="To Police Station Email *" value="" />
                        </div>
						<div class="form-group">
                            <input type="file" name="document" class="form-control"   />
                        </div>
                        <div class="form-group">
                            <textarea name="msg" class="form-control" placeholder="Your Message *" required style="width: 100%; height: 100px;"></textarea>
                        </div>
						
						 <div class="form-group">
                            <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                        </div>
						</div>
						</form>
                </div>
            
</div>

