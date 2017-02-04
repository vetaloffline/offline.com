<?include "menu.php";
?>
<div class="body_center">
<div class="bodyorders">
		<div class="bodyordersspisok">
			<a href="/admin/orders" class="btn btn-info orderstatus">Новые</a>
		</div>
		<div>
			<a href="/admin/orders/accept" class="btn btn-info orderstatus">Принятые</a>
		</div>
		<div>
			<a href="/admin/orders/way" class="btn btn-info orderstatus">В пути</a>
		</div>
		<div>
			<a href="/admin/orders/perform" class="btn btn-info orderstatus">Выполненые</a>
		</div>
	</div>
	<div class="tableorder">
	<div class="">
		<h2>Заказ №<?=$db['id']?></h2>
	</div>
		<table class="table table-bordered">
    <thead>
      <tr>
      	<th><center>Фото</center></th>
        <th><center>Наименование</center></th>
        <th><center>Код</center></th>
        <th><center>Цена</center></th>
        <th class="tableinput"><center>Количество</center></th>
        <th><center>К оплате</center></th>
         <th><center>Удалить</center></th>
      </tr>
    </thead>
    <tbody>
<? 
if ($goods) {
foreach ($goods as $key => $value) {
	?>
	<tr>
		<td><center><img src="/web/images/fotogoods/<?=$value['nameimg']?>"></center></td>
        <td><center><?=$value['name']?></center></td>
        <td><center><?=$value['id']?></center></td>
        <td><center><?=$value['price']?></center></td>
        <td>
        <?if($db['status'] !== 'perform'){?>
	        <form action="/admin/order/edit" method="POST">
	        	<input type="text" name="count" value="<?=$value['count']?>" class="tableinput form-control">
	        	<input type="hidden" name="idgood" value="<?=$value['id']?>">
	        	<input type="hidden" name="idorder" value="<?=$db['id']?>">
	        </form><?}else{?>
	        	<center><?echo $value['count'];?></center>
	        	<?}?>
        </td>
        <td><center><?=$value['price']*$value['count']?></center></td>
         <td>
          <?if($db['status'] !== 'perform'){?>
         <form action="/admin/order/delete" method="POST">
         	<center><input type="submit" name="auth" value="X" class="btn btn-danger"></center>
         	<input type="hidden" name="idorder" value="<?=$db['id']?>">
         	<input type="hidden" name="idgood" value="<?=$value['id']?>">
         </form><?}?>
         </td>
      </tr>
<?}}?>
    </tbody>
  </table>
	</div>
	<div class="ordersumma">
		Общая сумма заказа: <b><?=$db['summa']?></b>
	</div>
	<div class="ordersumma">
		Дата заказа : <b><?=$db['data']?></b>
	</div>
	<div class="ordersumma">
		<div class="owwww">Статус :</div><div class="ordersummass">
		 <?if($db['status'] !== 'perform'){?>
		<form action="/admin/order/editstatus" method="POST">
		<select class="form-control" id="sel1" name="status" onchange="this.form.submit()">
		<?
		foreach ($colorg as $k => $v) {
			if ($v['name'] == $db['status']) {?>
				<option selected="<?='selected'?>">
					<?=$v['russname']?>
				</option>
			<?}else{?>
				<option>
					<?=$v['russname']?>
				</option>
		<?}}?>
		</select>
		<input type="hidden" name="idorder" value="<?=$db['id']?>">
		</form><?}else{
			echo $colorg[2]['russname'];
			}?>
		</div>
	</div>
	<div class="asdfas"></div>
	<?if($db['status'] !== 'perform'){?>
	<button data-toggle="collapse" data-target="#demo" class="btn btn-success addgoodorder">Добавить товар</button><?}?>
	<div id="demo" class="collapse addgoodorder"><p>
		<form action="/admin/order/goodadd" class="inputgoodaddorder" method="POST"> 
			<label>Код товара</label>
			<input type="text" name="idgood" class="form-control" >
			<label>Количество</label>
			<input type="text" name="count" class="form-control"><br>
			<input type="submit" name="" class="btn btn-primary" value="Добавить товар к заказу">
			<input type="hidden" name="order" value="<?=$db['id']?>">
		</form>
	</div>
</div>
