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

  // $post = $wp_query->post;
  // if ( in_category('test') ) {
	//   include(TEMPLATEPATH.'/single-test.php');
  // } elseif ( in_category('xxx') ) {
	//   include(TEMPLATEPATH.'/single2.php');
  // } else {
	//   include(TEMPLATEPATH.'/single-default.php');
  // }

// if (in_category('test')) { //カテゴリスラッグ slag1
//    include(TEMPLATEPATH . '/single-test.php');
// }
// else { //他のカテゴリの投稿
//    include(TEMPLATEPATH . '/single-default.php');
// }

?>
