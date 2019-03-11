<?php include "includes/header.php" ?>


<?php  if (!$session->is_signed_in()) { redirect("login.php"); } ?>

<?php 

    $message = "";

    if (empty($_GET['id'])) {

        redirect("users.php");
    }

    $user = User::find_by_id($_GET['id']);

    // print_r($user);

    if (isset($_POST['update'])) {

        if ($user) {
          $user->username   =  $_POST['username'];
          $user->password   = $_POST['password'];
          $user->firstname  =  $_POST['firstname'];
          $user->lastname   =  $_POST['lastname'];
          $user->set_file($_FILES['user_image']);

         $user->save_user_and_image();



                  
        }
    
    }

    
 ?>



        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Gallery Admin </a>
            </div>
            <!-- Top Menu Items -->

            <?php include "includes/top_nav.php" ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

            <?php include "includes/side_nav.php" ?>

            <!-- /.navbar-collapse -->
        </nav>



        <div id="page-wrapper">         
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Users 
                        <small>Edit Form</small>
                    </h1>
                     

                    <div class="col-md-4">
                        <img class="img-responsive" src="<?php echo $user->image_path_and_placeholder(); ?> " >
                    </div>   


                    <form action="" method="post" enctype="multipart/form-data">

                    <h1 class="btn-success"><?php echo $message; ?></h1> 

                    <?php 

                        // echo "<pre>";
                        // print_r($user);
                        // echo "<pre>";
                     ?>
                    
                    <div class="col-md-8 ">
                       <div class="form-group">
                        
                           <input type="file" name="user_image"  >
                       </div>
                       <div class="form-group">
                            <label for="username">Username</label>
                           <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?> " >
                       </div>

                      
                       <div class="form-group">
                            <label for="firstname">firstname</label>
                           <input type="text" name="firstname" class="form-control" value="<?php echo $user->firstname; ?> ">
                       </div>  

                       <div class="form-group">
                            <label for="lastname">lastname</label>
                           <input type="text" name="lastname" class="form-control" value="<?php echo $user->lastname; ?> " >
                       </div> 

                       <div class="form-group">
                            <label for="password">password</label>
                           <input type="password" name="password" class="form-control" value="<?php echo $user->password; ?> ">
                       </div>

                       <div class="form-group">
                           <input type="submit" name="update" class="btn btn-primary pull-right" value="Update" >
                       </div>  
                      
                    </div>

                 </form>

                </div>
            </div>
            <!-- /.row -->

            </div>
            <!-- /.container-fluid -->


        </div>
        <!-- /#page-wrapper -->


    <?php include "includes/footer.php" ?>