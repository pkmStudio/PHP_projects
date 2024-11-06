
<main>
   <div class="main__container">
      <section class="add-article">
         <h1 class="add-article__title title">Редактирование статьи</h1>
         <form class="add-article__form" action="#" method="POST" data-message="article">
            <label class="add-article__label" for="articleTitle">Введите название статьи</label>
            <input class="add-article__input" id="articleTitle" name="articleTitle" type="text" value="<?= $post->title?>">

            <label class="add-article__label" for="articleAnons">Введите анонс статьи</label>
            <input class="add-article__input" id="articleAnons" name="articleAnons" type="text" value="<?= $post->anons?>">
         
            <label class="add-article__label" for="articleTags">Введите теги статьи</label>
            <input class="add-article__input" id="articleTags" name="articleTags" type="text" value="<?= $post->tags?>">

            <label class="add-article__label" for="articleText">Введите текст статьи</label>
            <textarea class="add-article__textarea" id="articleText" name="articleText" type="text"><?= $post->text?></textarea>

            <div class="add-article__error error-block"></div>
            
            <button class="add-article__button button" type="submit">Редактировать статью</button>
         </form>
      </section>
   </div>
</main>
