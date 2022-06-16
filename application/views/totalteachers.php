<html>
<head>  
<div class="container">
   <h1 style="margin-top:3%">Total Teachers In The School</h1>
   <a class="btn btn-lg btn-primary"  style="float:right;" href="<?php echo base_url().'index.php/teacher/addteacher/'?>"><i class="fa fa-plus"></i> Add Teacher</a></div>
		<span style="float:left; margin-left:10%">Select Number Of Rows   </span>
				<div class="form-group"style="float:left;"> 	<!--		Show Numbers Of Rows 		-->
			 		<select class  ="form-control" name="state" id="maxRows">
						 <option value="5000">Show ALL Rows</option>
						 <option value="5">5</option>
						 <option value="10">10</option>
						 <option value="15">15</option>
						 <option value="20">20</option>
						 <option value="50">50</option>
						 <option value="70">70</option>
						 <option value="100">100</option>
						</select>
			 		
			  	</div>

<table class="table table-striped table-class" id= "table-id"style="background:white;width:80%;margin-left:10% ;">
        <tbody > 
        <thead style=" background: mediumslateblue;"> 
         <tr>  
            <td class="p">Email Id</td>  
            <td class="p">First Name</td> 
            <td class="p">class_id</td>
            <td class="p">section_id</td> 
            <td class="p">Action</tb>
            <td class="p">Delete</tb>
         </tr> 
         </thead>   
     
         <div class="col-md-8">
        
        <div  style="margin-top: 5%;">
<?php  
         foreach ($h->result() as $row)  
         {  
            ?> <tr>  
            <td><a class="nav-link"><?php echo $row->email;?></td>  
            <td><a class="nav-link"><?php echo $row->fname;?></a></td>
            <td><a class="nav-link"><?php echo $row->class_id;?></a></td>
            <td><a class="nav-link"><?php echo $row->section_id;?></a></td>
            <td><a class="nav-link" href="<?php echo base_url().'index.php/teacher/editteacher/'.$row->teacher_id?>">edit</a></td>
            <td><a href="#" title="delete"  class="delete" onClick="deleteConfirm('<?php echo $row->teacher_id;?>')">Delete</a></td>
        
        </tr>    
         <?php }  
         ?> 
          
          </div> 
         </div>
      </tbody>  
   </table>  
     
<!--		Start Pagination -->
<div class='pagination-container' style="float:right;border:1px solid;background:white" >
				<nav>
				  <ul class="pagination">
            
            <li data-page="prev" >
								     <span > << prives<span  class="sr-only">(current)</span ></span>
								    </li>
				   <!--	Here the JS Function Will Add the Rows -->
        <li data-page="next" id="prev">
								       <span style="padding-right:10px">Next >> <span class="sr-only">(current)</span></span>
								    </li>
         </ul>
         </nav>
         <div style="height:5%">
                </div>
</html>  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<script type='text/javascript'>

   function deleteConfirm(teacher_id){
     if(confirm("do you want to delete ")){
      $.ajax({
      url:"<?php echo base_url(); ?>index.php/teacher/teacherdelete",
    Type:"POST",
    data:{teacher_id:teacher_id},
    dataType:"JSON",
    success:function(data)
    { 
       alert("deleted ")
      window.location.reload(); 
     }
   });
}
   }

</script>

</script>

<style>
   .center {
  margin-left: 5%;
  margin-right: auto;
}
.p{padding: 10px;}
body{

background-color: #eee; 
}

table th , table td{
text-align: center;
}

table tr:nth-child(even){
background-color: #BEF2F3
}

.pagination li:hover{
cursor: pointer;
}
  table tbody tr {
     display: none;
  }

   </style>
   
<script>
  getPagination('#table-id');
					
		 

function getPagination(table) {
  var lastPage = 1;

  $('#maxRows')
    .on('change', function(evt) {
      //$('.paginationprev').html('');						// reset pagination

     lastPage = 1;
      $('.pagination')
        .find('li')
        .slice(1, -1)
        .remove();
      var trnum = 0; // reset tr counter
      var maxRows = parseInt($(this).val()); // get Max Rows from select option

      if (maxRows == 5000) {
        $('.pagination').hide();
      } else {
        $('.pagination').show();
      }

      var totalRows = $(table + ' tbody tr').length; // numbers of rows
      $(table + ' tr:gt(0)').each(function() {
        // each TR in  table and not the header
        trnum++; // Start Counter
        if (trnum > maxRows) {
          // if tr number gt maxRows

          $(this).hide(); // fade it out
        }
        if (trnum <= maxRows) {
          $(this).show();
        } // else fade in Important in case if it ..
      }); //  was fade out to fade it in
      if (totalRows > maxRows) {
        // if tr total rows gt max rows option
        var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
        //	numbers of pages
        for (var i = 1; i <= pagenum; ) {
          // for each page append pagination li
          $('.pagination #prev')
            .before(
              '<li data-page="' +
                i +
                '">\
								  <span>' +
                i++ +
                '<span class="sr-only">(current)</span></span>\
								</li>'
            )
            .show();
        } // end for i
      } // end if row count > max rows
      $('.pagination [data-page="1"]').addClass('active'); // add active class to the first li
      $('.pagination li').on('click', function(evt) {
        // on click each page
        evt.stopImmediatePropagation();
        evt.preventDefault();
        var pageNum = $(this).attr('data-page'); // get it's number

        var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option

        if (pageNum == 'prev') {
          if (lastPage == 1) {
            return;
          }
          pageNum = --lastPage;
        }
        if (pageNum == 'next') {
          if (lastPage == $('.pagination li').length - 2) {
            return;
          }
          pageNum = ++lastPage;
        }

        lastPage = pageNum;
        var trIndex = 0; // reset tr counter
        $('.pagination li').removeClass('active'); // remove active class from all li
        $('.pagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
        // $(this).addClass('active');					// add active class to the clicked
	  	limitPagging();
        $(table + ' tr:gt(0)').each(function() {
          // each tr in table not the header
          trIndex++; // tr index counter
          // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
          if (
            trIndex > maxRows * pageNum ||
            trIndex <= maxRows * pageNum - maxRows
          ) {
            $(this).hide();
          } else {
            $(this).show();
          } //else fade in
        }); // end of for each tr in table
      }); // end of on click pagination list
	  limitPagging();
    })
    .val(5)
    .change();

  // end of on select change

  // END OF PAGINATION
}

function limitPagging(){
	// alert($('.pagination li').length)

	if($('.pagination li').length > 7 ){
			if( $('.pagination li.active').attr('data-page') <= 3 ){
			$('.pagination li:gt(5)').hide();
			$('.pagination li:lt(5)').show();
			$('.pagination [data-page="next"]').show();
		}if ($('.pagination li.active').attr('data-page') > 3){
			$('.pagination li:gt(0)').hide();
			$('.pagination [data-page="next"]').show();
			for( let i = ( parseInt($('.pagination li.active').attr('data-page'))  -2 )  ; i <= ( parseInt($('.pagination li.active').attr('data-page'))  + 2 ) ; i++ ){
				$('.pagination [data-page="'+i+'"]').show();

			}

		}
	}
}

$(function() {
  // Just to append id number for each row
  $('table tr:eq(0)').prepend('<th> ID </th>');

  var id = 0;

  $('table tr:gt(0)').each(function() {
    id++;
    $(this).prepend('<td>' + id + '</td>');
  });
});

//  Developed By Yasser Mas
// yasser.mas2@gmail.com
</script>