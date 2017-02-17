<script>
$(function(){
	$( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: 10000,
		values: [ 0, 10000 ],
		step: 10,
		slide: function( event, ui ) {
			$( "#price" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
		}
	});
	$( "#price" ).val( "" + $( "#slider-range" ).slider( "values", 0 ) +
		" - " + $( "#slider-range" ).slider( "values", 1 ) );

});
	</script>
<div class="body_left">
	<div class="menu_g">
		<div class="menu_neg">
			<form action="/katalog">
			<div ><a href="/katalog" class="btn btn-primary " id="ssadsda">Очистить фильтр</a></div><br>
				<select name="sel" id='testselect' onchange="this.form.submit()" class="form-control">
					<option value="reting"  <?if($_GET['sel'] == "reting"){echo 'selected';}?>		>По рейтингу</option>
					<option value="az"  	<?if($_GET['sel'] == "az"){echo 'selected';}?> 		        >От А-я</option>
					<option value="za"  	<?if($_GET['sel'] == "za"){echo 'selected';}?>   	   	    >От Я-а</option>
					<option value="maxmin"  <?if($_GET['sel'] == "maxmin"){echo 'selected';}?> >От большего 10-1</option>
					<option value="minmax"  <?if($_GET['sel'] == "minmax"){echo 'selected';}?>  >От меншего 1-10</option>
				</select><p>
				<div>Цвет товара</div>
				<? 
				foreach ($colorg as $key => $value) {
					?>
					<div>
						<input onchange="this.form.submit()" type="checkbox" value="<?=$value['id']?>" name="<?=$value['namecolor']?>" id="<?=$value['namecolor']?>" <?if($_GET[$value['namecolor']]){echo'checked';}?>>
						<lable for="<?=$value['namecolor']?>"><?=$value['namecolor']?></lable>
					</div>
					<?}?><p>
				<div>Особености товара</div>
				<?
				foreach ($fef as $key => $value) {
					?>
					<div>
						<input onchange="this.form.submit()" type="checkbox" value="<?=$value['id']?>" name="<?=$value['namefech']?>" id="<?=$value['namefech']?>" <?if($_GET[$value['namefech']]){echo'checked';}?>>
						<lable for="<?=$value['namefech']?>"><?=$value['namefech']?></lable>
					</div>
					<?}?>
				<div>
					<div>Фильтровать по цене</div>
					<div id="body_body_price">
						<div class="content">
							<form class="form-horizontal" method="GET" id="form">
							<div class="">
									<div class="">
										<div id="body_input_price">
											<div id="input_price">
												<input class="form-control" name="price" id="price">
											</div>
											<div class="button_submit">
												<button type="submit" class="btn btn-primary">Оk</button>	
											</div>
										</div>
										<div id="slider-range"></div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
					<script src="bootstrap/js/bootstrap.min.js"></script>
					<script src="ui/jquery-ui.js"></script>
				</div>
				</div>
			</div>
		</div>
