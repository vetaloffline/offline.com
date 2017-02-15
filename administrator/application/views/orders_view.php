
<div class="body_center">
	<h2>Заказы</h2>
	<div class="body_orders">
		<div class="body_orders_spisok">
			<a href="/admin/orders" class="btn btn-info orderstatus">Новые</a>
		</div>
		<div class="body_orders_spisok">
			<a href="/admin/orders/accept" class="btn btn-info orderstatus">Принятые</a>
		</div>
		<div class="body_orders_spisok">
			<a href="/admin/orders/way" class="btn btn-info orderstatus">В пути</a>
		</div >
		<div>
			<a href="/admin/orders/perform" class="btn btn-info orderstatus">Выполненые</a>
		</div>
	</div>
	<div class="">
		<table class="table table-striped body_list_orders">
			<thead>
	     	 <tr>
	       	 <th><center>Номер заказа</center></th>
	       	 <th><center>Дата</center></th>
	       	 <th><center>Сумма</center></th>
	       	 <th><center>Заказчик</center></th>
	       	 <th><center>Статус</center></th>
	       	 <th><center>Просмотр</center></th>
	      	</tr>
	    	</thead>
	    	<tbody>
		<?foreach ($db as $key => $value) {?>
	<tr>
		<td><center><?=$value['id']?></center></td>
		<td><center><?=$value['data']?></center></td>
		<td><center><?=$value['summa']?></center></td>
		<td><center><?=$value['name'].' '.$value['surname']?></center></td>
		<td>
		<?if($value['status'] !== 'perform'){?>
			<form action="/admin/order/editstatus" method="POST">
		<select class="form-control" id="sel1" name="status" onchange="this.form.submit()">
		<?
		foreach ($goods as $k => $v) {
			if ($v['name'] == $value['status']) {
			
				?>
				<option selected="<?='selected'?>">
					<?=$v['russname']?>
				</option>
			<?}else{?>
				<option>
					<?=$v['russname']?>
				</option>
		<?}}?>
		</select>
		<input type="hidden" name="idorder" value="<?=$value['id']?>">
		</form><?}else{
			echo $goods[2]['russname'];
			}?>
		</td>
		<td><center><a href="/admin/order?id=<?=$value['id']?>">Посмотреть</a></center></td>
	</tr>
<?}?>
		</tbody>
  		</table>
	</div>
</div>

