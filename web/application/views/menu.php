<div class="body_left">
	<div class="menu_g">
		<div class="menu_neg">
			<form action="/katalog">
				<select name="sel" id='testselect' onchange="this.form.submit()">
					<option value="reting"  <?if($_GET['sel'] == "reting"){echo 'selected';}?>		>По рейтингу</option>
					<option value="az"  	<?if($_GET['sel'] == "az"){echo 'selected';}?> 		        >От А-я</option>
		  			<option value="za"  	<?if($_GET['sel'] == "za"){echo 'selected';}?>   	   	    >От Я-а</option>
		  			<option value="maxmin"  <?if($_GET['sel'] == "maxmin"){echo 'selected';}?> >От большего 10-1</option>
		  			<option value="minmax"  <?if($_GET['sel'] == "minmax"){echo 'selected';}?>  >От меншего 1-10</option>
				</select><?$a = 1;?>


				
<!-- 

				<script type="text/javascript">
					function funcBefore (){
						$("#information").text('Ожидание данных...');
						$("#loader").show();
					}
					function funcSuccess (data){
						$("#information").text(data);
						$("#loader").hide();
						
					}
				$(document).ready (function (){
					$('#testselect').change(function(){
						// $.get('/katalog',{sel: "name"}, function(data){
						// 	//alert(<?=$a?>);
						// });
						var em = '?em=123';
						$.ajax({
							url: "/katalog"+em, //где будет обрабатываться
							type: "GET",
							success: function(html){
							$("#sadasda").html('');
							 for(value in html) {
					             $("#sadasda").append(
					                        
					                      );
					                }
							}
						});
					});

				});

</script> -->
		</div>
	</div>
</div>
