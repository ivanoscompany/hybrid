
<div class="breadcrumb-area">
	<div class="container">
		<div class="breadcrumb-content">
			<ul>
				<li><a href="<?php echo set::host() ?>">Начало</a></li>
				<li class="active">Кошница</li>
			</ul>
		</div>
	</div>
</div>
<!-- JB's Breadcrumb Area End Here -->

<!-- Begin JB's Cart Area -->
<div class="jb-cart-area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php include set::path('Index', 'view', 'cart/cart-product-table'); ?>
			</div>
			<div class="checkout-area">
				<div class="container">
					<div class="col-lg-6 col-12 receiver-info">
						<form action="javascript:void(0)">
							<div class="checkbox-form">
								<h3>Информация за получател</h3>
								<div class="row">
									<div class="col-md-6">
										<div class="checkout-form-list">
											<label>Име <span class="required">*</span></label>
											<input placeholder="" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="checkout-form-list">
											<label>Фамилия <span class="required">*</span></label>
											<input placeholder="" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="checkout-form-list">
											<label>Email адрес</label>
											<input placeholder="" type="email">
											<div class='email-info'>
												<i class="fa fa-caret-right" aria-hidden="true"></i>
												Моля, въведете имейл, ако желаете да получите статус на поръчката си.
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="checkout-form-list">
											<label>Телефон <span class="required">*</span></label>
											<input type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="checkout-form-list">
											<label>Допълнителна информация</label><br>
											<textarea></textarea>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="container">
					<form id='invoiceTypeForm' class='mtoggle'>
						<h3>Фактуриране</h3>
						<div class='mtButs'>
							<div class='mtBut bactive'>
								<label>
									<input type='radio' name='invoiceType' value='physical' checked />
									Фактура на физическо лице
								</label>
							</div>
							<div class='mtBut'>
								<label>
									<input type='radio' name='invoiceType' value='juristically' />
									Фактура на юридическо лице
								</label>
							</div>
						</div>
						<div class='mtConts'>
							<div class='mtCont'>
								<div>
									<label>Име <span class="required">*</span></label>
									<input placeholder="" type="text">
								</div>
								<div>
									<label>Фамилия <span class="required">*</span></label>
									<input type="text">
								</div>
							</div>
							<div class='mtCont'>
								<div>
									<label for='firmName'>Име на фирмата <span class="required">*</span></label>
									<input id='firmName' type="text">
								</div>
								<div>
									<label>БУЛСТАТ / ЕИК <span class="required">*</span></label>
									<input placeholder="" type="text">
								</div>
								<div>
									<label>Номер по ДДС</label>
									<input placeholder="" type="text">
								</div>
								<div>
									<label>МОЛ</label>
									<input placeholder="" type="text">
								</div>
								<div class="location">
									<label>Адрес <span class="required">*</span></label>
									<input type="text">
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="container">
					<form id='paymentTypeCont' class='mtoggle'>
						<h3>Начин на плащане</h3>
						<div class='mtButs'>
							<div class='mtBut bactive'>
								<label>
									<input type='radio' name='paymentType' value='cash' checked />
									Наложен платеж
								</label>
							</div>
							<div class='mtBut'>
								<label>
									<input type='radio' name='paymentType' value='bank' />
									По банков път
								</label>
							</div>
							<div class='mtBut'>
								<label>
									<input type='radio' name='paymentType' value='lease' />
									На изплащане
								</label>
							</div>
							</div><div class='mtConts'>
							<div class='mtCont'>
								<p>Заплащате директно на куриера при доставка в брой или с карта.</p>
							</div>
							<div class='mtCont'>
								<p>След заявка на поръчката, на посочения имейл адрес ще получите проформа фактура, като изпращането на продуктите става след заплащане.</p>
							</div>
							<div class='mtCont'>
								<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
							</div>
						</div>
					</form>
				</div>
				<!--<div class="container">-->
				<!--    <div class="free-delivery-left">-->
				<!--        Остават Ви още <b>23 лв.</b> до безплатна доставка. <button id="myBtn">Вижте продукти на тази стойност</button>-->
				<!--        <div id="myModal" class="modal">-->
				<!--            <div class="modal-content">-->
				<!--                <span class="close">&times;</span>-->
				<!--                    <div class='SingleProductBundle'>-->
				<!--                        <div class="section_title-2">-->
				<!--                            <h4>Изберете продукт, за да получите безплатна доставка</h4>-->
				<!--                        </div>-->
				<!--                        <div class='BundleProduct'>-->
				<!--                            <h5 class='bundleProductName'>Маркучи</h5>-->
				<!--                            <img src='image/product/large-size/1.jpg'/>-->
				<!--                            <span class='bundleProductPrice'>58.00 лв.</span><br><br>-->
				<!--                            <button class='addBundleProduct'>Добави</button>-->
				<!--                        </div>-->
				<!--                        <div class='BundleProduct'>-->
				<!--                            <h5 class='bundleProductName'>Разклонител</h5>-->
				<!--                            <img src='image/product/large-size/3.jpg'/>-->
				<!--                            <span class='bundleProductPrice'>37.00 лв.</span><br><br>-->
				<!--                            <button class='addBundleProduct'>Добави</button>-->
				<!--                        </div>-->
				<!--                        <div class='BundleProduct'>-->
				<!--                            <h5 class='bundleProductName'>Шублер</h5>-->
				<!--                            <img src='image/product/large-size/2.jpg'/>-->
				<!--                            <span class='bundleProductPrice'>85.00 лв.</span><br><br>-->
				<!--                            <button class='addBundleProduct'>Добави</button>-->
				<!--                        </div>-->
				<!--                        <div class='BundleProduct'>-->
				<!--                            <h5 class='bundleProductName'>Шублер</h5>-->
				<!--                            <img src='image/product/large-size/2.jpg'/>-->
				<!--                            <span class='bundleProductPrice'>85.00 лв.</span><br><br>-->
				<!--                            <button class='addBundleProduct'>Добави</button>-->
				<!--                        </div>-->
				<!--                        <div class='BundleProduct'>-->
				<!--                            <h5 class='bundleProductName'>Шублер</h5>-->
				<!--                            <img src='image/product/large-size/2.jpg'/>-->
				<!--                            <span class='bundleProductPrice'>85.00 лв.</span><br><br>-->
				<!--                            <button class='addBundleProduct'>Добави</button>-->
				<!--                        </div>-->
				<!--                    </div>-->
				<!--            </div>-->
				<!--        </div>-->
				<!--    </div>-->
				<!--</div>-->
			</div>
		</div>
		<div class="col-lg-6 col-12" style="margin: 0 auto">
			<div class="your-order">
				<h3>Вашата поръчка</h3>
				<div class="your-order-table table-responsive">
					<table class="table">
						<tbody>
							<?php foreach ($product as $value) { 
								$getPrice = $this->get_product_price_model($value['product_id']);
								$getTotalValuePrice .= $getPrice * $value['product_cart_count'].'/';
							?>
							<tr class="cart_item">
								<td class="cart-product-name"> <?php echo $value['product_title'] ?><strong class="product-quantity">
								× <?php echo $value['product_cart_count'] ?></strong></td>
								<td class="cart-product-total"><span class="amount"><?php echo $this->get_product_price_model($value['product_id']); ?> лв</span></td>
							</tr>
							<?php } 
							$getExplodeTotalValue = explode('/',$getTotalValuePrice);
							$getSumTotalPrice = array_sum($getExplodeTotalValue);
							?>
						</tbody>
						<tfoot>
							<tr class="cart-subtotal">
								<th>Общо</th>
								<td><span class="amount"><?php echo $getSumTotalPrice ?> лв</span></td>
							</tr>
							<tr class="order-total">
								<th>Крайна сума</th>
								<td><strong><span class="amount"><?php echo $getSumTotalPrice ?> лв</span></strong></td>
							</tr>
						</tfoot>
					</table>
					<p style="padding: 1% 3%;">Цената за всички продукти е с включен ДДС.</p>
				</div>
				<input type="checkbox" name="checked" value="checked" style="margin-top: 5%">Прочетох и съм съглсен с <a href="<?php echo set::url('pravila-gdpr'); ?>" target="_blank"><u><b>Правилника за използване на уеб сайта и Защита на личните данни</b></u></a>
				<div class="order-button-payment">
					<input value="Изпратете поръчка" type="submit">
				</div>       
			</div>
		</div>
	</div>
</div>								