<?php get_header(); ?>
  <div class="main">
    <?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>
    <div class="content">
        <a href="<?php the_permalink(); ?>">
          <div class="box cf">
            <div class="icon">
            <?php
            if(has_post_thumbnail()){

              /*サムネイルの表示*/
              the_post_thumbnail();

              }else{

              /*代替え画像の表示*/
              echo '<img src="',get_template_directory_uri(),'/noimg.png">';

              }
              ?>
            </div>
            <div class="text">
              <h2><?php the_title(); ?></h2>
              <p><?php the_excerpt(); ?></p>
            </div>
          </div>
        </a>
    </div>
    <?php
    endwhile;
    else : ?>
    <div class="content none">
    <h2>記事はありません</h2>
    <p>お探しの記事は見つかりませんでした。</p>
    </div>
    <?php endif; ?>
    <!--ページャー-->
    <div class="content">
      <div class="pager">
        <div class="box">
        <div class="previous-link"><?php previous_posts_link('←新しい記事へ'); ?></div>
        <div class="next-link"><?php next_posts_link('古い記事へ→'); ?></div>
        </div>
      </div>
    </div>
  </div>
<?php get_sidebar(); ?>
<div class="cf"></div>
</div>
<?php get_footer(); ?>
