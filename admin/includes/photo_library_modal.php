<?php require_once("init.php");?>


<?php 

$photos = User::find_all(); 


 ?>


  <div class="modal fade" id="photo-library">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close" >&times;</button>
            <h4 class="modal-title">Gallery System library</h4>
          </div>

          <div class="modal-body">
              <div class="col-md-9">
                  <div class="thumbnails row">
                     
                      <?php foreach ($photos as $photo): ?>
                      
                      <div class="col-xs-2">
                        <a href="#" role="checkbox" aria-checked="false" tabindex="0" id="" class="thumbnail" >
                          <img src="<?php echo $photo->image_path_and_placeholder(); ?>" alt="image" class="modal_thumbnails img-responsive">
                          </a>
                        <div class="photo-id hidden"></div>
                      </div>
                    <?php endforeach; ?>                      
                  </div>
              </div>  <!-- end col-md-9  -->

              <div class="col-md-3">
                <div id="modal_sidebar"></div>
                
              </div>
            
          </div> <!--  end modal-body -->
          <div class="modal-footer">
            <div class="row">
              
              <button id="set_user_image" class="btn btn-primary" disabled="true" data-dismiss="modal" >Apply Selection</button>

            </div>

          </div>

      </div> <!-- end modal-content -->
      
    </div> <!-- end modal-dialog-->
  </div><!-- end modall div  -->

