<?php

/**
 * 
 *  ./app/views/posts/index.php
 * 
 */
?>
<div class="col-md-12 page-body">
  <div class="row">
    <div class="col-md-12 content-page">
      <!-- ADD A POST -->
      <div>
        <a href="post/add/form.html" type="button" class="btn btn-primary">Add a Post</a>
      </div>
      <!-- ADD A POST END -->
      <?php foreach ($posts as $post) : ?>
        <!-- Blog Post Start -->
        <div class="col-md-12 blog-post row">
          <div class="post-title">
            <a href="post/<?php echo $post['id']; ?>/<?php echo slugify($post['title']); ?>.html">
              <h1><?php echo $post['title']; ?></h1>
            </a>
          </div>
          <div class="post-info">
            <span><?php echo datify($post['created_at'], "Y-n-d"); ?></span>
            |
            <?php include_once "../app/models/categorieModel.php";
            $categories = App\Models\CategorieModel\findCategorieByPostId($conn, $post['id']); ?>
            <?php foreach ($categories as $categorie) : ?>
              <span><?php echo $categorie['name']; ?></span>
            <?php endforeach; ?>
          </div>
          <p><?php echo charLimit($post['text']); ?></p>
          <a href="post/<?php echo $post['id']; ?>/<?php echo slugify($post['title']); ?>.html" class="
                        button button-style button-anim
                        fa fa-long-arrow-right
                      "><span>Read More</span></a>
        </div>
        <!-- Blog Post End -->
      <?php endforeach; ?>
    </div>
  </div>
</div>