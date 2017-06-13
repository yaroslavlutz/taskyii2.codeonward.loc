<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;  //use yii\bootstrap\ActiveForm;
use yii\base\Model;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Menu;

/* @var $this yii\web\View */
/** ______________________________________________________LOGIN FORM */
?>

<?php
$this->title = 'Login in'; //title for browser tabs for this page
$this->params['breadcrumbs'][] = $this->title; //breadcrumbs
?>

    <div class="site-index">
        <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    </div>

    <br>
    <!-- --------------------------------------------------------------------------------------- -->
    <!-- FORM LOGIN USER -->
    <div class="row">
        <div class="col-sm-4 col-lg-offset-4">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form-user',
                'options' => ['class' => 'form-horizontal'],
                'fieldConfig' => [
                    //'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'labelOptions' => ['class' => 'labels_form_signup'],
                ],
            ]); /*or  $form = ActiveForm::begin();*/
            ?>
            <?= $form->field($login_model, 'email')->textInput(['autofocus'=>true, 'placeholder'=>'Email/Username'])->label('Email/Username') ?>
            <?= $form->field($login_model, 'password')->passwordInput(['placeholder'=>'Password'])->label('Password')  ?>

            <div class="form-group">
                <?= Html::submitButton('Login in', ['name' => 'form-button-login', 'class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>  <!--/<div class="col-sm-4">-->
    </div>  <!--/<div class="row"> -->
    <!--/FORM LOGIN USER  'url' => ['/site/admin1'] -->

    <div class="row">
        <div class="col-sm-4 col-lg-offset-4">
            <?= Html::a( Html::Button('Registration',['class' => 'btn btn-danger']) , ['/user/signup'], ['class'=>'id_registr_link pull-right']) ?>
        </div>
    </div>

    <br/><br/><br/><br/><br/>
    <p style="font-size:85%; color:darkgray;">
        <i>(!) Валидация полей формы ввода данных коробочная <b>(предоставленная методами Yii2)</b>.<br/>
            Все поля ввода данных не должны быть пустые. Если какое-то поле пустое, - вывод текстового сообщения Юзеру и по нажатию на кнопку `Submit`("Login in") данные Формы отправлены Не будут.<br/>
            Авторизация может осуществляться как по <b>`e-mail`</b> так и по <b>`username`</b> Юзера, введенных при его регистрации.</b>
        </i>
    </p>

    <!-- --------------------------------------------------------------------------------------- -->
    <br><br><br><br><br><br><br><br><br><br>
    <div class="row">
        <code> <sub><b>Path to this view: </b> <?= __FILE__ ?> </sub></code>
        <br>
        <!--а так можно рендерить другие views в эту view -->
        <?php //echo \Yii::$app->view->renderFile('@app/views/site/hello.php'); ?>
        <?php //echo \Yii::$app->view->renderFile('@app/views/site/about.php'); ?>
        <!--/а так можно рендерить другие views в эту view -->

        <code> <sub><b>ID Controller: </b> <?= $this->context->id ?> </sub></code> <br>
        <code> <sub><b>Controller Class: </b> <?= get_class($this->context) ?> </sub></code> <br>
        <code> <sub><b>This is the view content for action: </b> <?= $this->context->action->id ?> </sub></code> <br>
        <code> <sub><b>ID module: </b> <?= $this->context->module->id ?> </sub></code>
    </div>

<?php
//var_dump($message);
?>