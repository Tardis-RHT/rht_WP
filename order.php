<?php /* Template Name: Page Order */ ?>
<?php get_header(); ?>

<main role="main">
	<div id="overlay"></div>
   
    <section class="breadcrumbs wrapper">
            <a class="backToCart" href="/shopping-cart/"><i class="zmdi zmdi-long-arrow-left"></i> Назад к корзине</a>
    </section>

    <section class="order wrapper">
        <h2>Заказ товаров</h2>
        <div class="order_container">
            <ul class="order_make">
				<li class="order_make_item">
					<div class="order_make_name">
						<p class="order_make_title order_delivery">Выберите способ доставки</p>
						<p class="order_make_comment">Стоимость доставки не включена в стоимость и соответствует тарифам компаний.</p>
					</div>
					<div class="order_delivery_form">
						<span>Выберите почтовую компанию</span>
						<select class="post-office_select" name="post office">
							<option class="option" value="sat">САТ</option>
							<option class="option" value="intime">Интайм</option>
							<option class="option" value="other">Другой способ доставки</option>
						</select>
						<span >Способ доставки:</span>
						<span class="order_delivery-choose">
							<input id="order_office" type="radio" name="order_delivery-choose" value="order_office" checked onclick="deliveryChoose()">
							<label for="order_office" class="order_office_label">В отделение</label>
							<input id="order_courier" type="radio" name="order_delivery-choose" value="order_courier" onclick="deliveryChoose()">
							<label for="order_courier" class="order_courier_label">Курьером</label>
						</span>
						<label class="order_label" for="order_name">Имя и фамилия</label>
						<input class="order_input" type="text" id="order_name" class="show_label" name="order_name" placeholder="Имя и фамилия" required>

						<label class="order_label" for="order_region">Ваша область</label>
						<input class="order_input" type="text" id="order_region" name="order_region" placeholder="Ваша область" required>

						<label class="order_label" for="order_city">Ваш город</label>
						<input class="order_input" type="text" id="order_city" name="order_city" placeholder="Ваш город" required>

						<label class="order_label" id="order_post-office_label" for="order_post-office_number">№ отделения</label>
						<input class="order_input" type="number" id="order_post-office_number" name="order_post-office_number" placeholder="№ отделения" min="0" required>

						<div class="order_deliver-courier">
							<label class="order_label" for="order_street">Улица</label>
							<input class="order_input" type="text" id="order_street" name="order_street" placeholder="Улица" required>

							<label class="order_label" for="order_house">Дом</label>
							<input class="order_input" type="text" id="order_house" name="order_house" placeholder="Дом">

							<span>Удобное время</span>
							<div class="order_choose-time">
								<span>с </span>
								<input type="time" id="order_time_from" name="order_time" min="09:00" max="19:00">
								<span> до </span>
								<input type="time" id="order_time_to" name="order_time" min="09:00" max="19:00">
							</div>

							<label for="order_comment">Комментарий</label>
							<textarea type="text" id="order_comment" name="order_comment"></textarea>			
						</div>
						<button id="orderGo" class="btn" disabled>Продолжить</button>
					</div>
				</li>
				<li class="order_make_item">
					<div class="order_make_name">
						<p class="order_make_title order_pay">Выберите способ оплаты</p>
					</div>
					<ul class="order_payment-list">
						<li class="order_payment_method">
							<h4 class="pay_cod">Наложенным платежем</h4>
							<p>Оплатите после получения товара.</p>
						</li>
						<li class="order_payment_method">
							<h4 class="pay_account">Оплата на счет</h4>
							<p>Менеджер магазина вышлет вам счет-фактуру для оплаты в отделении или с помощью онлайн-банкинга любого банка.</p>
						</li>
						<li class="order_payment_method">
							<h4 class="pay_online">Онлайн оплата</h4>
							<p>Оплата с помощью сервиса Ligpay.</p>
						</li>
						<li class="order_payment_method">
							<h4 class="pay_cash">Наличными</h4>
							<p>Оплатите наличными, когда будете забирать товар у курьера «Новой Почты».</p>
						</li>
						<li class="order_payment_method">
							<h4 class="pay_card">Банковской картой</h4>
							<p>Оплачивайте курьеру мгновенно с помощью банковской карты.</p>
						</li>
					</ul>
				</li>
				<li class="order_make_item">
					<div class="order_make_name">
						<p class="order_make_title order_done">Ваш заказ принят</p>
					</div>
					<div class="order_done_message">
						<h3>Спасибо, ваш заказ принят!</h3>
						<h3>Его номер : 89944</h3>
						<p>Ожидайте звонка с 09:00 до 19:00, чтобы подтвердить заявку.  Менеджер уточнит стоимость доставки в связи с тарифами почтовой компании.</p>
						<a href="<?php echo home_url(); ?>">
							<button class="btn">На главную</button>
						</a>
					</div>
				</li>	
            </ul>
            <div class="order_list">
                <ul>
				<?php
					if (isset($_SESSION['products'])){
						$products = $_SESSION['products'];
						foreach($products as $productData => $quantity ){ 

							if(strrpos($productData, "?") !== false){
								$product = stristr($productData, '?', true);
							} else{
								$product = $productData;
							}
				?>
                    <li class="order_item">
					<!-- different name fot each category -->
					<?php $template = get_page_template_slug($product);
					//for furniture:
						if ($template == 'furnitura-set.php'):?>
						<h3>Комплект &laquo;<?php echo get_the_title( $product ); ?>&raquo;</h3>
						<?php endif; ?>
					
					<!-- for automation: -->
						<?php if ($template == 'automatica-card.php'):?>
						<h3>Автоматика &laquo;<?php echo get_the_title( $product ); ?>&raquo;</h3>
						<?php endif;?>

					<!-- for panels: -->
						<?php if ($template == 'panels.php'):?>
						<h3><?php echo get_the_title( $product ); ?></h3>
						<?php endif;?>

						<div class="order_item_price">
							<p>
							<?php 
								if(strrpos($productData, "?plate") !== false){ 
									$price = get_post_meta( $product, 'price_plus', true );
								} elseif(strrpos($productData, "?mini") !== false){
									$price = get_post_meta( $product, 'price-mini', true );
								} elseif(strrpos($productData, "?maxi") !== false){
									$price = get_post_meta( $product, 'price-maxi', true );
								} else{
									$price = get_post_meta( $product, 'price', true );
								}
							echo $price ?>
					 грн x <?php echo $quantity;?> шт.</p>
					 <p class="order-single-price-total"><?php echo $price * $quantity ?> грн</p>
						</div>
                    </li>
					<?php }
						}
					?>	
				</ul>
				<ul>
                    <li class="order_price_total">
						<p>Сумма: <b>0</b><span> грн</span></p>
						<span class="order_price_note">*Доставка не входит в стоимость</span>	
					</li>
                </ul>
            </div>
        </div>
    </section>
    </main>


<?php get_footer(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/order.js"></script>