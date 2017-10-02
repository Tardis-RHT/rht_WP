<?php /* Template Name: Page Contacts */ ?>
<?php get_header(); ?>

<div id="overlay"></div>

    <section class='breadcrumbs'>
		<div class="breadcrumbs_wrapper">
		<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
		</div>
	</section>
	
    <section class="page-contacts">
        <div class="contacts_feedback">
            <h2 class="page-contacts_h2">Вы уже сотрудничали с нами?</h2>
            <p>Оставьте отзыв. Все отклики помогут нам стать лучше.</p>
            <button class="main_feedback_feedback btn" onClick='location.href="/comment/"'>
                Оставить отзыв
            </button>
            <span>Или звоните бесплатно <a href="tel:0800210257">0 800 21 02 57</a></span>
        </div>
        <div class="page-contacts_wrapper">
            <div class="page-contacts_wrapper-small">
                <div class="contacts_contacts">
                    <h2>Контакты</h2>
                    <ul class="page-contacts_list">
                        <li>
                            <i class="zmdi zmdi-phone"></i>
                            <p class="contacts_bold"><a href="tel:0800210257">800 21 02 57</a></p>
                            <span>(бесплатно по Украине)</span>
                        </li>
                        <li>
                            <i class="zmdi zmdi-time"></i>
                            <p class="contacts_bold">09:00 — 19:00</p>
                            <span class="contacts_bold">без выходных</span>
                        </li>
                        <li>
                            <i class="zmdi zmdi-email"></i>
                            <p class="contacts_bold"><a href="mailto:rollinghitech@gmail.com">rollinghitech@gmail.com</a></p>
                        </li>
                        <li>
                            <i class="zmdi zmdi-pin"></i>
                            <p>69000, Украина, Запорожье, ул. Новостроек, дом 7</p>
                        </li>
                        <li>
                            <i class="zmdi zmdi-phone"></i>
                            <p>Глава отдела продаж Пшеничко Андрей Владимирович</p>
                            <span>+380 (67) 888-07-56</span>
                        </li>
                        <li>
                            <i class="zmdi zmdi-phone"></i>
                            <p>Генеральный директор Прядко Ксения Владимировна</p>
                            <span>+380 (67) 618-16-31</span>
                        </li>
                    </ul>
                </div>

			</div>
			<div class="contacts_map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5358.274731796102!2d35.01899176897629!3d47.81755547909713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40dc6197b88c0a19%3A0xf4c8978286f0d300!2z0LLRg9C70LjRhtGPINCd0L7QstC-0LHRg9C00L7QsiwgNywg0JfQsNC_0L7RgNGW0LbQttGPLCDQl9Cw0L_QvtGA0ZbQt9GM0LrQsCDQvtCx0LvQsNGB0YLRjA!5e0!3m2!1sru!2sua!4v1505600642705" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
        </div>
    </section>


<?php get_footer(); ?>
