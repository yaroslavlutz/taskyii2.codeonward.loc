<?php
namespace app\models;
use Yii;
use yii\base\Model;

/* Class Login - модель-прослойка. Для логинации(Login in) Юзера.
Тут мы не наследуем ActiveRecord и не работаем с БД,- т.е. не имеем связи с табл.'user' и ее полями как свойствами этого Класса.
Тут нам нужно получить данные из формы логинации(Login in) и обработать их - т.е.эта модель для фильтрации и валидации данных */

/**
    MODEL FOR VALIDATION & FILTERING DATA DURING LOGIN IN USER
*/
class Login extends Model
{
    public $username; //user's username
    public $email;    //user's email
    public $password; //user's password


    /** RULES VALIDATION PROPERTY
     * @return array the validation rules.
    */
    public function rules(){
        return [
            [ ['email','password'],'required' ], //email,password must be required!
            //['email','email'],  //email must be valid email format - чтобы можно было реализовать логинацию как по email,так и по username.Иначе в поле email не введешь ничего кроме строки с '@'
            [ ['email', 'password'], 'trim'],  //post_title and post_text are both trim
            ['password','validatePassword'], //password is validated by function validatePassword()
        ];
    }

    /**
     * @return array a Labels for inputs form "Login in"
    */
    public function attributeLabels(){
    //подставятся эти лейблы для полей Формы "Login in",если только они не прописаны непосредственно в самой Форме во вьюхе (->label('Username')),тогда отработают те,а эти проигнорируются
        return [
            'email' => Yii::t('app', 'Email/Username field'),
            'password' => Yii::t('app', 'Password field'),
            //'role' => Yii::t('app', 'Role'),
        ];
    }


    /** VALIDATE PASSWORD
     * @param (string) $attribute - the attribute currently being validated
     * @param (array) $params - the additional name-value pairs given in the  public function rules()
    */
    public function validatePassword($attribute, $params){  //var_dump($user);die;
        if( !$this->hasErrors() ):  //if not errors in validation
            //$user = User::findOne(['email'=>$this->email]);  //find user by email - этот функционал вынес в отд.функцию ниже getUser()
            $user = $this->getUser(); //find user by email or username

            //if this user not find or passwords don't match,- add custom error 'Incorrect or non-existent username or password'
            if( !$user || !Yii::$app->getSecurity()->validatePassword($this->password, $user->password) ) { //or ($user->password != sha1($this->password) ) - if hashing password user in DB(in model Signup) through function sha1()
                $this->addError($attribute, 'Incorrect or non-existent email or password');
            }
        endif;
    }


    /** GET SINGLE USER from DB by email OR by username
     * @param (string) $check - user's email or usernsme
    */
    public function getUser()
    { //['email'=>$this->email]
        if( is_string($this->email) && preg_match('/@/i', $this->email) == 1 ) { //check that it is entered by the User username or email
            //or $user = Yii::$app->db->createCommand("SELECT * FROM user WHERE email='$this->email'")->queryOne();
            //or return User::find()->where(['email'=>$this->email])->one();
            return User::findOne(['email' => $this->email]); //find User by email
        }
        else{
            $this->username = $this->email;
            //or return $this->_user = User::findByUsername($this->username);
            //or return User::find()->where(['username'=>$this->username])->one();
            return User::findOne(['username' => $this->username]); //find User by username
        }

    }

}  //__/class Login