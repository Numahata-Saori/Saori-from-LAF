<?php

// 記事の文章
the_content();

// ページネーション
wp_link_pages(
  array(
    "before" => "<nav class='page-links'>",
    "after" => "</nav>",
    "next_or_number" => "number",
  )
);

?>
