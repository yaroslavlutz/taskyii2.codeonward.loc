<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;  //for upload files
/**
 * This is the model class for table "user":
 *  @property integer $id
 *  @property string $name
 *  @property string $surname
 *  @property string $username
 *  @property string $email
 *  @property string $birth
 *  @property string $mobile
 *  @property string $src_avatar
 *  @property string $password
 *  @property string $create_date
 *  @property integer $role
*/

class User extends ActiveRecord implements IdentityInterface //yii\web\IdentityInterface
{


    /** @inheritdoc */
    public static function tableName(){
        return 'user';
    }

    /** @return object Identity by ID user */
    public static function findIdentity($id){
        return self::findOne($id); //object Identity by ID user(from DB)
    }

    /** @return ID current user */
    public function getId(){
        return $this->id;  //return ID current user
    }

    public static function findIdentityByAccessToken($token, $type = null){}
    public function getAuthKey(){}
    public function validateAuthKey($authKey){}

}
