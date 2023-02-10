<?php

// https://tanweb.net/2019/09/11/28539/
//本文からnoopenerを残してnoreferrerだけ取り除く
function remove_noopener_and_noreferrer_demo($the_content){
$the_content = str_replace(' rel="nofollow noopener noreferrer"', ' rel="nofollow noopener"', $the_content);
$the_content = str_replace(' rel="noopener noreferrer"', ' rel="noopener"', $the_content);
return $the_content;
}
add_filter('the_content', 'remove_noopener_and_noreferrer_demo', 9999);



add_theme_support( 'post-thumbnails' );


/* ---------- カスタム投稿タイプを追加 ---------- */
add_action( 'init', 'create_post_type' );

function create_post_type() {

  register_post_type(
    'works',
    array(
      'label' => '仕事',
      'public' => true,/*このカスタム投稿タイプを管理画面上に表示するかどうかの設定*/
      // 'has_archive' => true,/*カスタム投稿タイプのアーカイブページ（一覧ページ）を作成したい場合の設定。*/
      'show_in_rest' => true,
      'supports' => array(
        'thumbnail',
        'works_name',
        'works_info'
      ),
    )
  );
}

/* 投稿と固定ページ一覧にスラッグの列を追加 */
function add_posts_columns_slug($columns) {
  $columns['slug'] = 'スラッグ';
  echo '';
  return $columns;
}
add_filter( 'manage_posts_columns', 'add_posts_columns_slug' );
add_filter( 'manage_pages_columns', 'add_posts_columns_slug' );

/* スラッグを表示 */
function custom_posts_columns_slug($column_name, $post_id) {
  if( $column_name == 'slug' ) {
      $post = get_post($post_id);
      $slug = $post->post_name;
      echo esc_attr($slug);
  }
}
add_action( 'manage_posts_custom_column', 'custom_posts_columns_slug', 10, 2 );
add_action( 'manage_pages_custom_column', 'custom_posts_columns_slug', 10, 2 );


/**
 * Get a page object by slug.
 * https://codex.wordpress.org/Template_Tags/get_posts
 */
function wc_get_page_by_slug( $slug = '' ) {
  $pages = get_posts(
      array(
        'post_type'      => 'page',
        'name'           => $slug,
        'posts_per_page' => 1
      )
  );
  return $pages ? $pages[0] : false;
}


//timelineショートコードコンテンツ内に余計な改行や文字列が入らないように除外
if ( !function_exists( 'remove_wrap_shortcode_wpautop' ) ):
function remove_wrap_shortcode_wpautop($shortcode, $content){
  //tiショートコードのみを抽出
  $pattern = '/\['.$shortcode.'.*?\].*?\[\/'.$shortcode.'\]/is';
  if (preg_match_all($pattern, $content, $m)) {
    $all = null;
    foreach ($m[0] as $code) {
      $all .= $code;
    }
    return $all;
  }
}
endif;

//タイムラインの作成（timelineショートコード）
add_shortcode('timeline', 'timeline_shortcode');
if ( !function_exists( 'timeline_shortcode' ) ):
function timeline_shortcode( $atts, $content = null ){
  extract( shortcode_atts( array(
    'title' => null,
  ), $atts ) );
  $content = remove_wrap_shortcode_wpautop('ti', $content);
  $content = do_shortcode( shortcode_unautop( $content ) );
  $title_tag = null;
  if ($title) {
    $title_tag = '<div class="timeline-title">'.$title.'</div>';
  }
  $tag = '<div class="timeline-box">'.
            $title_tag.
            '<ul class="timeline">'.
              $content.
            '</ul>'.
          '</div>';
  return apply_filters('timeline_tag', $tag);
}
endif;

//タイムラインアイテム作成（タイムラインの中の項目）
add_shortcode('ti', 'timeline_item_shortcode');
if ( !function_exists( 'timeline_item_shortcode' ) ):
function timeline_item_shortcode( $atts, $content = null ){
  extract( shortcode_atts( array(
    'title' => null,
    'label' => null,
  ), $atts ) );
  $title_tag = null;
  if ($title) {
    $title_tag = '<div class="timeline-item-title">'.$title.'</div>';
  }

  $content = do_shortcode( shortcode_unautop( $content ) );
  $tag = '<li class="timeline-item">'.
            '<div class="timeline-item-label">'.$label.'</div>'.
            '<div class="timeline-item-content">'.
              '<div class="timeline-item-title">'.$title.'</div>'.
              '<div class="timeline-item-snippet">'.$content.'</div>'.
            '</div>'.
          '</li>';
  return apply_filters('timeline_item_tag', $tag);
}
endif;
