<section class="main_callback">
		<div class="main_callback_left">
		</div>
		<div class="main_callback_center" id="popup-callback-start">
			<div class="callback_form_wrapper wrapper">
				<div class="callback_form_wrapper-small">
					<button class="callback-modal-close" id="modal-close"><i class="zmdi zmdi-close zmdi-hc-2x"></i></button>
					<h2>Обратная связь</h2>
					<p>Оставьте номер телефона и менеджер свяжется с вами в течение 15 минут</p>
					<form class="form_callback" name="callback" id="callback">
						<input class="callback_telephone" type="tel" name="telephone" placeholder="Номер телефона" id="tel" 
						PATTERN="\D[0-9]{3}\s\D[0-9]{2}\D\s[0-9]{3}\s\D\s[0-9]{2}\s\D\s[0-9]{2}"
						onkeydown="checkTelValidity()">
						<label class="phone" for="tel" id="tel_label">Номер телефона</label>
						<button class="callback_callus_btn btn" type="submit" disabled id="tel-btn" onclick="resetForm(), showPopup()">Перезвоните мне</button>
					</form>
					<span>Звоните бесплатно  0 800 21 02 57</span>
					<span>Ответим с 9:00 до 19:00 ежедневно</span>
				</div>
			</div>
		</div>
		<div class="main_callback_right">
		</div>
		<section class="main_callback-answer wrapper" id="callback-popup">			
			<div class="callback_form_wrapper-small">
				<button class="callback-answer-close" onClick='hidePopup()'><i class="zmdi zmdi-close zmdi-hc-2x"></i></button>
				<h2>Ваша заявка обрабатывается</h2>
				<p>Оператор свяжется в течение 30 минут</p>
				<button class="btn callback-answer" onClick='location.href="<?php echo home_url(); ?>"'>На главную</button>			
			</div>
		</section>
	</section>