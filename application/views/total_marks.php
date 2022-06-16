<?php $total=0;?>
<html>
<head>  
   
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
      <title>total students</title>  
      <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>"> 
   </head>  
   <div class="container " style="
    background: antiquewhite;
    white-space: 40px;
    width: 36.5%;
    margin-top: 5%;
    margin-left: 8%;
">
   Student Name: <?php echo $data['fname']; echo "  ".$data['lname'];?><br>
   Class : <?php echo $data['class_id']?><br>
   Section:<?php echo $section?><br>
   Registation no: <?php echo $data['reg_id']?><br>
</div>
   <table class="center" border="01">
        <tbody style="background: white">  
         <tr>  
            <td class="p"><b>Subject Id</td>  
            <td class="p"><b>Subject Name</td>  
            <td class="p"><b>Subject Marks</td> 
            <td class="p"><b> Acquired Marks </td> 
         </tr> 
         <div class="col-md-8">
         <div class="card-header" style="
   
    width: 56.6%;
    margin-left: 10.6%;
    background: gainsboro;
   ">
 Student Marks
</div>


<?php foreach ($student as $row)  
         {  
            ?><tr>  
            <td><a class="nav-link" ><?php echo $row['subject_id'];?></td>  
            <td><a class="nav-link" ><?php  foreach($subject as $raw){if($row['subject_id']==$raw['subject_id']) {echo $raw['subject_name'];}}?></td>  
            <td><a class="nav-link" ><?php  foreach($subject as $raw){if($row['subject_id']==$raw['subject_id']) {echo $raw['totalmarks'];}}?></td>  
            <td><a class="nav-link" ><?php echo $row['studentmarks'];?></a></td>
           
        </tr>    
         <?php $total+=$row['studentmarks']; }  
           ?>  
         
         </div>
         </div>        
      </tbody>      
   </table>  
   <div class="total" style="margin-left: 8%;
    background: white;
    width: 36.4%; padding-left: 15%; border-style: ridge;"
 border="01">
         Total marks of student : <?php echo $total?>
         </div>
     </form>
<body>  
<div style="height:5%">
                </div>
</body>  
</html>  
<style>
   .center {
  margin-left: 8%;
  margin-right: auto;
}
.p{padding: 10px;}
   </style>