<?php
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>

<?php
 // Auto suggestion
    $html = '';
   if(isset($_POST['product_name']) && strlen($_POST['product_name']))
   {
     $products = find_product_by_title($_POST['product_name']);
     if($products){
        foreach ($products as $product):
           $html .= "<li class=\"list-group-item\">";
           $html .= $product['name'];
           $html .= "</li>";
         endforeach;
      } else {

        $html .= '<li onClick=\"fill(\''.addslashes().'\')\" class=\"list-group-item\">';
        $html .= 'Not found';
        $html .= "</li>";

      }

      echo json_encode($html);
   }
 ?>
 <?php
 // find all product
  if(isset($_POST['p_name']) && strlen($_POST['p_name']))
  {
    $product_title = remove_junk($db->escape($_POST['p_name']));
    if($results = find_all_product_info_by_title($product_title)){
        foreach ($results as $result) {

            $all_users = find_all('users');

          $html .= "<tr>";

          $html .= "<td id=\"s_name\">".$result['name']."</td>";
          $html .= "<td id=\"s_quantity\">".$result['quantity']."</td>";

          $html .= "<input type=\"hidden\" name=\"s_id\" value=\"{$result['id']}\">";
          $html  .= "<td> ";
          $html .= "<select class='form-control' name='used_by'>
                    <option disabled>Select User</option>";
            foreach ($all_users as $user) {

                $html .= "<option value=\"" . $user['username'] . "\" >" . $user['username'] . "</option>" ;

            }

/*
            $html  .= "<td> ";
            $html .= "<select  name='used_by'>
                    <option disabled>Select User</option>";
            foreach ($all_users as $user) {

                $html .= "<option value=\" " . $user['id'] . " \" >" . $user['username'] . "</option>" ;

            }*/
            $html .= "</select>";
           $html .= "</td>";
          $html .= "<td id=\"s_qty\">";
          $html .= "<input type=\"number\" class=\"form-control\" name=\"quantity\" value=\"1\" max='".$result['quantity']."' min='0'>";
          $html  .= "</td>";
         // $html  .= "<td>";
         // $html  .= "<input type=\"text\" class=\"form-control\" name=\"total\" value=\"{$result['sale_price']}\">";
          //$html  .= "</td>";
          $html  .= "<td>";
          $html  .= "<input type=\"date\" class=\"form-control datePicker\" name=\"date\" data-date data-date-format=\"yyyy-mm-dd\">";
          $html  .= "</td>";

          $html  .= "<td>";
          $html  .= "<button type=\"submit\" name=\"use_product\" class=\"btn btn-primary\">Use Item</button>";
          $html  .= "</td>";
          $html  .= "</tr>";

        }
    } else {
        $html ='<tr><td>product name not registered in database</td></tr>';
    }

    echo json_encode($html);
  }
 ?>
