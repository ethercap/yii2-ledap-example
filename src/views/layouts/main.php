<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

\widget\assets\LedapAppAsset::register($this);
\ethercap\ledap\helpers\JsHelper::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body id="page-top">
<?php $this->beginBody() ?>

  <!-- Page Wrapper -->
  <div id="wrapper">
    <?=$this->render('ledap-sidebar')?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <?=$this->render('ledap-header'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid" id="app">
          <?= $content ?>
        </div>
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>©2014-2015 易项科技 版权所有</span><br/><br/>
            <span></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top" style="display:inline;">
    <i class="fas fa-angle-up"></i>
  </a>
  <?=\ethercap\watermark\WaterMark::widget([
    'alpha' => 0.1,           //水印透明度，要求设置在大于等于0.003
    'fontSize' => '18px',
  ]); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
