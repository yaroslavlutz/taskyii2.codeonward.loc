<?php
namespace app\models;
use Yii;
use yii\base\Model;

/* Class Signup - модель-прослойка. Для регистрации(Registration) Юзера.
   Тут мы не наследуем ActiveRecord и не работаем с БД,- т.е. не имеем связи с табл.'user' и ее полями как свойствами этого Класса.
   Тут нам нужно получить данные из формы регистрации(Registration) и обработать их и сохранить - т.е.эта модель для фильтрации и валидации данных и сохранения их в табл.'user' БД*/

/**
    MODEL FOR VALIDATION & FILTERING DATA DURING REGISTRATION USER
*/
class Signup extends Model
{
    public $name;        //user's Name
    public $surname;     //user's Surname
    public $username;    //user's username
    public $email;       //user's email
    public $birth;       //user's date of birth
    public $mobile;      //user's mobile telephone
    public $src_avatar;  //user's avatar (src path to directory)
    public $password;    //user's password
    public $create_date; //current timestamp
    public $role = 0;    //0 - simple user(subscriber);  1- admin


    /**
     * @return array a Labels for inputs form "Signup"
    */
    public function attributeLabels(){
    //подставятся эти лейблы для полей Формы "Signup",если только они не прописаны непосредственно в самой Форме во вьюхе (->label('Username')),тогда отработают те,а эти проигнорируются
        return [
            'name' => Yii::t('app', 'Name field'),
            'surname' => Yii::t('app', 'Surname field'),
            'username' => Yii::t('app', 'Username field'),
            'email' => Yii::t('app', 'Email field'),
            'birth' => Yii::t('app', 'Date of birth field'),
            'mobile' => Yii::t('app', 'Mobile telephone field'),
            'password' => Yii::t('app', 'Password field'),
            //'role' => Yii::t('app', 'Role'),
        ];
    }

    /** RULES VALIDATION PROPERTY
     * @return array the validation rules.
    */
    public function rules(){
        return [
            [ ['name','surname','username','email','birth','mobile','password'],'required' ], //username,email,password must be required!
            ['email','email'],  //email must be valid email format
            ['email','unique','targetClass'=>'app\models\User'],  //email must be unique and don't repeat in DB
            ['username','unique','targetClass'=>'app\models\User'],  //username must be unique and don't repeat in DB
            //для 'targetClass' надо передать ту модель,кот.использ.табл.БД,к кот.мы применяем это правило валидации- в данном случае это model User,кот.взпимод.с табл.'user'
            [ ['username','email', 'password'], 'trim'],  //username,email,password are both trim
            [ 'username', 'string', 'length'=>[2, 35] ], //or ['username','string','min'=>2,'max'=>35]
            [ 'email', 'string', 'length'=>[10, 50] ], //or ['email','string','min'=>10,'max'=>50]
            [ 'password', 'string', 'length'=>[5, 255] ] //or ['password','string','min'=>5,'max'=>35] ,
        ];
    }

    /** SAVE NEW USER to DB
     * @return (bool) true/false
    */
    public function signup(){
        $user = new User();

        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->birth = $this->birth;
        $user->mobile = $this->mobile;
        //hashing password of user
        $user->password  = Yii::$app->getSecurity()->generatePasswordHash($this->password);  //or $user->password = sha1($this->password);
        $user->create_date = time(); //current timestamp
        $user->role = $this->role;

        return $user->save();
    }


}  //__/class Signup