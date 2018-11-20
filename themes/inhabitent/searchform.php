<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
			<span class="icon-search part-404" aria-hidden="true">
				<i class="fa fa-search"></i>
			</span>
		<button class="search-submit part-404">
			<span class="screen-reader-text"><?php echo esc_html( 'Search' ); ?></span>
		</button>
		<label>
			<input type="search" class="search-field" placeholder="Type and Press Enter" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="Search for:" />
		</label>
</form>
