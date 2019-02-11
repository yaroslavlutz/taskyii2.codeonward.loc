<?php
namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Signup; //include model Signup.php
use app\models\Login; //include model Login.php
use app\models\Profile; //include model Profile.php
//use app\models\User;
use yii\web\UploadedFile; //for upload files

class UserController extends Controller  //or - \yii\web\Controller
{
    /*
    public function actionIndex(){
        return $this->render('index');
    }
    */

    /** ACTION REGISTRATION USER
     * @return
    */
    public function actionSignup(){  //if( isset($_POST['Signup']) ){ var_dump($_POST['Signup']);die; }   - testing
        $signup_model = new Signup();

        if( Yii::$app->request->post('Signup') ){
            $signup_model->attributes = Yii::$app->request->post('Signup');
            if ($signup_model->validate()) {  //if data is validate - login User in DB & redirect to Home page
                $signup_model->signup();  //save new User to DB

                /*Send mail registered User */
                Yii::$app->mailer->compose()
                    ->setFrom('admin@mail.com')
                    ->setTo( $_POST['Signup']['email'] )
                    ->setSubject('Your registration on `taskyii2.codeonward.loc` site')
                    ->setTextBody('Welcome ' .$_POST['Signup']['username']. '!\n Thank you for registered on our site!')
                    ->setHtmlBody('<b>Welcome ' .$_POST['Signup']['username']. '!\n Thank you for registered on our site!</b>')
                    ->send();

                Yii::$app->session->setFlash('success_signup', 'You have successfully signed up!'); //write in session a message,that will be output in main.php
                return $this->goHome();  //redirect to Home page
            }
        }

        return $this->render('signup', ['signup_model'=>$signup_model]); //return $this->render('signup'); - testing
    } //__/public function actionSignup()


    /** ACTION LOGINATION USER
     * @return
    */
    public function actionLogin(){
        if( !Yii::$app->user->isGuest ): return $this->goHome(); endif;

        $login_model = new Login();

        if( Yii::$app->request->post('Login') ){
            $login_model->attributes = Yii::$app->request->post('Login');  //в $login_model->attributes ложим данные из $_POST['Login']
            if ($login_model->validate()) {  //if data is validate
                Yii::$app->user->login( $login_model->getUser() );
                Yii::$app->session->setFlash('success_login', 'Welcome to site '); //write in session a message,that will be output in main.php
                return $this->goHome();  //redirect to Home page
            }
        }

        return $this->render('login', ['login_model'=>$login_model]); //return $this->render('login'); - testing
    }

    /** ACTION LOGOUT USER
     * @return
    */
    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->goHome();
    }


    /** ACTION EDIT PROFILE USER
     * @return
    */
    public function actionProfile(){
        if( Yii::$app->user->isGuest ): return $this->goHome(); endif;

        $profile_model = new Profile();

        if(Yii::$app->user->identity) { 
            $id_current_user = Yii::$app->user->identity['id']; 
        }

        $current_user_data = $profile_model->findModelCurrentUser($id_current_user);

        if( isset($_POST['User']) ){
            $profile_model->attributes = Yii::$app->request->post('User');

            $upload_file_data = $_FILES['User'];
            $upload_file_path = $profile_model->upload_file_path;
            $profile_model->uploadFileToDirectory( $upload_file_data['name']['src_avatar'], $upload_file_data['tmp_name']['src_avatar'], $upload_file_path);

            $profile_model->src_avatar = $upload_file_path.$upload_file_data['name']['src_avatar'];

            $profile_model->SaveProfile($id_current_user);  //save new User to DB
            Yii::$app->session->setFlash('success_profile', 'You have successfully edit profile. Congratulation!'); //write in session a message,that will be output in main.php
            return $this->goHome();
        }

        return $this->render('profile', ['current_user_data'=>$current_user_data]);
    }

    /** ACTION DELETE PROFILE USER
     * @return
     */
    public function actionDelete(){
        if( Yii::$app->user->isGuest ): return $this->goHome(); endif; //if user is guest(user is not logined) - redirect to Home page

        $profile_model = new Profile();
        if(Yii::$app->user->identity) {
            $id_current_user = Yii::$app->user->identity['id'];
        }

        $current_user_data = $profile_model->findModelCurrentUser($id_current_user)

        $profile_model->DeleteProfile($id_current_user);
        Yii::$app->session->setFlash('success_delete_profile', 'You have successfully delete profile. Sign up again!');
        return $this->goHome();
    }


    /** Finds the User model based on its primary key value.
     *  If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model by `id`
     * @throws NotFoundHttpException if the model cannot be found
    */
    protected function findModelCurrentUserThis($id){
        if( ($model_user = User::findOne($id)) !== null ):
            return $model_user;
        else:
            throw new NotFoundHttpException('The requested page does not exist!');
        endif;
    }
}
