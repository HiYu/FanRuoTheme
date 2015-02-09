<form action="<?php bloginfo('url'); ?>/" method="get">
        <input type="text" name="s" id = "s" class = "search_input" value="<?php the_search_query();?>" />
        <input type = "submit" class = "search_submit" value = "搜索"/>
</form>