<?php
$page_title = 'Sale Report';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(3);

$all_users = find_all('users');
$all_products=find_all('products');
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="panel">
      <div class="panel-heading">

      </div>
      <div class="panel-body">
          <form class="clearfix" method="post" action="use_by_date_report_process.php">
            <div class="form-group">
              <label class="form-label">Date Range</label>
                <div class="input-group">
                  <input type="text" class="datepicker form-control" name="start-date" placeholder="From">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-menu-right"></i></span>
                  <input type="text" class="datepicker form-control" name="end-date" placeholder="To">
                </div>



            <br>
<!--            <div class="input-group">-->
<!--                <select class="form-control" name="user-categorie">-->
<!--                    <option value="">Select user</option>-->
<!--                    --><?php // foreach ($all_users as $user): ?>
<!--                        <option value="--><?php //echo (int)$user['id'] ?><!--">-->
<!--                                    --><?php //echo $user['name'] ?><!--</option>-->
<!--                            --><?php //endforeach; ?>
<!--                        </select>-->
<!--                    </div>-->
<!---->
<!---->
<!---->
<!--            </div>-->
<!---->
<!--                <div class="input-group">-->
<!--                    <select class="form-control" name="product-categorie">-->
<!--                        <option value="">Select Product</option>-->
<!--                        --><?php // foreach ($all_products as $product): ?>
<!--                            <option value="--><?php //echo (int)$product['id'] ?><!--">-->
<!--                                --><?php //echo $product['name'] ?><!--</option>-->
<!--                        --><?php //endforeach; ?>
<!--                    </select>-->
<!--                </div>-->
<!--                </div>-->
<!--            </div>-->



            <div class="form-group">
                 <button type="submit" name="submit" class="btn btn-primary">Generate Report</button>
            </div>
          </form>
      </div>

    </div>
  </div>

</div>
<?php include_once('layouts/footer.php'); ?>
