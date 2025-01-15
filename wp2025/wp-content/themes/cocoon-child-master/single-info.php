<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary" <?php //astra_primary_class(); ?>>

		<?php //astra_primary_content_top(); ?>

		<?php while ( have_posts() ) : the_post(); ?>

		<article class="blog type-blog status-publish hentry ast-article-single" itemtype="https://schema.org/CreativeWork" itemscope="itemscope">

				
			<div class="ast-post-format- ast-no-thumb single-layout-1">

				
				<header class="entry-header ast-no-thumbnail ast-no-meta">

					<div class="ast-single-post-order">
						<h1 class="entry-title" itemprop="headline"><?php echo get_the_title(); ?></h1>
					</div>

					<div class="entry-meta">
						<span class="posted-on">
							<span class="published" itemprop="datePublished"> <?php echo get_the_date( 'Y年n月j日' ); ?></span> / 
							<?php
							$terms = get_the_terms($post->ID,'blog-category');
							if( $terms ) {
								foreach( $terms as $term ){
									//echo ' <span class="cat-links"><a href="'.get_term_link($term).'">'.esc_html($term->name).'</a></span>';
								}
							}
							?>
						</span>
					</div>
					
				</header><!-- .entry-header -->

				
				<div class="entry-content clear" itemprop="text">
					<?php echo get_the_content( $more_link_text = null, $strip_teaser = false ); ?>
				</div><!-- .entry-content .clear -->
			</div>
			
		</article>

		<?php endwhile;?>

		<nav class="navigation post-navigation" role="navigation" aria-label="投稿">
			<h2 class="screen-reader-text">投稿ナビゲーション</h2>
			<div class="nav-links">
				<div class="nav-previous">
					<?php previous_post_link('%link', '<span class="ast-left-arrow">←</span>前の投稿'); ?>
				</div>
				<div class="nav-next">
					<?php next_post_link('%link', '次の投稿 <span class="ast-right-arrow">→</span>'); ?>
				</div>
			</div>
		</nav>

		<?php //astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
