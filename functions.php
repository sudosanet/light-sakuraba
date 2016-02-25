<?php
function simplesimple_widgets_init() {
register_sidebar( array(
'name' => 'サイドバーウィジット-1',
'id' => 'sidebar-1',
'description' => 'サイドバーのウィジットエリアです。',
'before_widget' => '<div id="%1$s" class="box %2$s">',
'after_widget' => '</div>',
) );
}
add_action( 'widgets_init', 'simplesimple_widgets_init' );
function add_class_the_tags($html){
    $postid = get_the_ID();
    $html = str_replace('<a','<a class="tag"',$html);
    return $html;
}
add_filter('the_tags','add_class_the_tags',10,1);
function add_class_to_category($html2){
    $postid = get_the_ID();
    $html2 = str_replace('<a','<a class="tag"',$html2);
    return $html2;
}
add_filter('the_category','add_class_to_category',10,3);
add_theme_support('post-thumbnails');
add_theme_support( 'menus' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_editor_style( 'style.css' );
//iframeのレスポンシブ対応
function wrap_iframe_in_div($the_content) {
  if ( is_singular() ) {
    //YouTube動画にラッパーを装着
    $the_content = preg_replace('/<iframe[^>]+?youtube\.com[^<]+?<\/iframe>/is', '<div class="video-container">${0}</div>', $the_content);
  }
  return $the_content;
}
add_filter('the_content','wrap_iframe_in_div');
function _remove_script_version( $src ){
	$parts = explode( '?', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
function custom_editor_settings( $initArray ){
	$initArray['body_class'] = 'post';
	return $initArray;
}
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );
if ( ! isset( $content_width ) ) $content_width = 650;
if ( ! isset( $content_width ) ) {
  $content_width = 1080;
}
register_nav_menu( 'header-navi', 'ヘッダーのナビゲーション' );
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
     <div class="comment-view">
       <?php echo get_avatar($comment,$size='96',$default='<path_to_url>' ); ?>
       <div class="comment-info">
         <h3>&#x1F464;&nbsp;<?php printf(__('%s'),get_comment_author_link()) ?></h3>
         <p>&#x1F553;<?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?> <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">&#x1F4CE;パーマリンク</a> <?php edit_comment_link(__('(&#x270F;編集)'),'  ','') ?></p>
       </div>
       <div class="cf"></div>
       <div class="comment-main">
         <div class="comment-main-text"><?php comment_text() ?></div>
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
       </div>
     </div>
<?php
        }
?>
