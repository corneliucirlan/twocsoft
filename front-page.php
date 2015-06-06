<?php get_header() ?>

<!-- CONTENT -->
<section class="row" style="background-color: rgb(251, 246, 243);">
	<article class="col-md-10 col-md-offset-1">
		<?php
			global $post;
			echo $post->post_content;
		?>
	</article>
</section>

<h1 class="frontpage-title"><?php bloginfo() ?></h1>

<!-- SERVICES -->
<h2>SERVICES</h2>

<a href="<?php echo get_permalink(PAGE_SERVICES); ?>">
	<?php for ($row = 1; $row <= 2; $row++): ?>
		<article class="row">
			<?php for ($col = 1; $col <= 3; $col++): ?>
				<div class="homepage-article col-md-4"><?php the_field('box-'.$row.'-'.$col) ?></div>
			<?php endfor; ?>
		</article>
	<?php endfor; ?>
</a>

<?php get_footer() ?>