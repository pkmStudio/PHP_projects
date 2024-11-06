
            <main>
               <div class="main__container _container">
                  <?php if (isset($_SESSION['authorize']['who']) && $_SESSION['authorize']['who'] == 'admin'):?>
                  <p>Ты еще ничего не выбрал.</p>
                  <? else :?>
                  <section class="login">
                     <h1 class="login__title title">Вход в админпанель</h1>
                     <form class="login__form" action="/admin" method="POST" data-message="Что-то пока не придумал">
                        <label class="login__label" for="login">Введите логин</label>
                        <input class="login__input" id="login" name="login" type="text">

                        <label class="login__label" for="password">Введите пароль</label>
                        <input class="login__input" id="password" name="password" type="password">
                     
                        <div class="login__showpass">
                           <label class="login__label" for="showpass">Показать пароль</label>
                           <input class="login__checkbox" id="showpass" name="showpass" type="checkbox">
                        </div>   

                        <div class="login__error error-block"></div>
                        
                        <button class="login__button button" type="submit">Начать творить!</button>
                     </form>
                  </section>
                  <?php endif;?>
               </div>
            </main>