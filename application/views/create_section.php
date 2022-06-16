<html>
    <head>
        <title>create_class</title>
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 
    </head>
<body>
    <div class="container">
   
        <div class ="col-md10">
           <div class="card" style=" width: 30rem; margin-top: 5%;">
              <div class="card-header">
                Creating New Section   </div>
         <form actiom="<?php echo base_url().'index.php/classes/create_class' ;?>" name="user form" method="post"  >
              <div class="card-body register">
               <p class="card-text">Please fill the details</p>
               <?php 
                 $msg=$this->session->flashdata('msg');
                if($msg!=""){
                echo "<div class='alart aleart-success'>$msg</div>";
                 }
      
                  ?>
               <div class="form-group">
               Class Id            
                   <select type="text" name="class_id"  id="class_id"  value="<?php echo set_value('class_id'); ?>" class="form-control" placeholder="class id" >
               
               <option value="">Select class</option>  <?php
   // print_r($class);
    foreach($class as $row)
    {
     echo '<option value="'.$row['class_id'].'">'.$row['class_name'].'</option>';
    }
    ?></select>  
                </div>
               <div class="form-group">
                   <lable for="section_name">Section Name</label>                 
                   <input type="text" name="section_name"  id="section_name"  value="<?php echo set_value('section_name'); ?>" class="form-control" placeholder="Section Name" >
               </div>
               <div class="form-group">
               Teacher Name           
                   <select type="text" name="teacher_id"  id="teacher_id"  value="<?php echo set_value('teacher_id'); ?>" class="form-control" placeholder="Teacher_id" >
               
               <option value="">Select Teacher</option>  <?php
   // print_r($class);
    foreach($teacher as $row)
    {
     echo '<option value="'.$row['teacher_id'].'">'.$row['fname'].'</option>';
    }
    ?></select>  
               
               <input type="submit" value="create section" name="submit" calss="btn  btn-primary" style=" margin-left: 70%; margin-top: 4%;">              </div>   
          </form>
         
            </div>
        </div>
    </div>
    <div style="height:5%">
                </div>
</body>
</html>