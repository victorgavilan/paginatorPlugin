<?php

function postTemplate( &$page, &$pluginConfig ){

  echo '<h2><a href="'. $page['href'] .'">'. $page['title'] .'</a></h2>';

  /*** Post template with thumbnail ***/ 
  if ($page['thumbnail']) : ?>          

    <div class="post pure-g">
      <div class="pure-u-1 pure-u-md-1-4">
        <div class="postImg">
          <img src="<?php echo $page['thumbnailPath'] ?>" />
        </div>      
      </div>
      
      <!--  Post Content -->
      <div class="pure-u-1 pure-u-md-3-4 ">
        <div class="pure-g">
          <div class="pure-u-1">
            <div class="postContent">
              <?php echo $page['content']; ?>
            </div>
          </div>

      <?php if ($pluginConfig['pp_ShowDate']) :  //Show Date ?>
        <div class="pure-u-1">
          <div class="postTime">Publicado el <?php echo $page['pageDate'] ?></div>
        </div> 
      <?php endif; ?>
        
        </div> <!-- end pure-g post content-->
      </div>
    </div> <!-- end pure-g -->



  <?php /*** Post template without thumbnail ***/ 
     else: ?>

        <div class="post">
    
          <!--  Post Content -->
          <div class="postContent">
            <?php echo $page['content']; ?>
          </div>
        
      <?php if ($pluginConfig['pp_ShowDate']) :  //Show Date ?>
        <div class="pure-u-1">
          <div class="postTime">Publicado el <?php echo $page['pageDate'] ?></div>
        </div> 
      <?php endif; ?>
      
      </div>
  <?php endif;         
}  
?>
