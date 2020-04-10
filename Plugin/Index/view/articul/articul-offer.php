<div class="jb-quantity-btn_area">
	<button class="jb-quantity_btn leasing" id='spAskOfferBut'>Поискай оферта</button>
	<div id='toggleAskOfferContainer'>
		<div class='askOfferContainer'>
			<span class='closeOffercontainer'><i class="fas fa-times"></i></span>
			<h2>Поискай оферта</h2>
			<div class='offert-productInfo'>
				<img src='<?php echo $getArticulInfo['product_image'] ?>' />
				<span><?php echo $getArticulInfo['product_title'] ?></span>
			</div>
			<label>Телефон: <span class="required">*</span><br/><input id='offer-phone-input' type='text' name='offert-phone' placeholder='Въведете вашия телефон' required /></label>
			<label>Имейл:<br/><input id='offer-email-input' type='text' name='offert-mail' placeholder='Въведете вашия имейл' required /></label>
			<label for='offerTextArea'>Запитване <span class="required">*</span></label><br/>
			<textarea id='offerTextArea' placeholder='Задайте вашия въпрос тук'></textarea>
			
			<div class="jb-quantity-btn_area">
				<a class="jb-quantity_btn buy click-to-offer" onclick="run({
				plugin:'Index',
				controller:'articul',
				method:'needOffer',
				back:'.offer-error-log',
				massive:{
					phone:$('#offer-phone-input').val(),
					email:$('#offer-email-input').val(),
					coment:$('#offerTextArea').val(),
					id:<?php echo $getArticulInfo['product_id'] ?>
				}
				})">Изпрати запитване</a>
			</div>
			<div class="offer-error-log"></div>
		</div>
	</div> 
</div>
<script>
	
</script>			