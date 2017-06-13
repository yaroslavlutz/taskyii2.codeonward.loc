<?php
/* @var $this \yii\web\View */
/* @var $content string */

//use yii\helpers\Html; //было подключено до того как подключил`yii\bootstrap\Html`
use yii\bootstrap\Html;
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
    <?php $this->registerMetaTag(['name' => 'keywords', 'content' => 'Yii2, framework, php']);  ?> <!--Meta tags-->
    <?= Html::csrfMetaTags() ?>
    <?php // $this->title = 'Home'; title for tab this layout ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!--IDENTITY if User logined-->
<?php
echo '<br><br><br><br>';
if(Yii::$app->user->identity) {  //if user is authentication his data in component Yii::$app->user->identity
//    echo '<br>';
//    echo Yii::$app->user->identity['id'];  echo '<br>';
//    echo Yii::$app->user->identity->getId();  echo '<br>';
//    echo Yii::$app->user->identity['name']; echo '<br>';
//    echo Yii::$app->user->identity['surname']; echo '<br>';
//    echo Yii::$app->user->identity['username']; echo '<br>';
//    echo Yii::$app->user->identity['email']; echo '<br>';
//    echo Yii::$app->user->identity['birth']; echo '<br>';
//    echo Yii::$app->user->identity['mobile']; echo '<br>';
//    echo Yii::$app->user->identity['role'];  echo '<br>';
//    echo Yii::$app->user->identity['src_avatar'];  echo '<br>';
//    echo date('d-m-Y', Yii::$app->user->identity['create_date']);
}
?>
<!--/IDENTITY if User logined-->

<!--SESSION DATA-->
<?php
//$session = Yii::$app->session; var_dump($session->get('logined_user')); - если что-то писали в сессию

if( $msg_signup = Yii::$app->session->getFlash('success_signup') ):  //flash message from session for successfully signed up of user
    echo '<p class="flash_msg text-center"><span class="text-success">'.$msg_signup.'</span></p>';
endif;

if( $msg_login = Yii::$app->session->getFlash('success_login') ):  //flash message from session for successfully login of user
    echo '<p class="flash_msg text-center"><span class="text-success">'.$msg_login.' <b><i>'.Yii::$app->user->identity['username'].'!</i></b> </span></p>';
endif;

if( $msg_profile = Yii::$app->session->getFlash('success_profile') ):  //flash message from session for successfully edit profile of user
    echo '<p class="flash_msg text-center"><span class="text-success">'.$msg_profile.'</span></p>';
endif;

if( $msg_delete_profile = Yii::$app->session->getFlash('success_delete_profile') ):  //flash message from session for successfully delete profile of user
    echo '<p class="flash_msg text-center"><span class="text-success">'.$msg_delete_profile.'</span></p>';
endif;
?>
<!--/SESSION DATA-->


<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'LITTUS', //<a href="http://i.ua" target="_blank">LITTUS</a>
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right main_navbsr'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index'], 'linkOptions'=>['class'=>'glyphicon glyphicon-folder-open'], 'options'=>['class'=>'custom_bg_li_navmenu']], //'options'=>['class'=>'custom_bg_li_navmenu glyphicon glyphicon-folder-open']
            ['label' => 'About', 'url' => ['/site/about'], 'linkOptions'=>['class'=>'glyphicon glyphicon-folder-open'], 'options'=>['class'=>'custom_bg_li_navmenu']],
            ['label' => 'Contact', 'url' => ['/site/contact'], 'linkOptions'=>['class'=>'glyphicon glyphicon-folder-open'], 'options'=>['class'=>'custom_bg_li_navmenu']],

            !Yii::$app->user->isGuest ? ['label'=>'Profile', 'url'=>['/user/profile'], 'linkOptions'=>['class'=>'glyphicon glyphicon-cog'], 'options'=>['class'=>'custom_bg_li_navmenu']]  : '',

            Yii::$app->user->isGuest ? (
                //['label' => 'Login', 'url' => ['/site/login']]
            ['label'=>'Login', 'url'=>['/user/login'], 'linkOptions'=>['class'=>'glyphicon glyphicon-user'],'options'=>['class'=>'custom_bg_li_navmenu']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout ('.Yii::$app->user->identity->username.')',
                    ['class' => 'btn btn-link logout glyphicon glyphicon-user']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

<!-- USER PERSONAL DATA -->
    <section id="user_personal_cabinet">
        <div class="container">
            <p class="pull-right user_personal_data_container">
            <?php
            if(Yii::$app->user->identity):
                echo ( Yii::$app->user->identity['src_avatar'] == NULL ||
                       Yii::$app->user->identity['src_avatar'] == 'uploads/' ) ? Html::img('@web/img/default_avatar_user.png') : Html::img('@web/'.Yii::$app->user->identity['src_avatar']);
                echo ' '.Yii::$app->user->identity['name'].' ';
                echo Yii::$app->user->identity['surname'][0].'.';
            endif;
            ?>
            </p>
        </div>
    </section>
<!--/USER PERSONAL DATA -->


    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left"><?=Html::img('@web/img/php-elephant-icon4-mini2.png');?></p>
        <p class="pull-left copyrighted">&copy; LITTUS <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>