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

    /** interface IdentityInterface implementation */
    /* Объект Identity ассоциируется с текущим вошедшим Юзером.Если Юзер не зашел,значение объекта Identity будет NULL. Через Объект Identity можно
        узнать все данные о Юзере,который аутентифицировался и вощел в систему или использовать один из методов IdentityInterface:
                    echo Yii::$app->user->identity['username'];
                    echo Yii::$app->user->identity['email'];
                    echo Yii::$app->user->identity['id'];
                    echo Yii::$app->user->identity->getId();
                    echo date('d-m-Y', Yii::$app->user->identity['created_at']);
    */

    /** @return object Identity by ID user */
    public static function findIdentity($id){
        return self::findOne($id); //object Identity by ID user(from DB)
    }

    /** @return ID current user */
    public function getId(){
        return $this->id;  //return ID current user
    }

    public static function findIdentityByAccessToken($token, $type = null){} //object Identity по секретному ключу,он хранится в поле auth_key
    public function getAuthKey(){}  //возвращает секретный ключ auth_key текущего пользователя
    public function validateAuthKey($authKey){}  //сравнивает полученный ключ с ключом auth_key текущего пользователя

} //__/class User
