<?php get_header(); ?>
<div class="row">
  <div class="col-sm-8 blog-main">

    <?php if(have_posts() ) : ?> <!-- if there are any posts -->
        <?php while(have_posts() ) :
            the_post(); ?> <!-- while there are posts, show the posts -->
        
        <div class="blog-post">

            <h2 class="blog-post-title">
                <a href="<?php the_permalink(); ?>">
                    <!-- retrieves URL for the permalink-->
                    <?php the_title(); ?></h2></a>

                <p class="blog-post-meta">
                    <?php the_time('F j, Y g:i a'); ?>
                    <!-- retrieves date blog entry was created -->
                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                        <?php the_author(); ?></a>
                        <!-- retrieves author of blog entry-->
                </p>

                <?php the_content(); ?> <!-- rtrieves the content-->
                
                <?php if(has_post_thumbnail()) : ?><!-- include support fpr the featured image in blog post -->
                <?php the_post_thumbnail(); ?>
                <?php endif; ?>

        <?php  endwhile; ?> <!-- end the while loop -->

       <?php else : ?> <!-- if there are no posts -->
            <p> <?php echo ('No posts Found'); ?>
        <?php endif; ?> <!-- end if -->
     
    
        </div> <!-- blog-post -->
        
        
</div> <!-- blog main -->

<?php get_sidebar(); ?>



       </div><!-- /.row -->

</div><!-- /.container -->

<?php get_footer(); ?>