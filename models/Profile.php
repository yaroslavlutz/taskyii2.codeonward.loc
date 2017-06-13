<?php
namespace app\models;
use Yii;
use yii\base\Model;
//use app\models\User;
use yii\web\UploadedFile;  //for upload files

/* Class Profile - модель-прослойка. Для вывода данных в форму редактирования(Edit) данных зарегистрированного и залогиненного Юзера.
*/

/**
    MODEL FOR VALIDATION & FILTERING DATA DURING REGISTRATION USER
*/
class Profile extends Model
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

    public $upload_file_path ='uploads/'; //path to directory uploaded file (avatar User)

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
            [['file'], 'file'],
            [ 'password', 'string', 'length'=>[5, 255] ] //or ['password','string','min'=>5,'max'=>35] ,
        ];
    }


    /** SAVE DATA of USER(after edit) to DB
     * @param integer $id_current_user - id current authentication User
     * @return (bool) true/false
    */
    public function SaveProfile($id_current_user){
        //$user_profile = new User();

        $user_profile = $this->findModelCurrentUser($id_current_user); //Or: $user_profile = User::findOne($id_current_user);

        $user_profile->name = $this->name;
        $user_profile->surname = $this->surname;
        $user_profile->username = $this->username;
        $user_profile->email = $this->email;
        $user_profile->birth = $this->birth;
        $user_profile->mobile = $this->mobile;
        //hashing password of user
        $user_profile->password  = Yii::$app->getSecurity()->generatePasswordHash($this->password);  //or $user->password = sha1($this->password);
        $user_profile->src_avatar = $this->src_avatar;

        //$user_profile->create_date = time(); //current timestamp
        //$user_profile->role = $this->role;

        $user_profile->save();
    }


    /**
     * Delete an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_current_user
     * @return mixed
     */
    public function DeleteProfile($id_current_user){
        $user_profile = $this->findModelCurrentUser($id_current_user); //Or: $user_profile = User::findOne($id_current_user);
        $user_profile->delete();
    }


    /** Finds the User model based on its primary key value.
     *  If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model by `id`
     * @throws NotFoundHttpException if the model cannot be found
    */
    public function findModelCurrentUser($id){ //$profile = new User();
        if( ($user_profile = User::findOne($id)) !== NULL ):
            return $user_profile;  //var_dump($user_profile);die;
        else:
            throw new NotFoundHttpException('The requested page does not exist.');
        endif;
        /* Or simply: $user_profile = User::findOne($id); return $user_profile; */
    }


    /** Upload file(avatar User) to the directory. The path to the directory is determined by the property of this Class  - public $upload_file_path
     * @param string $name_file -
     * @param string $tmp_name_file
     * @param string $upload_file_path
    */
    public function uploadFileToDirectory($name_file, $tmp_name_file, $upload_file_path){
        $name_file = basename($name_file);
        $destination = $upload_file_path.$name_file;
        return move_uploaded_file($tmp_name_file, $destination);
    }

}  //__/class Profile