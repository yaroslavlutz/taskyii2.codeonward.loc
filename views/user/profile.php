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
$this->title = 'User`s profile '; //title for browser tabs for this page
$this->params['breadcrumbs'][] = $this->title; //breadcrumbs
?>

<div class="site-index">
    <h1 class="text-center">Edit <?= Html::encode($this->title) ?> <i class="fa fa-cog fa-spin fa-lg" style="color:#C6C6AC;"></i> </h1>
</div>

    <br>
<!-- --------------------------------------------------------------------------------------- -->
<!-- FORM REGISTR USER -->
<div class="row">
    <div class="col-sm-4 col-lg-offset-4">
<?php $form = ActiveForm::begin([
    'id' => 'edit-profile-form-user',
    'options' => ['enctype'=>'multipart/form-data' ],
    'fieldConfig' => [
        //'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'labels_form_signup'],
    ],
]); /*or  $form = ActiveForm::begin();*/

//var_dump($current_user_data);

?>
    <?= $form->field($current_user_data, 'name')->textInput(['autofocus'=>true, 'placeholder'=>'Name'])->label('Name:') ?>
    <?= $form->field($current_user_data, 'surname')->textInput(['placeholder'=>'Surname'])->label('Surname:') ?>
    <?= $form->field($current_user_data, 'username')->textInput(['placeholder'=>'Username'])->label('Username:') ?>
    <?= $form->field($current_user_data, 'email')->textInput(['placeholder'=>'Email'])->label('Email:') ?>

<!--<?//= $form->field($signup_model, 'birth')->textInput(['placeholder'=>'Date of birth'])->label('Date of birth:') ?>-->
    <?= $form->field($current_user_data, 'birth')->textInput(['placeholder'=>'Date of birth'], [DatePicker::widget([
        'model' => $current_user_data,
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

    <?= $form->field($current_user_data, 'mobile')->textInput(['placeholder'=>'Mobile telephone'])->label('Mobile telephone:') ?>
    <?= $form->field($current_user_data, 'src_avatar')->fileInput()->label('<span class="label_upload_track">Upload avatar <span style="font-size:75%">(format is: `gif`, `jpeg`, `jpg`, `png`)</span> </span>');?>
    <?= $form->field($current_user_data, 'password')->passwordInput(['placeholder'=>'Password'])->label('Enter new or confirm old Password:') ?>


    <div class="form-group">
        <?= Html::submitButton('Save Profile', ['name'=>'form-button-edit-profile', 'class'=>'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

        <br/><br/>
        <div class="form-group delete_block">
            <?= Html::a('Delete Profile', ['delete'], ['id'=>'btn_delete_profile_user', 'class'=>'btn btn-danger']);?>
        </div>
    </div>  <!--/<div class="col-sm-4">-->
</div>  <!--/<div class="row"> -->
<!--/FORM REGISTR USER -->


<br/><br/><br/> <hr>
<p style="font-size:85%; color:darkgray;">
    <i>
        <b>(!) Кастомная валидация полей формы ввода данных на js(jQuery).</b> <br/>
        Все поля ввода данных не должны быть пустые. Если какое-то поле пустое, - вывод текстового сообщения Юзеру и блокировка кнопки `Submit`("Save Profile").<br/>
        Также еализована валидация загружаемого файла. Если расширение файла ни `gif`,`jpeg`,`jpg` или `png`' то тоже выводится соответствующее сообщение и блокируется кнопка `Submit`("Save Profile").
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