
<div class="body_center">

<div class="panel-group" id="accordion">
<div id="name_history_orders"><h2>История заказов</h2></div>
<?
if ($db) {
$db = array_reverse($db);
foreach ($db as $key => $value) {
	?>
	<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$key?>">
        Заказ №<?=$value[0]['id']?></a>
      </h4>
    </div>
    <div id="collapse<?=$key?>" class="panel-collapse collapse off">
      <div class="panel-body">
      <table class="table table-striped">
      	<thead>
		      <tr>
		     	<th>Фото</th>
		        <th>Наименование</th>
		        <th>Количество</th>
		        <th>цена</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?
      foreach ($value as $ke => $va) {
      	?>
      		  <tr>
      		  	<td><img src="ss" title="Фото товара"></td>
		        <td><?=$goods[$va['id_good']]['name']?></td>
		        <td><?=$va['count']?></td>
		        <td><?=$goods[$va['id_good']]['price']?></td>
		      </tr>
		    <?}?>
		    </tbody>
		</table>
		<div>
			Сумма заказа : <b><?=$va['summa']?></b>
		</div>
		<div>
			Дата заказа : <b><?=$va['data']?></b>
		</div>
		<div>
			Статус : <b><?=$va['status']?></b>
		</div>
      </div>
    </div>
  </div>
<?}}else{?>
<h2>У вас нет заказов</h2>
<?}?>
</div>
</div>
