<?php 

include 'controller/session.php';

include '../controller/config.php' ;



?>

<!DOCTYPE html>

<html lang="en">



<!----css----->

<?php include 'include/css.php';?>

<!-----css---->

  

<body class="app sidebar-mini">



<!----css----->

<?php include 'include/header-sidebar.php';?>

<!-----css---->



  <main class="app-content">

      <div class="app-title">

        <div>

          <h1><i class="fa fa-user"></i> Task Category </h1>

        </div>

        

      </div>

      

    



     <div class="row">
       
       
      
       <div class="col-md-12">
    
        <div class="tile">
            
        <div class="tile-body">
        
        <form method="post" action="controller/adcat.php" enctype="multipart/form-data">
        
        
        <div class="form-group row">
        <label class="control-label col-md-3">Enter Category</label>
        <div class="col-md-8">
        <input class="form-control col-md-8" type="text" name="cat" placeholder="Enter Category" required="">

        </div>
        </div>
        
        
        <div class="form-group row">
        <label class="control-label col-md-3">Category Image</label>
        <div class="col-md-8">
        <input class="form-control col-md-8" type="file" name="cat_img" required="">

        </div>
        </div>
        
        
        <div class="form-group row">
        <div class="col-md-12">
        <button type="submit" name="submit" class="form-control col-md-12 btn btn-success">Add</button> 
        </div>
        
        </div>
        
        </form>
            
        </div    
      
      </div>
      </div>
      
      </div>
      </div>


    </main>



<!----css----->

<?php include 'include/footer.php';?>

<!-----css---->



 <script type="text/javascript">$('#user').DataTable();</script>



  </body>

</html>