<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>


<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Aloha',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    
    //สร้างตัวแปร เพื่อทำ Sub Manu
    $report = [
                ['label' => 'รายงาน 1', 'url' => ['/site/report1']],
                ['label' => 'รายงาน 2', 'url' => ['/site/report2']],
              ];
    
    //สร้างตัวแปร เพื่อทำ Sub Manu
    $setting= [
                ['label' => 'ผู้ใช้งาน', 'url' => ['/site/setting1']],
                ['label' => 'กลุ่มผู้ใช้', 'url' => ['/site/setting2']],
              ];
    
    echo Nav::widget([ //ส่วนของเมนู
        'options' => ['class' => 'navbar-nav navbar-right'],
        //'encodeLabels' => flase ,//ต้องใส่คำสั่งนี้ ถึงจะแทรสัญลักษณ์หน้าเมนูได้
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'test', 'url' => ['/site/test']],
            ['label' => 'ระบบรายงาน', 'items' => $report],  //เรียกใช้ sub manu
            ['label' => 'ระบบสมาชิก', 'items' => $setting], //เรียกใช้ sub manu
            
            
            
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
