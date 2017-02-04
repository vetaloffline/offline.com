<?include "menu.php";?>
<div class="body_center">
<div class="bodyorders1">
		<div class="bodyordersspisok">
			<a href="/admin/users" class="btn btn-info orderstatus">Пользователи</a>
		</div>
		<div>
			<a href="/admin/users/manager" class="btn btn-info orderstatus">Менеджеры</a>
		</div>
		<div>
			<a href="/admin/users/administrator" class="btn btn-info orderstatus">Админы</a>
		</div>
	</div>
	<div class="sdfdf">
	<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Email</th>
        <th>Редактирование</th>
      </tr>
    </thead>
    <tbody>
<?
foreach ($db as $key => $value) {?>
	 <tr>
        <td><?=$value['id']?></td>
        <td><?=$value['name']?></td>
        <td><?=$value['surname']?></td>
        <td><?=$value['email']?></td>
        <td>
	        <form action="/admin/users/editrole" method="POST" >
	        	<div class="sssdsds"><select name="role" onchange="this.form.submit()" class="form-control">
	        		<?
	        		foreach ($goods as $key => $val) {
	        			if($value['role'] == $val['name']){?>
	        			<option selected><?=$val['russname']?></option>
	        		<?}else{?>
	        			<option><?=$val['russname']?></option>
	        			<?}}?>
	        	</select></div>
	        	<input type="hidden" name="id" value="<?=$value['id']?>">
	        </form>
        </td>
     </tr>
<?}?>
    </tbody>
  </table>
  </div>

</div>




