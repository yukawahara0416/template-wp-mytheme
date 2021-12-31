<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<meta name="robots" content="<?php echo _get_robots(); ?>">
<meta name="description" content="<?php echo _get_meta('description', 100); ?>">
<meta name="keywords" content="">

<!-- Facebook -->
<meta property="og:title" content="<?php echo _get_meta('title'); ?>">
<meta property="og:description" content="<?php echo _get_meta('description', 100); ?>">
<meta property="og:type" content="<?php echo _get_meta('type'); ?>">
<meta property="og:url" content="<?php echo _get_meta('url'); ?>">
<meta property="og:image" content="<?php echo _get_meta('image'); ?>">
<meta property="og:site_name" content="<?php echo _get_meta('title'); ?>">
<meta property="og:locale" content="ja_JP">
<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:domain" content="<?php echo _get_meta('url'); ?>">
<meta name="twitter:title" content="<?php echo _get_meta('title'); ?>">
<meta name="twitter:description" content="<?php echo _get_meta('description', 100); ?>">
<meta name="twitter:image" content="<?php echo _get_meta('image'); ?>">

<!-- wp_head -->
<?php wp_head(); ?>

<!-- script/cssファイルの読み込み -->