<div class="body_center">
	<div class="container">
		<h2>Список товаров</h2>         
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Фото</th>
					<th>Артикул</th>
					<th>Наименование</th>
					<th>Цена</th>
					<th>Редактирование</th>
					<th>Удаление</th>
				</tr>
			</thead>
			<tbody><?
				foreach ($db as $key => $value){?>
				<tr>
					<td>
						<img src="/web/images/fotogoods/<?=$value['small_img'][0]['nameimg']?>">
					</td>
					<td></td>
					<td><?=$value['name']?></td>
					<td><?=$value['price']?> грн</td>
					<td><a href="/admin/editgood?id=<?=$value['id']?>">Редактировать</a></td>
					<td><a href="#">Удалить</a></td>
				</tr>
				<?}?>
			</tbody>
		</table>
	</div>
</div>

