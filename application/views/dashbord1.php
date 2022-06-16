<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashbord</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
 <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">
 <link rel="stylesheet" href="<?php echo base_url().'assets/js/bootstrap.js'?>">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  display: none;
  height: 100%;
  width: 250px;
 position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #d7d7d7;
  overflow-x: hidden;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #d7d7d7;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}

}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #0e0e0e;
  display: block;
  border: none;
  background: none;
  width:100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #0e0e0e;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  
  color: black;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #d7d7d7;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

</style>
</head>
<body    class="cssa" align="center" style="background-image: url('<?php echo base_url().'image/Kid-Learning.jpg'?>')" >

<div id="mySidenav" class="sidenav ">
    
  <div class="header"style="border: 3px solid black; padding: 10px; background: cornflowerblue;">  <b><h4> Welcome <?php print_r($this->session->userdata['user']['username']);?> <h4></div>
  <a href="javascript:void(0)" style="text-align:right;margin-top:3%"  class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#" style="margin-left:150%" >x</a>
 
  <button class="dropdown-btn"style="border: .5px solid black;">Student
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    
    <a style="border: .5px solid black;" class="dropdown-item" href="<?php echo base_url().'index.php/student/addstudent ';?>">Add student</a>
   <a style="border: .5px solid black;" class="dropdown-item" href="<?php echo base_url().'index.php/student/totalstudents '?>">Total students</a>
  </div>
  <button class="dropdown-btn"style="border: .5px solid black;">Teacher
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
   <a  style="border: .5px solid black;"class="dropdown-item" href="<?php echo base_url().'index.php/student/addteacher ';?>">Add Teacher</a>
   <a style="border: .5px solid black;" class="dropdown-item" href="<?php echo base_url().'index.php/student/totalteachers '?>">Total Teachers</a>
  </div>

  <button class="dropdown-btn"style="border: .5px solid black;">User
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container" >
  <a style="border: .5px solid black;"class="dropdown-item" href="<?php echo base_url().'index.php/user/create_user ';?>">Create New User</a>
              <a style="border: .5px solid black;" class="dropdown-item" href="<?php echo base_url().'index.php/user/all_users ';?>">All User Details</a>
        <a  style="border: .5px solid black;"class="dropdown-item" href="<?php echo base_url().'index.php/user/change_password ';?>">change password</a>
  </div>
  <button class="dropdown-btn"style="border: .5px solid black;">Class
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
  <a style="border: .5px solid black;" class="dropdown-item" href="<?php echo base_url().'index.php/classes/create_class ';?>">Add class</a>
  <a style="border: .5px solid black;" class="dropdown-item" href="<?php echo base_url().'index.php/classes/allclass ';?>">All class</a>
  <a  style="border: .5px solid black;"class="dropdown-item" href="<?php echo base_url().'index.php/section/create_section ';?>">Add Section</a>
</div>
<button class="dropdown-btn"style="border: .5px solid black;">Marks/Subjects
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
  <a style="border: .5px solid black;" class="dropdown-item" href="<?php echo base_url().'index.php/marks/addmarks ';?>">Add Marks</a>
  <a style="border: .5px solid black;" class="dropdown-item" href="<?php echo base_url().'index.php/subject/addsubject ';?>">Add subject</a>
</div>
</div>

<nav class="navbar navbar-expand-md navbar-light bg-light " >
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url().'index.php/user/dashbord '?>">Home <span class="sr-only">(current)</span></a>
            </li>
           
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Student </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/student/addstudent ';?>">Add student</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/student/totalstudents '?>">Total students</a></li>
                    
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Teacher </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/teacher/addteacher ';?>">Add Teacher</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/teacher/totalteachers ';?>">Total Teachers</a></li>
                    
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Admin User </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/user/create_user ';?>">Create New User</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/user/all_users ';?>">All User Details</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/user/change_password ';?>">change password</a></li>
                </ul>

            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Class </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/classes/create_class ';?>">Add class</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/classes/allclass ';?>">All class</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/section/create_section ';?>">Add Section</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> marks/subject </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/marks/addmarks ';?>">Add Marks</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/subject/addsubject ';?>">Add subject</a></li>

                </ul>
            </li>
            <li style="float:right;margin-left:433px"><a class="nav-link"  href="<?php echo base_url().'index.php/user/edituser/'.$this->session->userdata['user']['user_id']?>"> welcome <?php print_r($this->session->userdata['user']['username']);?>  </a></li>
            <li class="nav-item active" style="position:absolute;right:20px;">
                <a class="nav-link"  href="<?php echo base_url().'index.php/user/logout '?>">logout <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>
<div style="border:2px solid black;width :20%;margin:9% ;padding:15px;border-radius: 15px;" > <h3><b><u>Total Students</u></b></h3>
<button onclick="myfunction()">count of students :<?php echo $student?></button>
</div>
<p id="section_id"></p>
<div class="col-lg-6" id ="show" style="background:white ;    border-radius: 5px;padding: 15px;">
					  <table class="table table-bordered table-striped">
                   <thead>
		                <tr>
		                    <th>class_id</th>
		                    <th>section_id</th>
		                    <th>Teacher full name</th>
                        <th>Student count </th>
		                </tr>
		                </thead>
						<tbody id="exampleid" style="text-transform: capitalize;">
						</tbody>
		            </table> 
<style>
  #show{
    display:none;
  }
.navbar-nav li:hover > ul.dropdown-menu {
    display: block;
}
.dropdown-submenu {
    position:relative;
}
.dropdown-submenu > .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top:-6px;
}

/* rotate caret on hover */
.dropdown-menu > li > a:hover:after {
    text-decoration: underline;
    transform: rotate(-90deg);
} 

  </style>


<script>
function openNav() {
  document.getElementById("mySidenav").style.display = "block";
}

function closeNav() {
  document.getElementById("mySidenav").style.display = "none";
}
//* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}

</script>
   
<style>
.cssa {
  
  background-size: 1400px;
  width:100%;
  height: 300px;
 
}
.logout{
    float:right;
}
</style>
</body>
</html> 
<script type='text/javascript'>

   function myfunction(){
    document.getElementById("show").style.display = "block";    
    var dt=''; 
  $.ajax({
    url:"<?php echo base_url(); ?>index.php/classes/fecthclass",
    Type:"POST",
   
    dataType:"JSON",
    success:function(data)
    {  var a=data;
         
   $.ajax({
   
            
           type: "post",
           url:"<?php echo base_url(); ?>index.php/teacher/fecthteacher" ,
           data: {a,a},
           success: function(data){
var res = $.parseJSON(data);
              console.log(data);
               $.each(res, function(key, value) {
                console.log(value)
                if(key = 'section_id')           
                {  
                  $('#exampleid').append("<tr>\
										<td>"+value['class_id']+"</td>\
										<td>"+value['section_name'].toUpperCase()+"</td>\
										<td>"+value['teacherfname']+"  "+value['teacherlname']+"</td>\
                    <td>"+value['studentcount']+"</td>\
										</tr>"                  
                 )}
                });
           }
       });
   }  
    
   });
}
   

</script>
