<!--参考にした：http://nelog.jp/wordpress-customize-related-entries-->
<?php
//カテゴリ情報から関連記事を10個ランダムに呼び出す
$categories = get_the_category($post->ID);
$category_ID = array();
foreach($categories as $category):
  array_push( $category_ID, $category -> cat_ID);
endforeach ;
$args = array(
  'post__not_in' => array($post -> ID),
  'posts_per_page'=> 3,
  'category__in' => $category_ID,
  'orderby' => 'rand',
);
$query = new WP_Query($args); ?>
  <?php if( $query -> have_posts() ): ?>
  <?php while ($query -> have_posts()) : $query -> the_post(); ?>
        <li>
          <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
          <p><?php echo get_the_date(); ?></p>
        </li>
  <?php endwhile;?>
  
  <?php else:?>
    <li>関連項目はありません</li>
  <?php
endif;
wp_reset_postdata();
?>
