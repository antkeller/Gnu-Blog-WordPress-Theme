<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage GNU-Blog-WordPress-Theme
 * @since GNU Blog WordPress Theme 1.0.0
 */
 get_header();
 if (have_posts()) :
 ?>

   <?php include get_template_directory() . '/_/inc/modules/featured-post.php'; ?>

   <?php include get_template_directory() . '/_/inc/modules/post-filters.php'; ?>

			<section class="blog-posts container-fluid">
        <div class="section-content row">
          <div class="post-list-wrap">

  				<?php
  					$i = 1;
  					while (have_posts()) : the_post();
  						$i ++;
  						$postImage = get_post_image('blog-feature');
  						// get the main parent category
  						$category = get_the_category();
  						$catTree = get_category_parents($category[0]->term_id, false, '!', true);
  						$topCat = preg_split('/!/', $catTree);
  						$mainCategory = $topCat[0];
  						$postClass = 'blog-post post-' . $i;
  				?>

    				<article <?php post_class(array($postClass, 'col-xs-12 col-ms-12 col-sm-4')); ?> id="post-<?php the_ID(); ?>">
    					<div class="post-wrapper row clearfix">
                <a href="<?php the_permalink(); ?>" class="post-link">
      						<div class="post-image-wrapper col-ms-4 col-sm-12">
                    <img src="<?php echo get_template_directory_uri(); ?>/_/img/loading-blog.gif" data-src="<?php echo $postImage[0]; ?>" alt="Image From <?php echo get_the_title(); ?>" class="lazy" />
                  </div>
                  <div class="post-text-wrapper col-ms-8 col-sm-12">
                    <p class="post-meta">
                      <time datetime="<?php the_time('c') ?>"><?php the_time('F jS, Y') ?></time>
                      <h4 class="post-category">GNU <?php echo $mainCategory; ?></h4>
                    </p>
                    <h3 class="post-title"><?php the_title(); ?></h3>
                  </div><!-- .post-text-wrapper -->
                  <div class="read-more col-xs-12">
                    <a href="<?php the_permalink() ?>" class="tertiary">Read More</a>
                  </div>
                </a>
    					</div><!-- .post-wrapper -->
    				</article>

            <?php
                if($i %3 == 0) echo '<div class="clearfix visible-sm visible-md visible-lg"></div>';
                $i++;
              endwhile;
            ?>

          </div><!-- .post-list-wrap -->
          <div class="clearfix"></div>

          <?php post_navigation(); ?>

        </div><!-- .section-content -->
			</section><!-- .blog-posts -->

<?php else : ?>

			<section class="blog-posts container-fluid">
        <div class="section-content row">
  				<h2>Nothing Found</h2>
        </div>
			</section>

<?php endif; ?>

<?php get_footer(); ?>
