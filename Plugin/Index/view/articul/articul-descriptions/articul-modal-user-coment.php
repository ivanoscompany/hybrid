<div class="modal fade modal-wrapper quickview-feedback_form" id="mymodal">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<h3 class="review-page-title">Напишете вашия отзив</h3>
				<div class="modal-inner-area row">
					<div class="col-lg-6">
						<div class="jb-review-product">
							<img src="<?php echo $getArticulInfo['product_image'] ?>" alt="JB's Product">
							<div class="jb-review-product-desc">
								<p class="jb-product-name"> <strong><?php echo $getArticulInfo['product_title'] ?></strong></p>
								<p>
									<span><?php echo $getArticulInfo['product_fast_desc'] ?></span>
								</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="jb-review-content">
							<!-- Begin Feedback Area -->
							<div class="feedback-area">
								<div class="feedback">
									<form action="#">
										<p class="your-opinion">
											<label>Оценете продукта</label>
											<span>
												<select class="star-rating" id="select-rating">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
												</select>
											</span>
										</p>
										<p class="feedback-form">
											<label for="feedback">Напишете отзива</label>
											<textarea id="feedback" name="comment" cols="45" rows="8" aria-required="true"></textarea>
										</p>
										<div class="feedback-input">
											<p class="feedback-form-author">
												<label for="author">Вашето име <span
													class="required"><sup>*</sup></span>
												</label>
												<input id="author" name="author" value="" size="30" aria-required="true" type="text">
											</p>
											<p class="feedback-form-author feedback-form-email">
												<label for="email">Вашия и-мейл <span
													class="required"><sup>*</sup></span>
												</label>
												<input id="email" name="email" value="" size="30" aria-required="true" type="text">
												<span class="required-fields"><span class="required"><sup>*</sup></span> Задължителни полета</span>
											</p>
											<div class="feedback-inner_btn">
												<a href="#" class="close" data-dismiss="modal" aria-label="Close">Затвори</a>
												<a href="#" onclick="run({
												plugin:'Index',
												controller:'articul',
												method:'userPostComent',
												back:'.required-fields',
												massive:{
												name:$('#author').val(),
												email:$('#email').val(),
												coment:$('#feedback').val(),
												rating:$('#select-rating').val(),
												id:<?php echo $getArticulInfo['product_id'] ?>
												}
												})">Изпрати</a>
											</div>
										</div>
									</form>
								</div>
							</div>
							<!-- Feedback Area End Here -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>