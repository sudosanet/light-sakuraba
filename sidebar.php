<div class="sidebar">
  <?php if ( is_active_sidebar( 'sidebar-1' ) ) :
              dynamic_sidebar( 'sidebar-1' );
  else: ?>
  <div class="box">
    <h3>ウィジェットはありません</h3>
  </div>
  <?php endif; ?>
</div>
