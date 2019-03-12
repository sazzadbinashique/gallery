<?php include "includes/header.php" ?>

<?php  if (!$session->is_signed_in()) { redirect("login.php"); } ?>

<?php 

$comments = Comment::find_all();
// print_r($comments);

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
                comments 
                <!-- <small>Subheading</small> -->
            </h1>

            
            <div class="col-md-12">
                
                <table class="table table-bordered table-hover">

                  <thead>
                        <tr>
                            <th>ID</th>
                            <th>Author</th>
                            <th>Body</th>
                        </tr>
                    </thead>  

                    <tbody>

                    <?php foreach ($comments as $comment): ?>
                        
                        <tr>
                            <td><?php echo $comment->id ?></td>
                            <td><?php echo $comment->author; ?>
                                 <div class="image_link">
                                    <a href="delete_comment.php?id=<?php echo $comment->id ; ?>" class ="btn btn-link btn-sm" >Delete</a>
                                
                                </div>
                            </td>
                            <td><?php echo $comment->body; ?></td>
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