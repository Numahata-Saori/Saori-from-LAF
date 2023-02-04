<?php
/*
Template Name: works
*/
?>

<?php get_header(); ?>

  <main>
    <div class="mv">
      <div class="mv__img">
        <div class="mv__img__item">
          <img src="<?php echo get_template_directory_uri(); ?>/img/mv/main-book1.jpg" alt="">
        </div>
      </div>

      <div class="mv__text">
        <h1 class="mv__text__concept wow animate__animated animate__fadeInDownBig">
        あなたの一歩をお手伝い<br>あなたに寄り添うWeb製作</h1>
        <p class="mv__text__"></p>
        <img src="<?php echo get_template_directory_uri(); ?>/img/mv/self_a.jpg" alt="">
      </div>

    </div>

    <section class="works sec" id="works">
      <div class="ly-cont">
        <h2 class="sec-title wow animate__animated animate__backInLeft">WORKS</h2>
        <ul class="works-list">
          <?php
          // 仕事を取得
          $args = array(
            'post_type' => 'works', // 投稿タイプ
            // 'tag' => 'おすすめ', // カテゴリをスラッグで指定する場合
            // 'posts_per_page' => 3, // 表示件数
            'orderby' => 'date', // 表示順の基準
            'order' => 'ASC' // 昇順・降順
          );
          // $cat_posts = get_posts( $args );
          // カスタムフィールドを取得
          $cat_posts = new WP_Query($args);

          // print_r($cat_posts);
          // if($cat_posts): foreach($cat_posts as $post): setup_postdata($post);
          ?>

          <!-- workが1件以上存在するかどうか -->
          <?php if($cat_posts->have_posts()) : ?>
            <?php
              // workが存在するだけループ
              while($cat_posts->have_posts()) :
                $cat_posts->the_post();
            ?>

          <!-- ループはじめ -->
          <li class="works-list__item">
            <a class="works-list__item__img" href="<?php echo post_custom('works_url'); ?>"<?php the_permalink() ?>>
              <?php
              // 投稿にサムネイルが設定されている場合は投稿のサムネイルを表示
              if ( has_post_thumbnail() ): the_post_thumbnail();
              // サムネイルが設定されていない場合
              else:
              ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/noimage.png" alt="">
              <?php
              // サムネイルのif文終了
              endif;
              ?>
            </a>
            <p class="works-list__item__name"><?php echo post_custom('works_name'); ?></p>
            <p class="works-list__item__info"><?php echo post_custom('works_info'); ?></p>
          </li>
          <!-- ループおわり -->

          <?php
          // 投稿のループ終了
          endwhile;
          // 投稿の条件分岐を終了
          endif;
          ?>

          <!-- 使用した投稿データをリセット -->
          <?php wp_reset_postdata(); ?>

        </ul>
      </div>
    </section>

    <section class="skills sec" id="skills">
      <div class="ly-cont">
        <h2 class="sec-title wow animate__animated animate__backInRight">SKILLS</h2>
        <div class="skill-list">
          <div class="skill-list__item">
            <p class="skill-list__item__img">
              <img class="skill-icon" src="<?php echo get_template_directory_uri(); ?>/img/skills/html.png" alt="">
            </p>
            <div class="skill-list__item__info">
              <h3 class="skill-list__item__info__name">HTML/CSS</h3>
              <p class="skill-list__item__info__text">スマホで見ても表示崩れのないレスポンシブ対応も可能です。</p>
            </div>
          </div>

          <div class="skill-list__item">
            <p class="skill-list__item__img">
              <img class="skill-icon" src="<?php echo get_template_directory_uri(); ?>/img/skills/js.png" alt="">
            </p>
            <div class="skill-list__item__info">
              <h3 class="skill-list__item__info__name">JavaScript</h3>
              <p class="skill-list__item__info__text">
                お問い合わせフォームや自動スクロールなど動きのあるWebサイトを作る事が可能です。
              </p>
            </div>
          </div>

          <div class="skill-list__item">
            <p class="skill-list__item__img">
              <img class="skill-icon" src="<?php echo get_template_directory_uri(); ?>/img/skills/jquery.png" alt="">
            </p>
            <div class="skill-list__item__info">
              <h3 class="skill-list__item__info__name">jQuery</h3>
              <p class="skill-list__item__info__text">
                Webサイトにフェードイン・フェードアウトなどリッチな動きをつけることが可能です。
              </p>
            </div>
          </div>

          <div class="skill-list__item">
            <p class="skill-list__item__img">
              <img class="skill-icon" src="<?php echo get_template_directory_uri(); ?>/img/skills/php1.png" alt="">
            </p>
            <div class="skill-list__item__info">
              <h3 class="skill-list__item__info__name">PHP</h3>
              <p class="skill-list__item__info__text">
                得意のLaravelフレームワークを駆使してWebアプリを作ります
              </p>
            </div>
          </div>

          <div class="skill-list__item">
            <p class="skill-list__item__img">
              <img class="skill-icon" src="<?php echo get_template_directory_uri(); ?>/img/skills/wordpress.png" alt="">
            </p>
            <div class="skill-list__item__info">
              <h3 class="skill-list__item__info__name">WordPress</h3>
              <p class="skill-list__item__info__text">
                WordPress製の店舗HP・企業HP・メディアサイトなど、Webサイトを0から構築することが可能です。
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="about sec" id="about">
      <div class="ly-cont">
        <h2 class="sec-title wow animate__animated animate__backInLeft">ABOUT</h2>

        <div class="profile">
          <img class="profile__img" src="<?php echo get_template_directory_uri(); ?>/img/about/self1.jpg" alt="">
          <p class="profile__name">沼端 紗央里</p>
        </div>

        <div class="chronology">
          <!-- ここからはすべて the_content()で置き換えるため削除します。 -->
          <?php
          // 仕事を取得
          // $args_us = array( 'post_type' => 'page' );
          // $fixed_posts = new WP_Query($args_us);

          // $args_about = array(
          //   'post_type' => 'page', // 投稿タイプ
          // );
          // $cat_posts_about = new WP_Query($args_about);

          $page_ID = get_page_by_path('about_us');

          $args_about = array(
              'post_parent' => $page_id,
              'post_type' => 'page',
              'order' => 'ASC',
              );
          $posts_about = get_posts($args_about);
          foreach($posts_aboutt as $post_about) {
              $post_id = $post_about->ID;
              $page_id = get_page($post_id);
          };
          ?>

          <?php
            the_content();
          ?>

          <!-- 使用した投稿データをリセット -->
          <?php wp_reset_postdata(); ?>

          <!-- ここまではすべて the_content()で置き換えるため削除します。 -->
        </div>
      </div>
    </section>

    <section class="contact sec">
      <div class="ly-cont">
        <h2 class="sec-title wow animate__animated animate__backInRight">CONTACT</h2>

        <p class="lead">ポートフォリオをご覧いただきありがとうございます。<br>
          どうぞお気軽にご連絡ください。</p>

        <div class="contact-list">
          <p><i class="fa-solid fa-envelope mail-icon"></i>numahata.saori@gmail.com</p>
          <div class="sns-list">
            <a href="#"><i class="fa-brands fa-facebook sns-list__icon"></i></a>
          </div>
        </div>
      </div>
    </section>

    <!-- <div class="pate-top" id="js-page-top">
      <span class="">expand_less</span>
    </div> -->

    <p id="page-top"><a href="#">Top</a></p>

  </main>

<?php get_footer(); ?>
