<html>
    <head>
    
        <title>Student</title>
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">
    
    </head>
<body  >
    <div class="container" >
    
        <div class ="col-sm-6">
           <div class="card" style=" width: 30rem; margin-top: 5%;">
              <div class="card-header">
                Add Student 
              </div>
         <form actiom="<?php echo base_url().'index.php/student/addstudent' ;?>" name="regester" method="post"  enctype="multipart/form-data">
              <div class="card-body register">
               <p class="text" style="background: white;">Student Details</p>
                <?php
                 $msg=$this->session->flashdata('msg');
                if($msg!=""){
                echo "<div class='alart aleart-success' style='margin-bottom:3%'>$msg</div>";
                 }
      
                  ?>
                <div class="form-group">
                   <lable for="fname"style="float:left" >First Name</label>           <span style="color:#ff0000">*</span>       
                   <input type="text" name="fname"  id="fname"  value="<?php echo set_value('fname'); ?>" class="form-control" placeholder="First Name" >
                </div>
                <div class="form-group"style="float:right;margin-left: 5%;">
                   <lable for="lname">Last Name</label>       <span style="color:#ff0000">*</span>           
                   <input type="text" name="lname"  id="lname"  value="<?php echo set_value('lname'); ?>" class="form-control" placeholder="Last Name" >
            </div>
            <div></div>
                <div class="form-group">
                   <lable for="email">Email</label>            <span style="color:#ff0000">*</span>  
                   <input type="email" name="email"  id="email"  value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email" >
                </div>
                <div class="form-group"style="float:left;width:48%" >
                class id            <span style="color:#ff0000">*</span> 
                 <select type="text" name="class_id"  id="class_id"  value="<?php echo set_value('class_id'); ?>" class="form-control" placeholder="class_id" >
               
                 <option value="">Select class</option>  <?php
                  foreach($class as $row)
                {
                 echo '<option value="'.$row['class_id'].'">'.$row['class_name'].'</option>';
                }
                ?></select>  
                </div>
               
                <div class="form-group"style="float:right;margin-left: 2%;width:48%">
                    Section Name    <span style="color:#ff0000">*</span> 
                   <select name="section_id" id="section_id" class="form-control input-lg">
                   <option value="">Select Section</option>
                   </select>
               </div>
               <div class="form-group">
                   <lable for="dob">Date of Birth</label>     <span style="color:#ff0000">*</span>                 
                   <input type="date" name="dob"  id="dob"  value="<?php echo set_value('dob'); ?>" class="form-control" placeholder="dob" >
               </div>
               <div>
               <label>  
                  Gender:   
                </label> <span style="color:#ff0000">*</span>  <br>  
                   <input type="radio" id="gender" name="gender" value="male"/> Male     
                          
                       <input type="radio" id="gender" name="gender" value="female"/> Female <br/>   
                </div>
                <div class="form-group">
                   <lable for="addres">Addres</label>                 
                   <textarea type="text" name="address"  id="address"  value="<?php echo set_value('address'); ?>" class="form-control" placeholder="Address" ></textarea>
                </div>
                <div class="form-group">
                  Country Name            
                   <select type="text" name="country_id"  id="country_id"  value="<?php echo set_value('country_id'); ?>" class="form-control" placeholder="country_id" >
               
                   <option value="">Select country</option>  <?php
                 
                  foreach($country as $row)
                    {
                     echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
                    }
                  ?></select>  
                </div>
              
                <div class="form-group">
                    State Name  
                 <select name="state_id" id="state_id" class="form-control input-lg">
                 <option value="">Select State</option>
                 </select>

                  </div>
               <div class="form-group">
                    City Name
                  <select name="city_id" id="city_id" class="form-control input-lg">
                  <option value="">Select city</option>
                    </select>
                  </div>
               <div class="form-group">
                   <lable for="contact">Contact</label> <span style="color:#ff0000">*</span> 
                   <input type="tel" name="contact" id="contact" value="<?php echo set_value('contact'); ?>" class="form-control" placeholder="contact"  onkeypress="return onlyNumberKey(event)" pattern="[0-9]{10}"  >
               </div>
               <div class="form-group">
                   <lable for="photo">Photo</label>
                   <input type="file" id="profile_image" name="profile_image" size="33" />
               </div>

               <input type="submit" value="Add Student" name="submit" calss="btn  btn-primary"style="float:right;margin-bottom:5%" >
              </div>   
          </form>
         
            </div>
        </div>
    </div>
    <div style="height:5%">
                </div>
</body>
</html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type='text/javascript'>
$(document).ready(function(){
 $('#class_id').change(function(){
  
  var class_id = $('#class_id').val();
  
  if(class_id != '')
  { 
   $.ajax({
    
    url:"<?php echo base_url(); ?>index.php/marks/fetchsection",
    Type:"POST",
    data:{class_id:class_id},
    dataType:"JSON",
      success:function(data)
    {  $('#section_id').html('');
        console.log(data);
                
                 $.each(data, function(key, value) { 
                if(key = 'section_id')           
                {         
                        $('#section_id').append('<option value="' +value['section_id'] +'">'+ value['section_name'] +'</option>');
                        
                }
                   } );
           
          }
          
   });
  }
  else
  {
   $('#section').html('<option value="">Select Section</option>');
    }
 });
 
});
 </script>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type='text/javascript'>
$(document).ready(function(){

 $('#country_id').change(function(){
  var country_id = $('#country_id').val();
  
  if(country_id != '')
  { 
    
   $.ajax({
    url:"<?php echo base_url(); ?>index.php/marks/fetchstate",
    Type:"POST",
    data:{country_id:country_id},
    dataType:"JSON",
    success:function(data)
    {   
      $('#state_id').html('');
        console.log(data);
                 $.each(data, function(key, value) {
                if(key = 'state_id')           
                {
                        $('#state_id').append('<option value="' +value['state_id'] +'">'+ value['state_name'] +'</option>');
                   
                }

            });
          }
   });
  }
  else
  {
   $('#section').html('<option value="">Select Section</option>');
    }
 });
 
});
 </script>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type='text/javascript'>
$(document).ready(function(){

 $('#state_id').change(function(){
  var state_id = $('#state_id').val();
  
  if(state_id != '')
  { 
    
   $.ajax({
    url:"<?php echo base_url(); ?>index.php/marks/fetchcity",
    Type:"POST",
    data:{state_id:state_id},
    dataType:"JSON",
    success:function(data)
    {  $('#city_id').html('');
        console.log(data);
                 $.each(data, function(key, value) {
                if(key = 'city_id')           
                {
                        $('#city_id').append('<option value="' +value['city_id'] +'">'+ value['city_name'] +'</option>');
                   
                }

            });
          }
   });
  }
  else
  {
   $('#section').html('<option value="">Select Section</option>');
    }
 });
 
});
 </script>
 

<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
<script>
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>