<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package facontech
 */

get_header();

$blog_column = is_active_sidebar('blog-sidebar') ? 8 : 12;

?>

<div class="blog-section blog-list one">
	<div class="container ">
		<div class="row">
			<div class="col-lg-<?php print esc_attr($blog_column); ?> ">
				<div class="blog-items">
					<?php
					if (have_posts()):
						?>
						<div class="result-bar page-header d-none">
							<h1 class="page-title">
								<?php esc_html_e('Search Results For:', 'facontech'); ?>
								<?php print get_search_query(); ?>
							</h1>
						</div>
						<?php
						while (have_posts()):
							the_post();
							get_template_part('template-parts/content', 'search');
						endwhile;
						?>
						<div class="basic-pagination basic-pagination-2 mb-40">
							<?php facontech_pagination('<i class="fas fa-angle-double-left"></i>', '<i class="fas fa-angle-double-right"></i>', '', ['class' => '']); ?>
						</div>
						<?php
					else:
						get_template_part('template-parts/content', 'none');
					endif;
					?>
				</div>
			</div>
			<?php if (is_active_sidebar('blog-sidebar')): ?>
				<div class="col-lg-4">
					<div class="blog__sidebar pl-70">
						<?php get_sidebar(); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php
get_footer();
