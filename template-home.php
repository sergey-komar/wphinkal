<?php
/**
 * Template Name: Главная
 */
?>
<?php get_header();?>
    <main class="main">

        <div class="heading">
            <div class="container">
                <div class="heading__inner">
                    <div class="heading__box">
                        <p class="heading__title">Хинкальная</p>
                        <div class="heading__subtitle">ресторан грузинской домашней кухни</div>
                        <p class="heading__text">
                            Частичка гостеприимной Грузии в самом центре города.Блюда грузинской кухни, согревающие напитки 
                            и атмосфера тепла и уюта ждут вас 
                        </p>
                        <div class="heading__wrapper">
                            <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>" class="heading__btn btn">Заказать</a>
                        </div>
                        
                    </div>

                    <div class="heading__null">
                        <img src="./img/heading-img-bg.png" alt="img" class="heading__null-img">
                    </div>
                </div>
               
               
            </div>
        </div>


        <div class="tabs">
            <div class="container">
        
                <div class="catalog-menu">
                    <div class="catalog__menu-click tabs-click">
                        <p class="catalog-menu__title">Меню</p>
                        <p class="catalog-menu__text">Откройте для себя вкус прекрасного</p>
                    </div>
                    

                    <div class="catalog__wrapper tabs__wrapper-menu--open">
                        <div class="catalog-menu__content">

                        <?php
                            $catalog__terms = get_terms([
                                'taxonomy' => 'product_cat',
                                'orderby'     => 'id', // здесь по какому полю сортировать
                                'hide_empty'  => false, // скрывать категории без товаров или нет
                                'parent'      => 0, // id родительской категории
                                                        ]);
                        ?>
                       
                       
                        
                            <?php $woo_categories = get_categories($catalog__terms);//Работает и без этого?>

                            <?php foreach($catalog__terms as $catalog__term) : 
                                $woo_cat_id = $catalog__term->term_id; //category ID
                                $category_thumbnail_id = get_term_meta($woo_cat_id, 'thumbnail_id', true);
                                $thumbnail_image_url = wp_get_attachment_url($category_thumbnail_id);
                                ?>
                            <div class="catalog-menu__item">
                                <a href="<?php echo get_term_link($catalog__term);?>" class="catalog-menu__item-img">
                                    <img src="<?php if(!empty($thumbnail_image_url)){
                                        echo $thumbnail_image_url;
                                    } else{
                                     echo  get_template_directory_uri() . './assets/img/woocommerce-placeholder (1).png';
                                    } ?>" alt="">
                                    <span class="img">
                                </a>
                                <p class="catalog-menu__item-wrapper">
                                    <a href="<?php echo get_term_link($catalog__term);?>" class="catalog-menu__item-title">
                                    <?php echo $catalog__term->name;?>
                                    </a>
                                </p>
                                <p class="catalog-menu__btn-wrapper">
                                    <a href="<?php echo get_term_link($catalog__term);?>" class="catalog-menu__item-btn">К блюдам</a>
                                </p> 
                            </div>
                            
                         <?php endforeach;?>
                            
                       
                        
                     
                        </div>
                    </div>
                </div>
  
                <div class="tabs-delivery">
                    <div class="tabs__delivery-click tabs-click">
                        <p class="tabs-delivery__title">Доставка</p>
                        <p class="tabs-delivery__text">Вам не придеться долго ждать</p>
                    </div>
                   

                    <div class="tabs__wrapper tabs__wrapper-dilivery--open">
                        <div class="tabs-delivery__box">

                            <div class="tabs-delivery__content">
                                <p>
                                    Здесь Вы можете оформить заявку на доставку еды. После чего, мы с вами свяжемся для уточнения доставки 
                                </p>
                                <ul>
                                    <li>Грузинские блюда с доставкой на дом</li>
                                    <li>При заказе доставки еды на сумму от 1400₽ – хачапури по-мегрельски в подарок!</li>
                                    <li>На все заказы с самовывозом дарим скидку 20%</li>
                                    <li>Бесплатная доставка по городу в радиусе 5 км при заказе от 1000₽</li>
                                    <li>Мы работаем каждый день с 11.00 до 21.00</li>
                                    <li>Доставка от 800 р</li>
                                </ul>
                                
                                <div class="heading__wrapper">
                                    <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>" class="tabs-delivery__content-btn btn">Перейти в меню</a>
                                </div>
                                
                            </div>
                            <div class="tabs-delivery__img">
                                <img src="./img/tabs-car.png" alt="img">
                            </div>
                        </div>
                       
                    </div>
                </div>

                <div class="tabs-contact">
                    <div class="tabs__contact-click tabs-click">
                        <p class="tabs-contact__title">Контакты</p>
                        <p class="tabs-contact__text">Вы можете связаться с нами </p>
                    </div>  
                    
                    <div class="tabs-contact__inner tabs-contact__inner--open">
                        <div class="tabs-contact__block">
                            <div class="tabs-contact__box">
                                <div class="tabs-contact__box-title">Хинкальная | Ресторан грузинской домашней кухни</div>
                                <div class="tabs-contact__wrapper">
                                    <div class="tabs-contact__item">
                                        <div class="tabs-contact__item-title">Контакты:</div>
                                        <a href="tel:+74732616465" class="tabs-contact__item-phone">+7 (4732) 61-64-65</a>
                                        <a href="maito:почта@mail.ru" class="tabs-contact__item-mail">почта@mail.ru</a>
                                    </div>
                                    <div class="tabs-contact__item">
                                        <div class="tabs-contact__item-title">Адрес:</div>
                                        <p class="tabs-contact__item-text">улица Дзержинского, 16</p>
                                        <p class="tabs-contact__item-text">с 11.00 до 23.00</p>
                                    </div>
                                    <div class="tabs-contact__item">
                                        <div class="tabs-contact__item-title">Забронировать стол:</div>
                                        <a href="tel:+74732616465" class="tabs-contact__item-phone">+7 (4732) 61-64-65</a>
                                    </div>
                                    <div class="tabs-contact__item">
                                        <div class="tabs-contact__item-title">Мы в сети:</div>
                                        <div class="tabs-contact__social">
                                            <a class="tabs-contact__social-link" href="#">
                                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.95747 0.0465584C4.28142 0.197975 2.78225 0.681536 1.73723 1.73169C0.66779 2.7965 0.208761 4.2423 0.0476121 7.04598C-0.0158707 8.18405 -0.0158707 16.81 0.0476121 17.9481C0.208761 20.7517 0.66779 22.1975 1.73723 23.2624C2.80179 24.3321 4.25701 24.7912 7.07955 24.9524C8.18806 25.0159 16.8119 25.0159 17.9205 24.9524C20.7479 24.7912 22.1933 24.3321 23.2628 23.2624C24.3322 22.1927 24.7912 20.7469 24.9524 17.9188C25.0159 16.81 25.0159 8.18405 24.9524 7.07528C24.7912 4.24719 24.3322 2.80139 23.2628 1.73169C22.1933 0.661999 20.7332 0.197975 17.9205 0.0416737C16.8754 -0.0169411 7.98784 -0.0120564 6.95747 0.0465584ZM6.92817 7.85191C7.27 7.92029 7.38231 8.0766 7.73879 9.00464C8.32967 10.5481 9.2282 12.1844 9.88744 12.9269C10.1804 13.259 10.493 13.4446 10.6834 13.4006C10.9373 13.3469 10.952 13.2443 10.9764 11.6569C11.0057 9.62985 10.9471 9.28794 10.4539 8.64319C10.2195 8.33059 10.1951 8.15475 10.3709 7.97891C10.5369 7.81772 10.7322 7.79818 12.3047 7.81772C13.7697 7.83237 13.8478 7.84703 13.9748 8.06683C14.0236 8.14986 14.0431 8.68227 14.0529 10.2502C14.0627 11.5885 14.0822 12.3749 14.1164 12.4579C14.3264 12.9855 15.1516 12.3407 16.0892 10.9096C16.4945 10.2941 16.978 9.41005 17.2856 8.736C17.7056 7.80795 17.6519 7.83237 19.151 7.83237C20.2498 7.83237 20.3133 7.83726 20.4451 7.93495C20.699 8.12544 20.6502 8.46735 20.2351 9.28306C19.9031 9.94734 19.3561 10.8412 18.5797 11.9939C18.0718 12.7461 17.9693 12.9269 17.9693 13.0783C17.9693 13.3127 18.023 13.386 18.6969 14.0845C20.7283 16.1848 21.3632 17.318 20.6795 17.6062C20.4256 17.7087 18.3892 17.7039 18.1207 17.5964C17.9839 17.5427 17.6568 17.2349 16.9731 16.5267C15.6497 15.1542 15.0686 14.7292 14.5168 14.7243C14.0871 14.7243 14.092 14.7048 14.0627 16.0529C14.0334 17.3571 14.0187 17.4206 13.6818 17.5622C13.4083 17.6794 12.5293 17.7039 11.9628 17.6062C10.1463 17.2887 8.54942 16.1848 7.20651 14.314C6.48867 13.3176 5.71223 12.0086 5.23855 10.9975C4.76487 9.97665 4.34491 8.72623 4.34491 8.31594C4.34491 8.09613 4.52071 7.90076 4.76487 7.8568C5.02857 7.80307 6.66447 7.80307 6.92817 7.85191Z" fill="white"/>
                                                </svg>
                                            </a>
                                            <a class="tabs-contact__social-link" href="#">
                                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.80679 0.0420933C2.50585 0.381577 0.714286 2.01461 0.128806 4.29149L0 4.80657V12.5035V20.2004L0.128806 20.7155C0.655738 22.7699 2.13115 24.2801 4.16862 24.842L4.74239 25H12.4707H20.1991L20.7143 24.8712C22.8162 24.3327 24.3326 22.8168 24.8712 20.7155L25 20.2004V12.5035V4.80657L24.8712 4.29149C24.3384 2.20777 22.8396 0.697647 20.7436 0.141596L20.2576 0.0128269L12.7049 0.00112152C8.54801 -0.00473213 4.99414 0.0128269 4.80679 0.0420933ZM21.2822 2.58822C21.8911 2.76967 22.4532 3.52473 22.4532 4.15687C22.4532 5.05826 21.6686 5.83088 20.7611 5.83088C19.1393 5.82502 18.4778 3.70032 19.8185 2.81064C20.3044 2.48872 20.7318 2.42433 21.2822 2.58822ZM13.8759 4.57244C15.7494 4.90022 17.5585 5.9655 18.7412 7.43464C19.6311 8.53504 20.1639 9.69982 20.4391 11.128C20.5796 11.8479 20.5796 13.1649 20.4333 13.9082C19.8009 17.2563 17.2541 19.8024 13.9052 20.4345C13.1616 20.5809 11.8443 20.5809 11.1241 20.4404C8.92857 20.019 7.18384 18.901 5.88993 17.0807C4.5082 15.1491 4.08665 12.5503 4.77752 10.2032C5.38056 8.16044 6.88525 6.35766 8.80562 5.36847C10.4274 4.53732 12.1253 4.26808 13.8759 4.57244Z" fill="white"/>
                                                    <path d="M11.8268 7.93806C9.98837 8.23072 8.51882 9.54183 8.03872 11.327C7.94505 11.6665 7.91577 11.9475 7.91577 12.5035C7.91577 13.3405 8.03287 13.879 8.34317 14.4995C8.96964 15.7462 9.98837 16.589 11.3116 16.9636C11.9556 17.1451 13.0446 17.1451 13.6886 16.9636C15.3104 16.5071 16.5048 15.3131 16.9614 13.6976C17.1429 13.0479 17.1429 11.965 16.9614 11.3153C16.3994 9.33697 14.7483 8.01415 12.7109 7.91465C12.4181 7.89709 12.02 7.90879 11.8268 7.93806Z" fill="white"/>
                                                    </svg>
                                                    
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabs-contact__null">
                                <img src="./img/tabs-contact-img.png" alt="img" class="tabs-contact__null-img">
                            </div>
                        </div>
                       
                    </div>
               
           
                </div>
            </div>
        </div>



        <div class="book">
            <div class="container">
                <div class="book__inner">
                    <div class="book__null">
                        <img class="book__null-img" src="./img/book-img-bg.jpg" alt="img">
                    </div>
                    <form action="#" class="form">
                        <p class="form__title">Забронировать</p>
                        <div class="form__inner">
                            <div class="form__text">
                                <div>Имя</div>
                                <input type="text" class="form__input" placeholder="Иван" required>
                            </div>
                            <div class="form__text">
                                <div>Телефон</div>
                                <input type="tel" class="form__input" id="input-mask1" placeholder="+7 (900) 000 00 00" required>
                            </div>
                        </div>
                       
                        <div class="form__box">
                            <div class="form__wrapper">
                                <div class="form__text form__text--time">
                                    <div>Дата посещения</div>
                                    <input type="date" class="form__input" placeholder="01.01.01" required>
                                </div>
                                <div class="form__text form__text--time">
                                    <div>Время посещения</div>
                                    <input type="time" class="form__input" placeholder="13:00" required>
                                </div>
                            </div>
                           
                            <div class="form__text form__text--number">
                                <div>Выберите кол-во человек</div>
                                <input type="number" class="form__input form__input--number" placeholder="2" required>
                            </div>
                        </div>
                       

                        <label class="form__label">
                            <input type="checkbox"  class="form__input-checkbox">
                            <span class="form__label-checkbox"></span>
                            <p class="form__text-checbox">Я соглашаюсь с условиями обработки <span>персональных данных</span></p>
                        </label>
                        
                       
                        <div class="heading__wrapper">
                            <button class="form__btn btn">Забронировать</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>

        <div class="stock">
            <div class="container">
                <div class="stock__inner">
                    <div class="stock-block">
                        <p class="stock-block__title">Акции</p>
                        <div class="stock-block__item">

                            <p> Дорогие друзья!</p>
                            <p>
                                С понедельника по пятницу с 12.00-15.00 вы можете быстро и по-домашнему отобедать в нашем гостеприимном доме «Хинкальная» по привлекательным ценам 
                            </p>
                        </div>

                        <div class="stock-block__item stock-block__item--bottom">
                            <p>Салат + первое =235руб</p>
                            <p> Салат + второе =295руб</p>
                            <p>Салат + первое + второе =395руб</p>
                        </div>
                        <div class="heading__wrapper">
                            <a href="#" class="stock-block__btn btn">Все акции</a>
                        </div>
                        
                    </div>
                    <div class="stock__null">
                        <img class="stock__null-img" src="./img/stok-img-bg.png" alt="img">
                    </div>
                </div>
            </div>
        </div>

        <div class="content-hide">
            <div class="container">
                <div class="content-hide__box">
                    <h1>Lorem ipsum</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis illo exercitationem atque laudantium eum sapiente provident tenetur enim, adipisci fugiat maxime dicta omnis incidunt dolorem quo pariatur a, doloremque mollitia!
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis illo exercitationem atque laudantium eum sapiente provident tenetur enim, adipisci fugiat maxime dicta omnis incidunt dolorem quo pariatur a, doloremque mollitia!
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis illo exercitationem atque laudantium eum sapiente provident tenetur enim, adipisci fugiat maxime dicta omnis incidunt dolorem quo pariatur a, doloremque mollitia!
                    </p>
                    <h2>Dolor sit</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis illo exercitationem atque laudantium eum sapiente provident tenetur enim, adipisci fugiat maxime dicta omnis incidunt dolorem quo pariatur a, doloremque mollitia!
                    </p>

                    <ol>
                        <li>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit mollitia, nisi inventore deserunt molestias expedita ipsa eius ad voluptatem nemo suscipit facere doloribus et itaque dolore beatae, dicta non necessitatibus!
                        </li>
                        <li>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit mollitia, nisi inventore deserunt molestias expedita ipsa eius ad voluptatem nemo suscipit facere doloribus et itaque dolore beatae, dicta non necessitatibus!
                        </li>
                        <li>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit mollitia, nisi inventore deserunt molestias expedita ipsa eius ad voluptatem nemo suscipit facere doloribus et itaque dolore beatae, dicta non necessitatibus!
                        </li>
                    </ol>
                    <h3>Amet consectetur</h3>
                    <ul>
                        <li>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit mollitia, nisi inventore deserunt molestias expedita ipsa eius ad voluptatem nemo suscipit facere doloribus et itaque dolore beatae, dicta non necessitatibus!
                        </li>
                        <li>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit mollitia, nisi inventore deserunt molestias expedita ipsa eius ad voluptatem nemo suscipit facere doloribus et itaque dolore beatae, dicta non necessitatibus!
                        </li>
                        <li>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit mollitia, nisi inventore deserunt molestias expedita ipsa eius ad voluptatem nemo suscipit facere doloribus et itaque dolore beatae, dicta non necessitatibus!
                        </li>
                    </ul>
                    <h4>Odit mollitia</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis illo exercitationem atque laudantium eum sapiente provident tenetur enim, adipisci fugiat maxime dicta omnis incidunt dolorem quo pariatur a, doloremque mollitia!
                    </p>
                </div>
                
            </div>
        </div>
        
    <?php wp_footer();?>
    </main>
<?php get_footer();?>