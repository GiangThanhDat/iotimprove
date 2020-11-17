        


<div class="container-fluid">
  <!-- Content Row -->
  <div class="row">
    <div class="col-xl-12 col-lg-12">
      <!-- Area Chart -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Chart</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="myAreaChart"></canvas>
          </div>
          <hr>
        </div>
      </div>
    </div>
  </div>
<?php   
  $masterController = new controller;               
  $CamBienModel = $masterController->model("cambien");
  $DaiLuongModel = $masterController->model("dailuongdo");
  $sensorMeasuresList = json_decode($data['sensorMeasuresList'],true);
  $keys = json_decode($data['keys'],true);
  $ma_tram = $keys['ma_tram'];
  $dai_luong = json_decode($DaiLuongModel->getByKey($keys['ma_dailuong']),true);
?>
  <hr>
  <!-- <div class="row"> -->
    <div class="card-columns ">
      <?php foreach ($sensorMeasuresList as $value): ?>
        <?php 
      // prepare data
      // print_r($CamBienModel->getByKey($value['ma_cambien']));      
      // print_r($DaiLuongModel->getByKey($value['ma_dailuong']));
        $cambienObj = json_decode($CamBienModel->getByKey($value['ma_cambien']),true);
        $dailuongObj = json_decode($DaiLuongModel->getByKey($value['ma_dailuong']),true);   
        $ma_cambien = $cambienObj['ma_cambien'];
        $ma_dailuong = $dailuongObj['ma_dailuong'];

        ?>      
        <!-- style="width: 610px;" -->
        <div class="card text-white text-center" style="width:300px;height: 300px;" > 
          <div class="card-header bg-success">
            <div class="row">
              <div class="col-md-10 bg-white text-black rounded">
                <p style="color: black;">Bảng Giá Trị-Đo Lường</p>
                <!-- <p style="color: black;"><?= $ma_cambien ?>_<?= $ma_dailuong ?></p> -->
              </div>
            </div>
          </div>
          <div class="card-body text-white">
            <table class="table responsive border">
              <tr>
                <th class="border"><p class="card-text"><?= $cambienObj['ten_cambien'] ?></p>
                </th>
                <th class=" border"><?= $dailuongObj['ten_dailuong'] ?></th>
              </tr>
            </table>              
          </div>
          <div class="card-footer bg-info">
            <a href="collect/chart/<?= $ma_tram ?>/<?= $ma_cambien ?>/<?= $ma_dailuong ?>" class="btn btn-primary btn-sm">Xem chi tiết</a>
          </div>        
        </div>  
      <?php endforeach ?>
    </div>
  <!-- </div> -->
  <hr>
</div>        
<script type="text/javascript">
  const keys = <?= $data['keys'] ?>;
  const dai_luong = "<?= $dai_luong['ten_dailuong'] ?>";
</script>
<!-- Page level custom scripts -->
<script src="./public/js/demo/chart-area-demo.js"></script>
