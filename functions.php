<?php
function register_my_menus() {
  register_nav_menus(array(
    'main-menu' => __('Menú Principal'),
  ));
}
add_action('init', 'register_my_menus');
?>