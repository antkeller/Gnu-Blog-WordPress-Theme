<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage GNU-Blog-WordPress-Theme
 * @since GNU Blog-WordPress Theme 1.0.0
 */
 get_header(); ?>

      <section class="listing-heading container-fluid">
        <div class="section-content row">
          <h1 class="col-xs-12">Search Results for <span class="search-query"><?php the_search_query(); ?></span></h1>
        </div>
      </section>

      <?php include get_template_directory() . '/_/inc/modules/post-filters.php'; ?>

      <section class="search-results container-fluid">
				<div class="search-results-section-content row">
          <div class="post-list-wrap">

            <?php
							$i = 1;
							if (have_posts()) : while (have_posts()) : the_post();
								$i ++;
								$postImage = get_post_image('blog-feature');
								// get the main parent category
								$category = get_the_category();
								$catTree = get_category_parents($category[0]->term_id, false, '!', true);
								$topCat = preg_split('/!/', $catTree);
								$mainCategory = $topCat[0];
						?>

            <article <?php post_class('blog-post col-xs-12 col-ms-12 col-sm-4'); ?> id="post-<?php the_ID(); ?>">
              <a href="<?php the_permalink(); ?>">
                <div class="post-wrapper row">
                  <div class="post-image-wrapper col-ms-4 col-sm-12">
                    <img src="<?php echo get_template_directory_uri(); ?>/_/img/loading-blog.gif" data-src="<?php echo $postImage[0]; ?>" alt="Image From <?php echo get_the_title(); ?>" class="lazy" />
                  </div><!-- .post-image-wrapper -->
                  <div class="post-text-wrapper col-ms-8 col-sm-12">
                    <div class="post-meta">
                      <time datetime="<?php the_time('c'); ?>"><?php echo the_time('F jS, Y'); ?></time>
                      <h4 class="post-category">GNU <?php echo $mainCategory; ?></h4>
                    </div><!-- .post-meta -->
                    <h3 class="post-title"><?php the_title(); ?></h3>
                  </div>
                  <div class="read-more col-xs-12">
                    <a href="<?php the_permalink(); ?>" class="tertiary">Read More</a>
                  </div>
                </div><!-- .post-wrapper -->
              </a>
            </article>

            <?php
              if($i %3 == 0) echo '<div class="clearfix visible-sm visible-md visible-lg"></div>';
              $i++;
              endwhile;
            ?>

            </div><!-- .post-list-wrap -->
            <div class="clearfix"></div>

            <?php post_navigation(); ?>

          <?php else : ?>

                <h2>Nothing Found</h2>

          <?php endif; ?>

				</div><!-- .section-content -->
			</section><!-- .search-results -->

<?php get_footer(); ?>
