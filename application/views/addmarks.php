<html>
    <head>
        <title>Add marks</title>
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">

    </head>
<body>
    <div class="container">
   
        <div class ="col-md10">
           <div class="card" style=" width: 30rem; margin-top: 5%;">
              <div class="card-header">
                Add marks of indiveal subject       </div>
         <form actiom="<?php echo base_url().'index.php/marks/addmarks' ;?>" name="user form" method="post"  >
              <div class="card-body register">
               <p class="card-text">plass fill the details</p>
               <?php
                 $msg=$this->session->flashdata('msg');
                if($msg!=""){
                echo "<div class='alart aleart-success'>$msg</div>";
                 }
      
                  ?>
              <div class="form-group">
               Class id            
                   <select type="text" name="class_id"  id="class_id"  value="" class="form-control" placeholder="class_id" >
               
               <option value="">Select class</option>  <?php
               foreach($class as $row)
             {
              echo '<option value="'.$row['class_id'].'">'.$row['class_name'].'</option>';
                }
              ?></select>  
                </div>

                <div class="form-group">
                    Section Name
          <select name="section_id" id="section_id" class="form-control input-lg">
             <option value="">Select Section</option>
               </select>
              </div>
               <div class="form-group">
                    Student Name
          <select name="student_id" id="student_id" class="form-control input-lg">
             <option value="">Select Student</option>
               </select>
                 </div>
                 <div class="form-group">
                  Subject Name           
                   <select type="text" name="subject_id"  id="subject_id"  value="<?php echo set_value('class_id'); ?>" class="form-control" placeholder="class_id" >
               
               <option value="">Select subject</option>  <?php
               foreach($subject as $row)
             {
              echo '<option value="'.$row['subject_id'].'">'.$row['subject_name'].'</option>';
                }
              ?></select>  
                </div>
               
               
               <div class="form-group">
                   <lable for="subjectmarks">Subject Marks</label>
                   <input type="text" name="subjectmarks" id="subjectmarks"  value="<?php echo set_value('subjectmarks'); ?>" class="form-control" placeholder="subjectmarks" >
               </div>
              
               
              
               <input type="submit" value="Add Marks" name="submit" calss="btn  btn-primary" style="float:right;margoin-left:10%">
              </div>   
          </form>
         
            </div>
        </div>
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
    {     console.log(data);
                 $.each(data, function(key, value) {
                if(key = 'section_id')           
                {
                        $('#section_id').append('<option value="' +value['section_id'] +'">'+ value['section_name'] +'</option>');
                   
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

 $('#section_id').change(function(){
  var section_id = $('#section_id').val();
  
  if(section_id != '')
  { 
   $.ajax({
    url:"<?php echo base_url(); ?>index.php/marks/fetchstudent",
    Type:"POST",
    data:{section_id:section_id},
    dataType:"JSON",
    success:function(data)
    {     console.log(data);
                 $.each(data, function(key, value) {
                if(key = 'student_id')           
                {
                        $('#student_id').append('<option value="' +value['student_id'] +'">'+ value['fname'] +'</option>');
                   
                }

            });
          }
   });
  }
  else
  {
   $('#student').html('<option value="">Select Student</option>');
    }
 });
});
 </script>