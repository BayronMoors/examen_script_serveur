<?php  
/**
 * 
 *  ./app/views/templates/partials/_pagination.php
 * 
 */
?>
<?php include_once "../app/models/postModel.php";
          $count = App\Models\PostModel\countAllPost($conn);
          $numberPage = strval($count['count']) / 10;
          $pages = [];
          for ($i = 0; $i < $numberPage; $i++) {
            array_push($pages, $i + 1);
          }; ?>
          <?php if (isset($_GET['postID']) && $_GET['postID'] > 1) : ?>
            <li class="page-item"><a class="page-link" href="index/previous/<?php echo $_GET['postID'] - 1;?>/posts.html">Previous</a></li>
            <?php else: ?>
              <li class="page-item"><a class="page-link" href="index/previous/1/posts.html">Previous</a></li>
          <?php endif; ?>
          <?php foreach ($pages as $page) :  ?>
            <?php if ($page == isset($_GET['postID'])) : ?>
              <li class="page-item"><a class="page-link active" href="index/<?php echo $page; ?>/posts.html"><?php echo $page; ?></a></li>
            <?php else : ?>
              <li class="page-item"><a class="page-link" href="index/<?php echo $page; ?>/posts.html"><?php echo $page; ?></a></li>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php if (isset($_GET['postID'])) : ?>
              <?php if($_GET['postID'] < round($numberPage) + 1): ?>
              <li class="page-item"><a class="page-link" href="index/next/<?php echo $_GET['postID'] + 1; ?>/posts.html">Next</a></li>
              <?php else: ?>
              <li class="page-item"><a class="page-link" href="index/next/<?php echo round($numberPage) +1; ?>/posts.html">Next</a></li>
              <?php endif; ?>
            <?php else : ?>
              <li class="page-item"><a class="page-link" href="index/next/2/posts.html">Next</a></li>
          <?php endif; ?>