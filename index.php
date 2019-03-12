
    <?php include "includes/header.php" ?>
    <!-- Navigation -->
    
    <?php include "includes/navigation.php" ?>



    <?php 
        $photos = Photo::find_all();

     ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">

                <div class="thumbnails row">
                   <?php foreach ($photos as $photo): ?>

                        <div class="col-xs-6 col-md-3">
                            <a href="single_photo.php?id=<?php echo $photo->id;?>" class="thumbnail">

                               <img class="home-page-photo img-responsive" src="admin/<?php echo $photo->pictures_path(); ?>" alt="">     
                            
                            </a>
                        </div>                

                    <?php endforeach; ?>   
                </div>
            
                


            </div>

          <!-- Blog Sidebar Widgets Column -->
        <!-- <div class="col-md-4"> -->
           <?php // include "includes/sidebar.php" ?>
        <!-- </div> --> 


        </div>
        <!-- /.row -->

<?php include "includes/footer.php" ?>