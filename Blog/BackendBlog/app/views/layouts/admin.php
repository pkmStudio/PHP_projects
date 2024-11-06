<!DOCTYPE html>
<html lang="en">

<head>
   <!-- тип документа и кодировка. как обработать -->
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <!-- область просмотра - мобильная отзывчивость. Физическая ширина устройства(отл для мобил), макс. масштаб, масштабируется пользователем -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
   <meta name="author" content="pmkStudio Ed" />
   <!-- описание(150 символов). для поисковых систем - сниппет поисковой выдачи. Также SEO. -->
   <meta name="description" content="Блог о том, какие мысли посещают будущего программиста" />
   <!-- для поисковых систем. указания ключевых слов на странице -->
   <meta name="keywords" content="Блог, pmkStudio, blog, fullstack, development, roadmap" />
   <!-- для поисковых роботов. индексировать страницы, отношения к ссылкам на странице(проиндексирована, перейти по ссылкам) -->
   <meta name="robots" content="index,follow" />
   <!-- иконка -->
   <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
   <!-- подключение стилей CSS -->
   <link rel="stylesheet" href="/public/src/css/style.min.css" />
   <!-- названия страницы. для поисковых систем. названия закладки -->
   <title><?= $title; ?></title>
</head>

<body>
   <div class="wrapper">
      
      <header class="header">
         <div class="header__container _container">
            <div class="header__body">
               <div class="header__menu menu">
                  <!-- Меню Бургер -->
                  <button class="menu__icon icon-menu" type="button">
                     <span></span>
                     <span></span>
                     <span></span>
                  </button>
                  <!-- Навигация меню -->
                  <nav class="menu__body">
                     <ul class="menu__list">
                        <li class="menu__item"><a class="menu__link menu__link--active" href="/">Главная</a></li>
                        <li class="menu__item"><a class="menu__link" href="/blog">Блог</a></li>
                        <li class="menu__item"><a class="menu__link" href="/works">Работы</a></li>
                        <li class="menu__item"><a class="menu__link" href="/about">Про меня</a></li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
      </header>
      <div class="page admin">
         
         <div class="_container _admin">
            <?php if(isset($_SESSION['authorize']['who']) && $_SESSION['authorize']['who'] == 'admin'): ?>
            <aside class="aside">
               <div class="aside__header">
                  <h3 class="aside__title title">Панель админа</h3>
               </div>
               <div class="aside__body">
                  <div class="aside__item">
                     <h4 class="aside__item-name sub-title">Посты</h4>
                     <a class="aside__button button" href="addpost" data-title="Какая-то подсказка при всплытии ">Добавить</a>
                     <a class="aside__button button" href="/" data-title="Добавить Работу">Найти</a>
                  </div>
                  <div class="aside__item">
                     <h4 class="aside__item-name sub-title">Работы</h4>
                     <a class="aside__button button" href="addwork" data-title="Добавить Работу">Добавить</a>
                     <a class="aside__button button" href="/" data-title="Добавить Работу">Найти</a>
                  </div>
                  <div class="aside__item">
                     <h4 class="aside__item-name sub-title">Пользователи</h4>
                     <a class="aside__button button" href="adduser" data-title="Добавить Работу">Добавить</a>
                     <a class="aside__button button" href="/" data-title="Добавить Работу">Найти</a>
                  </div>
                  <a class="aside__button button" href="logout" data-tittle="">Выйти</a>
               </div>
            </aside>
            <?php endif;?>
            <?= $content; ?>
         </div >
      </div >
      <footer class="footer">
         <div class="footer__container _container">
            <div class="footer__body">
               <p>Copyright ©2023 All rights reserved </p>
            </div>
         </div>
      </footer>

   </div>
   <!-- Тут я работаю -->
   <script src="/public/src/js/app.min.js"></script>
</body>

</html>