<?php get_header(); ?>
<div class="main">
  <div class="main-column">
    <?php if (have_posts()) : // WordPress ループ
    while (have_posts()) : the_post();?>
    <h2><?php echo get_the_title(); ?></h2>
    <hr>
    <h4>&#x1F464;&nbsp;<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>&nbsp;&#x1F4C6;&nbsp;<?php echo get_the_date(); ?>&nbsp;&#128221;&nbsp;<?php comments_popup_link('0', '1', '%'); ?></h4>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php the_content(); ?>
      <?php $args = array(
      'before' => '<div class="page-link">',
      'after' => '</div>',
      'link_before' => '<span class="page-link-text">',
      'link_after' => '</span>',
      );
      wp_link_pages($args); ?>
    </div>
    <div class="n700"><h3>共有</h3></div>
    <div class="share">
        <a class="twitter" href="https://twitter.com/intent/tweet?url=<?php echo("http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]); ?>&text=<?php echo get_the_title(); ?>" target="_blank">Twitter</a>
        <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo("http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]); ?>" target="_blank">Facebook</a>
        <a class="line" href="http://line.me/R/msg/text/?<?php echo get_the_title(); ?>%20<?php echo("http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]); ?>">LINE</a>
    </div>
    <?php
    endwhile;
    else : ?>
    <h2>記事はありません</h2>
    <p>お探しの記事は見つかりませんでした。</p>
    </div>
    <?php endif; // WordPress ループ終了 ?>
  </div>
</div>
<?php get_sidebar(); ?>
<div class="cf"></div>
</div>
<?php get_footer(); ?>
