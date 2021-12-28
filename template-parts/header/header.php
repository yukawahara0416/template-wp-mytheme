<?php
// メニューIDを取得します
$menu_name = 'global_nav';
$locations = get_nav_menu_locations();
$menu = wp_get_nav_menu_object($locations[$menu_name]);
// メニュー項目を取得します
$menu_items = wp_get_nav_menu_items($menu->term_id);
?>

<?php if ($menu_items) : ?>
  <div>
    <ul>
      <?php foreach ($menu_items as $item) : ?>
        <li>
          <a href="<?php echo esc_attr($item->url); ?>"><?php echo esc_html($item->title); ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>