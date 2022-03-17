<?php
	if( did_action( 'get_footer' ) ){
		$html = 'footer';
	}else{
		$html = 'header';
	}
?>

<form role="search" method="get" class="searchform searchform-<?php echo $html ?>" action="<?php echo home_url('/'); ?>">
    <input class="search-input search-input-<?php echo $html ?> tran" type="text" value="" name="s" placeholder="SEARCH" autocomplete='off' />
    <input class="submit" type="submit" name="submit" value="">
    <input type="hidden" name="post_type" value="post" />
</form>