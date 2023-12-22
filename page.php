<?php
//Страница корзины
?>
<?php get_header();?>
   
<main class="main">
    <div class="container">
    <?php if(have_posts()) : while(have_posts()): the_post()?>


    <p><?php the_content();?></p>
    <?php endwhile; else:?>
        Записей нет
    <?php endif;?>
    </div>
</main>

<?php get_footer();?>