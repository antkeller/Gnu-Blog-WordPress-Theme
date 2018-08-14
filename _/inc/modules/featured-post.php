<?php if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) header('Location: /'); // do not allow stanalone viewing ?>

	<section class="featured-post">
		<div class="featured-post-content">

			<?php
			  $args = array(
	        'posts_per_page' => 1,
	        'meta_key' => 'meta-checkbox',
	        'meta_value' => 'yes'
		    );
		    $featured = new WP_Query($args);

				if ($featured->have_posts()): while($featured->have_posts()): $featured->the_post();
				$imageSmall = (get_field('gnu_blog_featured_post_image_small'));
				$imageLarge = (get_field('gnu_blog_featured_post_image_large'));
			?>
			<a href="<?php the_permalink(); ?>">
				<div class="content-small">
					<img src="<?php echo $imageSmall['url']; ?>" />
				</div>
				<div class="content-large">
					<img src="<?php echo $imageLarge['url']; ?>" />
				</div>
					<h2><?php the_title(); ?></h2>
					<a href="<?php the_permalink() ?>" class="cta">
						<div class="button">
							<span>Read More</span>
						</div>
					</a>
			</a>

	<?php
	endwhile; else:
	endif;
	?>

		</div>
	</section>
