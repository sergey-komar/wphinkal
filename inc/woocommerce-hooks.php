<?php
// ОТКЛЮЧАЕМ ВСЕ СТИЛИ woocommerce
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );



remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);

//ОТКЛЮЧАЕМ ХЛЕБНЫЕ КРОШКИ НА СТРАНИЦЕ МАГАЗИНА
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

//ОТКЛЮЧАЕМ САЙДБАР НА СТРАНИЦЕ МАГАЗИНА
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

//

//ОТКЛЮЧАЕМ РАСПРОДАЖА НА СТРАНИЦЕ МАГАЗИНА В КАРТОЧКЕ ТОВАРА
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);

//ОТКЛЮЧАЕМ ОБЁРТКУ ТЕГ А КАРТОЧКУ ТОВАРА НА СТРАНИЦЕ МАГАЗИНА  
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

//

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', function(){
    global $product;
    echo '<a href="'. get_permalink(). '"class="catalog-menu__item-title">' . $product->name . '</a>';
}, 10);


// ДИНАМИЧСКОЕ ОБНОВОЕНИЕ СЧЁТЧИКА ТОВАРОВ В ИКОНКЕ КОРЗИНЫ ЧЕРЕЗ ajax
add_filter('woocommerce_add_to_cart_fragments', function($fragments) {

    $fragments['.badge'] =                                                                          '<span class="badge">' . WC()->cart->get_cart_contents_count() . '</span>';
        
    return $fragments;
    });


    



//УБИРАЕМ ЛИШНИЕ ПОЛЯ
add_filter( 'woocommerce_checkout_fields', 'wpbl_remove_some_fields', 9999 );
 
function wpbl_remove_some_fields( $array ) {
    //unset( $array['billing']['billing_first_name'] ); // Имя
    //unset( $array['billing']['billing_last_name'] ); // Фамилия
    //unset( $array['billing']['billing_email'] ); // Email
    //unset( $array['order']['order_comments'] ); // Примечание к заказу
    // unset( $array['billing']['billing_phone'] ); // Телефон
    // unset( $array['billing']['billing_address_1'] ); // 1-ая строка адреса 
      // unset( $array['billing']['billing_company'] ); // Компания
      // unset( $array['billing']['billing_city'] ); // Населённый пункт

    unset( $array['billing']['billing_address_2'] ); // 2-ая строка адреса 

    unset( $array['billing']['billing_country'] ); // Страна
   
    unset( $array['billing']['billing_state'] ); // Область / район
    // unset( $array['billing']['billing_postcode'] ); // Почтовый индекс
     
    // Возвращаем обработанный массив
    return $array; 
    
}
 

//МЕНЯЕМ МЕСТАМИ ПОЛЯ В ОФОРМЛЕНИЕ ЗАКАЗА
add_filter( 'woocommerce_checkout_fields', 'wplb_email_first' );
 
function wplb_email_first( $array ) {
    
    // Меняем приоритет
    $array['billing']['billing_email']['priority'] = 50;
    $array['billing']['billing_phone']['priority'] = 60;
    $array['billing']['billing_address_1']['priority'] = 20;


    //МЕНЯЕМ  label placeholder
    $array['billing']['billing_address_1']['placeholder'] = '';
    $array['billing']['billing_company']['label'] = 'Комментарий';
    $array['billing']['billing_city']['label'] = 'Этаж';
    $array['billing']['billing_postcode']['label'] = 'Номер квартиры';
    
    // Возвращаем обработанный массив
    return $array;

    
}



 
