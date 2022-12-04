<?php
    get_header();    
?>
<h1>Бронь комнат</h1>

<div class="room__box">
    <?php
        // параметры по умолчанию
        $my_posts = get_posts( array(
            'numberposts' => 5,
            'category'    => 0,
            'orderby'     => 'date',
            'order'       => 'DESC',
            'include'     => array(),
            'exclude'     => array(),
            'meta_key'    => '',
            'meta_value'  =>'',
            'post_type'   => 'post',
            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        ) );

        global $post;

        foreach( $my_posts as $post ){
            setup_postdata( $post );
            ?>
                <div class="room__item" style="border: 1px solid red; margin: 30px;">
                    <div class="room__item-title">
                        <?php the_title(); ?>
                    </div>
                    <div class="room__item-order">
                        <form method="POST" action="../../../wp-content/plugins/cozy-booking/includes/class-client-order.php" class="order">
                            <input hidden type="text" class="order__input" name="room-number" value="<?php the_field('room_number'); ?>">
                            <input type="text" class="order__input" name="user_name" placeholder="Введите ваше имя">
                            <input type="text" class="order__input" name="user_howmuch" placeholder="Насколько хотите снять">
                            <input type="submit">
                        </form>
                    </div>
                </div>
        <?php }

        wp_reset_postdata(); // сброс
    ?>
</div>






<?php get_footer(); ?>