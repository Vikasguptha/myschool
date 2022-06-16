<html>
<head>  
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
      <title>All section details</title>  
      <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>"> 
   </head>  
   <table class="center" border="1">
   <a class="btn btn-lg btn-primary"  style=" margin-left: 36%;margin-top: 6%;" href="<?php echo base_url().'index.php/student/addstudent/'?>"><i class="fa fa-plus"></i> Add student</a></div>

   <tbody style="background: white"> 
         <tr>  
            <td class="p"><b>Class Name</td>  
            <td class="p"><b>Section Name</td> 
            <td class="p"><b>Studnt First  Name</td>  
            <td class="p"><b>Studdent Id</td> 
            <td class="p"><b>Action</td> 
           
         </tr> 
         <div class="col-md-8">
        
         <div class="card-header" style="
    margin-top: 2%;
    width: 66.6%;
    margin-left: 6%;
    background: gainsboro;
">
 Section Details
</div>

         <?php  
       //  print_r($student);
          foreach ($student as $student) {
              # code...
         
            ?><tr>  
            <td><a class="nav-link" ><?php echo $student['class_id'];?></a></td>  
            <td><a class="nav-link" ><?php echo $section;?></a></td>
            <td><a class="nav-link" ><?php echo $student['fname'];?></a></td>  
            <td><a class="nav-link" ><?php echo $student['reg_id'];?></a></td>
            <td><a class="nav-link" href="<?php echo base_url().'index.php/marks/totalmarks/'.$student['student_id']?>" >marks</a></td>
        </tr>  

         <?php }
         ?>  
         </div>
         </div>
      </tbody>  
   </table>  
         </form>
<body>  
<div style="height:5%">
                </div>
</body>  
</html>  
<style>
   .center {
  margin-left: 5%;
  margin-right: auto;
}
.p{padding: 10px;}
   </style>