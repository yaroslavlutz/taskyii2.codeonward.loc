<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;  //use yii\bootstrap\ActiveForm;
use yii\base\Model;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Menu;
use yii\jui\DatePicker;

/** ______________________________________________________REGISTRATION FORM */
?>

<?php
$this->title = 'Registration'; //title for browser tabs for this page
$this->params['breadcrumbs'][] = $this->title; //breadcrumbs
?>

<div class="site-index">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
</div>

    <br>
<!-- --------------------------------------------------------------------------------------- -->
<!-- FORM REGISTR USER -->
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
    <?= $form->field($signup_model, 'name')->textInput(['autofocus'=>true, 'placeholder'=>'Name'])->label('Name:') ?>
    <?= $form->field($signup_model, 'surname')->textInput(['placeholder'=>'Surname'])->label('Surname:') ?>
    <?= $form->field($signup_model, 'username')->textInput(['placeholder'=>'Username'])->label('Username:') ?>
    <?= $form->field($signup_model, 'email')->textInput(['placeholder'=>'Email'])->label('Email:') ?>

<!--<?//= $form->field($signup_model, 'birth')->textInput(['placeholder'=>'Date of birth'])->label('Date of birth:') ?>-->
    <?= $form->field($signup_model, 'birth')->textInput(['placeholder'=>'Date of birth'], [DatePicker::widget([
        'model' => $signup_model,
        'attribute' => 'birth',
        'class'=>'form-control',
        //'name'=>'attributeName',
        'language'=>'en', //ru|en
        'dateFormat'=>'yyyy-MM-dd', //yyyy-MM-dd|yyyy MM dd|MM/dd/yyyy|medium(d MM, y)|full(like a Thursday, December 1, 2016)||
        //'placeholder'=>'Choose date', //not work
        //'size' => 'lg',  not work
        'clientOptions' => [
            //'defaultDate'=>'01-01-1985',
            'changeMonth'=>true,
            'changeYear'=>true,
            'yearRange'=>'1970:2010',
            //'minDate' => '-1m',
            //'maxDate' => '+1m +1w',
            'showButtonPanel'=>true,
            //'autoSize'=>true,
            'duration'=>'slow',
        ]
    ])] )->label('Date of birth:') ?>

    <?= $form->field($signup_model, 'mobile')->textInput(['placeholder'=>'Mobile telephone'])->label('Mobile telephone:') ?>
    <?= $form->field($signup_model, 'password')->passwordInput(['placeholder'=>'Password'])->label('Password:') ?>

    <div class="form-group">
        <?= Html::submitButton('Sign Up', ['name' => 'form-button-registr', 'class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
    </div>  <!--/<div class="col-sm-4">-->
</div>  <!--/<div class="row"> -->
<!--/FORM REGISTR USER -->


<br/><br/><br/>
<p style="font-size:85%; color:darkgray;">
    <i>(!) Валидация полей формы ввода данных коробочная <b>(предоставленная методами Yii2)</b>.<br/>
    Все поля ввода данных не должны быть пустые. Если какое-то поле пустое, - вывод текстового сообщения Юзеру и по нажатию на кнопку `Submit`("Sign Up") данные Формы отправлены Не будут.
        <br/> <b>`Username field`</b> и <b>`Email field`</b> проверка на существование дубликатов в БД! <br/>
        После успешной регитстрации Юзера ему на <b>e-mail</b>, который он указал при регистрации, отправляется письмо-уведомление о его регистрации на этом сайте.
        Отправка письма работает в тестовом режиме(development) - письма уходят не на реальный почтовый ящик а на эмулятор Yii2 и попадают в <b>/runtime/mail</b>
    </i>
</p>


    <!-- --------------------------------------------------------------------------------------- -->
    <br><br><br><br><br><br><br>
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