<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage GNU-Blog-WordPress-Theme
 * @since GNU Blog WordPress Theme 1.0.0
 */
 get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post();
				// get the main parent category
				$category = get_the_category();
				$catTree = get_category_parents($category[0]->term_id, true, '!', true);
				$topCat = preg_split('/!/', $catTree);
				$mainCategory = $topCat[0];
	?>

    <section class="blog-post container-fluid">
      <div class="section-content row">
        <div class="content-wrapper col-xs-12">

      		<article <?php post_class('blog-post-details') ?> id="post-<?php the_ID(); ?>" itemscope="" itemtype="http://schema.org/BlogPosting">
            <div class="post-wrapper">
              <div class="entry-header">
          			<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
                <p class="entry-meta">
            			<time datetime="<?php the_time('c') ?>"><span itemprop="datePublished"><?php the_time('F jS, Y') ?></span></time>
                </p>
                <div class="addthis_inline_share_toolbox"></div>
              </div><!-- .entry-header -->
        			<div class="entry-content" itemprop="articleBody">

        				<?php the_content(); ?>

        				<div class="clearfix"></div>
        			</div>
        			<div class="post-categories">Categories | <?php the_category(', ') ?></div>
            </div><!-- .post-content -->
      		</article>

    			<?php comments_template(); ?>

        </div><!-- .content-wrapper -->
      </div><!-- .row -->
    </section>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
