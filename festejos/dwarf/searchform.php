<?php
	/**
	*	Template to customize the default search form
	*
	* @package Dwarf Theme
	* @since Dwarf Theme 1.0
	*/
 ?>
<form role="search" method="get" class="search-form" id="search_form" action="<?php echo home_url( '/' ); ?>">
  	<label id="search_field">
  			<span class="screen-reader-text sr-only">Search for:</span>
  			<input type="search" class="search-field form-control input-lg rounded-0" placeholder="<?php _e( 'Hit enter to make a search', 'dwarf-theme' ); ?>" value="" name="s" title="<?php _e( 'Search for:', 'dwarf-theme' ); ?>" />
  	</label>
</form>
