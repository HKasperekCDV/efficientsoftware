<?php
/**
* page-o-nas.php – szablon tylko dla strony o slugu "o-nas".
* Hierarchia: page-o-nas.php (child) -> page.php (rodzic) -> index.php
*/
get_header();

while ( have_posts() ) :
    the_post();
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'mf-o-nas' ); ?>>
        <header class="entry-header alignwide">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <p class="mf-lead"><?php echo esc_html( get_the_excerpt() ); ?></p>
        </header>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
       <p class="mf-dane-firmy"><?php esc_html_e('Efficient Software sp. z o.o., kontakt@example.com', 'mf-child') ?></p>
    </article>
    <?php
endwhile;

get_footer();
