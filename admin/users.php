<?php include "includes/header.php" ?>

<?php  if (!$session->is_signed_in()) { redirect("login.php"); } ?>

<?php 

$users = User::find_all();
// print_r($users);
    
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
                        <!-- <small>Subheading</small> -->
                    </h1>

                    <a href="add_user.php" class="btn btn-primary">Add User</a>
                    
                    <div class="col-md-12">
                        
                        <table class="table table-bordered table-hover">

                          <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Photo</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                </tr>
                            </thead>  

                            <tbody>

                            <?php foreach ($users as $user): ?>
                                
                                <tr>
                                    <td><?php echo $user->id ?></td>
                                    <td><img class ="admin-user-thumbnail user-image-thumbnail" src="<?php echo $user->image_path_and_placeholder(); ?>" alt="image">
                                    </td>
                                    <td><?php echo $user->username; ?>
                                         <div class="image_link">
                                            <a href="delete_user.php?id=<?php echo $user->id ; ?>" class ="btn btn-link btn-sm" >Delete</a>
                                            <a href="edit_user.php?id=<?php echo $user->id ;?>" class ="btn btn-link btn-sm">Edit</a>
                                            <a href="" class ="btn btn-link btn-sm">View</a>
                                        </div>
                                    </td>
                                    <td><?php echo $user->firstname; ?></td>
                                    <td><?php echo $user->lastname; ?></td>
                                </tr>

                            <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            </div>
            <!-- /.container-fluid -->


        </div>
        <!-- /#page-wrapper -->


    <?php include "includes/footer.php" ?>