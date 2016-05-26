<form role="search" method="get" class="searchform" id="searchform" action="<?php echo home_url( '/' ) ?>" >
	<input class="search input" type="search" value="<?php echo get_search_query() ?>" placeholder="<?php esc_html_e( 'Search...', 'realty' ); ?>" name="s" id="s" />
	<input class="search submit" type="submit" id="searchsubmit" value="<?php esc_html_e( 'Search', 'realty' ); ?>" />
</form>
