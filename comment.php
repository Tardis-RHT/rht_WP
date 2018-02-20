<?php /* Template Name: Page Comment */ ?>
<?php get_header(); ?>

<main role="main">
	<div id="overlay"></div>		

    <div class="furnitura-set_wrapper">
        <section class="breadcrumbs wrapper">
            <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
        </section>
    </div>

    <section class="comment" id="thankyou-hide">
        <div class="wrapper">
            <h2 class="comment-title">Оставьте ваш отзыв</h2>
            <form action="" enctype="multipart/form-data" method="post" class="comment-form" id="comment-form">
                <div class="comment-inputs">
					<input type="text" class="comment-name" placeholder="Имя и фамилия" required id="commentName" name="commentName">
					<label for="commentName" id="commentName-lab">Имя и фамилия</label>
					<input type="email" class="comment-email" placeholder="Email" required id="commentEmail" name="commentEmail">
					<label for="commentEmail" id="commentEmail-lab">Email</label>
                    <select name="products" id="commentProducts" required>
                        <option disabled value="" selected="selected" style="display: none;">Товар</option>
                        <option value="Фурнитура">Фурнитура</option>
                        <option value="Автоматика">Автоматика</option>
                        <option value="Филёнка">Металлическая филёнка</option>
					</select>
					<label for="commentProducts">Товар</label>
                </div>
                <div class="comment-dropfiles dropzone" id="my-dropzone" action="/file-upload">
                    <b id="msgText">Перетяните сюда</b>
                    <span id="msgQuontity">до 3 фотографий</span>
                    <span>или</span>
                    <b>Загрузите с компьютера</b>
                    <span>(jpg/png до 10 Мб)</span>
                    <input type="file" name="photo" id="photo" class="commentPhoto" multiple accept="image/jpeg,image/png">
				</div>
				<div class="comment-textarea">
						<textarea id="commentText" name="commentText" cols="30" rows="10" required placeholder="Сообщение" minlength="10"></textarea>
						<label for="commentText" id="commentText-lab">Сообщение</label>
				</div> 
                <button type="submit" disabled class="btn comment-btn" id="comment_btn" onclick="showCommentThanx()">Отправить</button>
                <span class="comment-requiremence">
                    *Все поля обязательные для заполнения
                </span>
            </form>
        </div>
    </section>
	
	<div id="thankyou-popup">
		<section class="comment-thankyou">
			<div class="thankyou-text wrapper">
					<h2>Спасибо вам за отзыв!</h2>
					<p>Ваш отзыв проверятеся модератором. <br>
						Мы загрузим его на сайт как только он пройдет проверку
					</p>
					<button class="btn" onClick='location.href="<?php echo home_url(); ?>"'>На главную</button>
			</div>
		</section>
		<section class="all_offers wrapper">
			<h2>Вас также могут заинтересовать</h2>
			<div class="offers">
				<a class="offer-furnitura" href="/furnitura/">
					<h3>Усиленная<br>фурнитура</h3>
				</a>
				<a class="offer-filenka2" href="/panels/">
					<h3>Металлическая<br>филёнка</h3>
				</a>
				<a class="offer-automatica" href="/automatica/">
					<h3>Автоматика</h3>
				</a>
			</div>
		</section>
	</div>
	</main>

<?php get_footer(); ?>