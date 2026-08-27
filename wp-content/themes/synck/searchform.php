<div class="blog-2-sidebar-widget search-widget">
    <form class="search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <div class="input-group">
        <input type='text' name="s" placeholder="<?php esc_attr_e( 'Search Here...', 'synck' )?>"  value="<?php the_search_query(); ?>">                   
        <button class="theme-btn" type="submit"><?php esc_html_e ('Search','synck' ); ?></button>
        </div>
    </form>
</div>


