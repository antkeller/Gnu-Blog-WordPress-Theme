<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Fourteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage GNU-Blog-WordPress-Theme
 * @since GNU Blog WordPress Theme 1.0.0
 */

get_header(); ?>

		<?php if (have_posts()) : ?>

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

					<?php post_navigation(); ?>

		<?php else : ?>

					<h2>Nothing Found</h2>

		<?php endif; ?>

				</div><!-- .section-content -->
			</section><!-- .blog-posts -->

<?php get_footer(); ?>
