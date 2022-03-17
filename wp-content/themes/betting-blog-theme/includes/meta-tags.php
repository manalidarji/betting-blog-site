<?php 

add_action('wp_head', 'add_social_tags');
function add_social_tags() {
    if (is_single()) {
    global $post;

    // get the featured image
    if(get_the_post_thumbnail($post->ID, 'thumbnail')) {
    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),array(300,300));
    }
    $description = meta_get_the_excerpt($post->ID);
    $type = $post->post_type;
    if($type == 'post') {
    // if you want to share post content as an article
    $type = 'article';
    }

    // set the meta tags which will be read by Social Media sites
    if(!empty($image[0])) {
    ?>
    <meta property="og:image" content="<?php echo $image[0]; ?>" />
    <meta itemprop="image" content="<?php echo $image[0]; ?>">
    <meta name="twitter:image" content="<?php echo $image[0]; ?>">
    <?php } ?>
    <meta property="og:title" content="<?php the_title(); ?>" />
    <meta property="og:type" content="<?php echo $type; ?>" />
    <meta property="og:url" content="<?php the_permalink(); ?>" />
    <meta property="og:description" content="<?php echo $description ?>" />
    <meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
    <meta itemprop="name" content="<?php the_title(); ?>">
    <meta itemprop="description" content="<?php echo $description ?>">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="<?php echo get_bloginfo('name'); ?>" />
    <meta name="twitter:title" content="<?php the_title(); ?>" />
    <meta name="twitter:description" content="<?php echo $description ?>" />
    <?php } else { ?>
    <meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php the_title(); ?>" />
    <meta property="og:url" content="<?php the_permalink(); ?>" />
    <meta property="og:description" content="The Raiseyourstakes.co.uk team is fully aware of how overwhelming all the news, information and social media posts can be. Yet we are bombarded by them every single day on every platform we expose ourselves to – mobile, tablet, computer. That’s why Raiseyourstakes.co.uk is dedicated to demystifying, structuring and simply educating our readers." />
    <meta property="og:image" content="<?php bloginfo('template_url')?>/assets/img/logo.png" />
    <meta itemprop="name" content="<?php the_title(); ?>">
    <meta itemprop="description" content="The Raiseyourstakes.co.uk team is fully aware of how overwhelming all the news, information and social media posts can be. Yet we are bombarded by them every single day on every platform we expose ourselves to – mobile, tablet, computer. That’s why Raiseyourstakes.co.uk is dedicated to demystifying, structuring and simply educating our readers.">
    <meta itemprop="image" content="<?php echo $image[0]; ?>">
    <meta name="twitter:site" content="<?php echo get_bloginfo('name'); ?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="<?php the_title(); ?>" />
    <meta name="twitter:description" content="The Raiseyourstakes.co.uk team is fully aware of how overwhelming all the news, information and social media posts can be. Yet we are bombarded by them every single day on every platform we expose ourselves to – mobile, tablet, computer. That’s why Raiseyourstakes.co.uk is dedicated to demystifying, structuring and simply educating our readers." />
    <meta name="twitter:image" content="<?php echo $image[0]; ?>">
    <?php } 
}

function meta_get_the_excerpt($post_id) {
    global $post;
    $save_post = $post;
    $post = get_post($post_id);
    setup_postdata( $post );
    $output = get_the_excerpt();
    $output = str_replace('[&hellip;]', '', $output);
    $post = $save_post;
    return $output;
}