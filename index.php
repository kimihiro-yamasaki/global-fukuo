<?php
/**
 * フォールバックテンプレート
 * WordPress はテーマに index.php が必須
 */
get_header(); ?>

  <main class="feed" id="feed">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="brand-row">
        <div class="brand-slides">
          <div class="panel panel--main">
            <div class="panel-overlay" aria-hidden="true"></div>
            <div class="main-content">
              <h2 class="brand-name"><?php the_title(); ?></h2>
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; endif; ?>
  </main>

<?php get_footer(); ?>
