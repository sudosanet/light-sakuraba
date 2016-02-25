<?php if( have_comments() ): // コメントがあったら ?>
<?php wp_list_comments('callback=mytheme_comment'); ?>
<div class="page-link">
<?php paginate_comments_links(); ?>
</div>
<?php endif; ?>
