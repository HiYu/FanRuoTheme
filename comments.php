
<div class = "comment_area">
    <?php  
        if(comments_open())
        {
            if (have_comments())
            {
                wp_list_comments( array(
                            'style'       => 'ol',
                            'short_ping'  => true,
                            'avatar_size' => 56,
                        ) );
            }
            
            comment_form($defaults);
        }
    ?>
</div>