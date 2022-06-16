<html>
<head>  
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
      <title>All users details</title>  
      <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>"> 
   </head>  

   <table class="center" border="1" style="background: white;">
   <a class="btn btn-lg btn-primary"  style="margin-left:35%;margin-top:5%;" href="<?php echo base_url().'index.php/user/create_user/'?>"><i class="fa fa-plus"></i> Add User</a></div>

        <tbody>  
         <tr>  
            <thread>
            <td class="p" ><b>User Name</td>  
            <td class="p" ><b>First Name</td> 
            <td class="p" ><b>Last Name</td>
            <td class="p" ><b>Email </td> 
            <th class="p" ><b>Action</th>
</thread>
            </b> </tr> 
         <div class="col-md-8">
         <div class="card-header" style="
margin-top: 1%;
    width: 61.5%;
    margin-left: 6%;
    background: gainsboro;
">
 Total Users
</div>

         <?php  
         foreach ($h->result() as $row)  
         {  
            ?><tr>  
            <td><a class="nav-link" ><?php echo $row->username;?></td>  
            <td><a class="nav-link" ><?php echo $row->fname;?></a></td>
            <td><a class="nav-link" ><?php echo $row->lname;?></a></td>
            <td><a class="nav-link" ><?php echo $row->email;?></a></td>
            <td><a class="nav-link" href="<?php echo base_url().'index.php/user/edituser/'.$row->user_id?>">edit</a></td>

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