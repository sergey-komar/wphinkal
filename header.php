<!DOCTYPE html>
<html lang="<?php language_attributes();?>">
<head>
    <meta charset="<?php bloginfo('charset')?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>
</head>
<body <?php body_class()?>>
<?php wp_body_open()?>

</div>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <a href="/" class="logo">
                    <img src="./img/logo.svg" alt="img">
                </a>

                <nav class="menu">
                    <?php
                        wp_nav_menu([
                            'theme_location' => 'menu_header',
                            'container' => '',
                            'menu_class' => 'menu__list'
                        ] )
                    ?>
                </nav>
               
               
                <div class="header__info">
                    <a href="tel:+74732616465" class="header__info-phone">+7 (473) 261-64-65</a>

                    <a href="<?php echo wc_get_cart_url()?>" class="header__info-basket">
                   
                        <svg width="30" height="20" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.0249 20L13.8999 21.875L17.9624 18.125" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M11.0125 2.5L6.48755 7.0375" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.9875 2.5L23.5125 7.0375" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2.5 9.8125C2.5 7.5 3.7375 7.3125 5.275 7.3125H24.725C26.2625 7.3125 27.5 7.5 27.5 9.8125C27.5 12.5 26.2625 12.3125 24.725 12.3125H5.275C3.7375 12.3125 2.5 12.5 2.5 9.8125Z" stroke="#000" stroke-width="1.5"/>
                            <path d="M4.375 12.5L6.1375 23.3C6.5375 25.725 7.5 27.5 11.075 27.5H18.6125C22.5 27.5 23.075 25.8 23.525 23.45L25.625 12.5" stroke="#000" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                           
                        <span class="badge">
                            <?php echo WC()->cart->get_cart_contents_count();?>
                        </span>
                    </a>
                </div>
               
                <div class="nav-icon">
                    <div class="nav-icon__middle"></div>
                </div>
            </div>
        </div>
    </header>