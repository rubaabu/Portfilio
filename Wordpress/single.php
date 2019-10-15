<?php get_header(); ?>
<div class="col-sm-8 blog-main">
    <?php if(have_posts()) : ?>

        <?php while(have_posts()) : the_post(); ?>
        
        <div class="blog-post">
        <h2 class="blog-post-title">
        <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?> 
        </h2> </a>

        <p class="blog-post-meta">
                    <?php the_time('F j, Y g:i a'); ?>
                    <!-- retrieves date blog entry was created -->
                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                        <?php the_author(); ?></a>
                        <!-- retrieves author of blog entry-->
                </p>
                <?php the_content(); ?> <!-- rtrieves the content-->
                <?php comments_template(); ?> <!-- show the comments, if there are any -->
                <?php endwhile; ?> <!--end the while loop-->

    <?php else : ?> <!--if there are no posts-->
    <p><?php echo 'No Posts Found'; ?></p>
    <?php endif; ?><!--endif-->

        </div><!-- blog post-->

</div>