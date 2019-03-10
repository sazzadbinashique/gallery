<?php include "includes/header.php" ?>

<?php  if (!$session->is_signed_in()) { redirect("login.php"); } ?>



 <?php 


 $message = "";

if (isset($_POST['submit'])) {

    $photo = new Photo();

    $photo->title = $_POST['title'];
    $photo->description = $_POST['description'];
    $photo->set_file($_FILES['file_upload']);


    if ($photo->save()) {

        $message = "Photo uploaded Successfully."; 

    }else{
        $message = join("<br>", $photo->errors);
        echo "here";
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
                        Upload Page
                        <small>Subheading</small>
                    </h1>

                    <div class="col-md-6">
                    <form action="upload.php" method="post" enctype="multipart/form-data" >
                         
                         <h1 class="btn-success"><?php echo $message; ?></h1>   

                        <div class="form-group">
                            <input type="text" class="form-control" name="title">
                        </div>
                         <div class="form-group">
                         <textarea name="description" id="" class="form-control" cols="30" rows="10"></textarea>
                            <!-- <input type="textarea" class="form-control" name="description"> -->
                        </div>

                         <div class="form-group">
                            <input type="file" class="" name="file_upload" >
                        </div>

                        <div class="form-group">
                            <input type="submit" class ="btn btn-primary" name="submit" value="Submit" >
                        </div>
                            


                    </form>
                    </div>

                </div>
            </div>
            <!-- /.row -->

            </div>
            <!-- /.container-fluid -->


        </div>
        <!-- /#page-wrapper -->


    <?php include "includes/footer.php" ?>