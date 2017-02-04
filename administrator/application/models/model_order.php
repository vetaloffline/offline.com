<?
class Model_order extends Model
  { 
      public $query;
      public $id;

      function getorder(){
        $this->id = $_GET['id'];

        $this->query = "SELECT * 
                        FROM `HistoryOForders`
                        WHERE id = '$this->id'";
        $order = $this->db->makeQuery($this->query)[0];
        if (!$order) {
          header("Location: /admin/orders");
          die();
        }else{return $order;}
      }
      function getgoodsorder(){
        $this->id = $_GET['id'];
        $this->query = "SELECT * 
                        FROM `order_goods` 
                        WHERE id_order = '$this->id'";
        $ordergoods = $this->db->makeGoods($this->query,'id_good');
        foreach ($ordergoods as $key => $value) {
          $idgood = $value['id_good'];
          $this->query = "SELECT * 
                          FROM `goods`
                          INNER JOIN goodimg 
                          ON id = good_id
                          WHERE id = '$idgood'";
          $good = $this->db->makeQuery($this->query);
          $goods[$idgood]=$good;
        }

        if ($goods) {
        foreach ($goods as $ke => $va) {
          foreach ($va as $k => $v) {
            if ($v['descriptionimg'] == 'small_img') {
              $goods_2[$ke]=$v;
              $goods_2[$ke]['count']=$ordergoods[$ke]['count']; 
            }
          }
        }
        return $goods_2;
      }}

      function editorder(){
          $idgood = Lib::clearRequest($_POST['idgood']);
          $count = Lib::clearRequest($_POST['count']);
          $idorder = Lib::clearRequest($_POST['idorder']);
          $val=Lib::valinputcount($count);
          if (!$idorder) {
            header("Location: /admin/orders");
            die();
          }
          if (!$val) {
            file_put_contents('administrator/logo_admin.php', $time." Не пройдена проверка Количество товара "."(".$val.")"." IP ".$ip." HOST ".$host."\n",FILE_APPEND);
        
          header("Location: /admin/order?id=$idorder");
          die();
          }
          if ($count == '0') {
            header("Location: /admin/order?id=$idorder");
            die();
            
          }
          $this->query = "UPDATE `order_goods` 
                          SET `count`='$count'
                          WHERE id_good ='$idgood'
                          AND id_order = '$idorder'";
          $this->db->makeQuery($this->query);

          $this->query = "SELECT * 
                          FROM `order_goods` 
                          WHERE id_order = '$idorder'";
          $order= $this->db->makeQuery($this->query);

          foreach ($order as $key => $value) {
            $summ = $value['count']*$value['price'];
            $summa = $summa + $summ;
          }
          $this->query = "UPDATE `HistoryOForders` 
                          SET `summa`='$summa'
                          WHERE id= '$idorder'";
          $this->db->makeQuery($this->query);

          header("Location: /admin/order?id=$idorder");
      }

      function deleteorder(){
        $idgood = Lib::clearRequest($_POST['idgood']);
        $idorder = Lib::clearRequest($_POST['idorder']);
        if (!$idorder) {
            header("Location: /admin/orders");
            die();
          }
         $this->query = "DELETE FROM `order_goods` 
                         WHERE id_order = '$idorder'
                         AND id_good = '$idgood'";
          $this->db->makeQuery($this->query);

          $this->query = "SELECT * 
                          FROM `order_goods` 
                          WHERE id_order = '$idorder'";
          $order= $this->db->makeQuery($this->query);

          foreach ($order as $key => $value) {
            $summ = $value['count']*$value['price'];
            $summa = $summa + $summ;
          }
          $this->query = "UPDATE `HistoryOForders` 
                          SET `summa`='$summa'
                          WHERE id= '$idorder'";
          $this->db->makeQuery($this->query);

         header("Location: /admin/order?id=$idorder");
      }

      function getstatusorder(){
        $this->query = "SELECT * 
                        FROM `status`";
        return $this->db->makeQuery($this->query);
      }

      function editstatus(){
        $status = $_POST['status'];
        $idorder = $_POST['idorder'];
        if (!$idorder) {
            header("Location: /admin/orders");
            die();
          }
        $this->query = "SELECT `name` 
                        FROM `status`
                        WHERE russname = '$status'";
        $status = $this->db->makeQuery($this->query)[0]['name'];

        $this->query = "UPDATE `HistoryOForders` 
                        SET `status`='$status' 
                        WHERE id = '$idorder'";
        $this->db->makeQuery($this->query);
        header("Location: /admin/order?id=$idorder");

      }

      function gooaddorder(){
        $idgood = Lib::clearRequest($_POST['idgood']);
        $count = Lib::clearRequest($_POST['count']);
        $order = Lib::clearRequest($_POST['order']);
        if (!$order) {
            header("Location: /admin/orders");
            die();
          }

        if (empty($count) || empty($idgood)) {
          header("Location: /admin/order?id=$order");
          die();
        }

        $this->query = "SELECT `price` 
                        FROM `goods`
                        WHERE id = '$idgood'";
        $price = $this->db->makeQuery($this->query)[0]['price'];

        if (!$price) {
          //такого кода не существует
         header("Location: /admin/order?id=$order");
         die();
        }
        $this->query = "SELECT *
                        FROM `order_goods`
                        WHERE `id_good` = '$idgood'
                        AND `id_order` = '$order'";
        $good = $this->db->makeQuery($this->query)[0];
        if (!$good) {
          $this->query = "INSERT INTO `order_goods`(`id_good`, `id_order`, `count`, `price`) 
                          VALUES ('$idgood','$order','$count','$price')";
          $this->db->makeQuery($this->query);
        }else{
          //такой товар уже добавлен
         header("Location: /admin/order?id=$order");
          die();
        }

        $this->query = "SELECT *
                        FROM `order_goods`
                        WHERE `id_order` = '$order'";
        $goods = $this->db->makeQuery($this->query);
        foreach ($goods as $key => $value) {
          $summ = $value['count'] * $value['price'];
          $summa = $summa + $summ;
        }
        $this->query = "UPDATE `HistoryOForders` 
                        SET `summa`='$summa'
                        WHERE id = '$order'";
        $this->db->makeQuery($this->query);
        header("Location: /admin/order?id=$order");

      }
  }

?>
