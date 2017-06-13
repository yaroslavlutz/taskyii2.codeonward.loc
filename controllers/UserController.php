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

        if( isset($_POST['Signup']) ){  //or Yii::$app->request->post('Signup')
            //вызываем компонент request,в кот.хранятся результ.запроса $_POST,где есть массив $Signup,сформированный при отправке данных из формы регистрации в /views/user/signup.php
            $signup_model->attributes = Yii::$app->request->post('Signup');  //в $signup_model->attributes ложим данные из $_POST['Signup']
            /*это все равно что написать:
                    $signup_model->username = $_POST['Signup']['username'];
                    $signup_model->email = $_POST['Signup']['email'];
                    $signup_model->password = $_POST['Signup']['password']; и т.д.....*/

            /*проверит с-ва $name,$surname,$username,$email,$birth,$mobile,$password,$create_date при их заполнении данными,на все правила валидации,описанные в модели Signup и вернет true/false*/
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
        /* or this вместо всего того,что выше
        if( $signup_model->load( Yii::$app->request->post() ) && $signup_model->validate() && $signup_model->rules() ) {
            $signup_model->signup();
            return $this->goHome();
        }
        */

        return $this->render('signup', ['signup_model'=>$signup_model]); //return $this->render('signup'); - testing
    } //__/public function actionSignup()


    /** ACTION LOGINATION USER
     * @return
    */
    public function actionLogin(){  //if( isset($_POST['Login']) ){ var_dump($_POST['Login']);die; } - testing
        if( !Yii::$app->user->isGuest ): return $this->goHome(); endif; //if user is not guest(user is logined) - redirect to Home page

        $login_model = new Login();

        if( isset($_POST['Login']) ){ //or Yii::$app->request->post('Login')
            //var_dump($_POST['Login']);die;
            //вызываем компонент request,в кот.хранятся результ.запроса $_POST,где есть массив $Login,сформированный при отправке данных из формы Логинации(авторизации) в /views/user/login.php
            $login_model->attributes = Yii::$app->request->post('Login');  //в $login_model->attributes ложим данные из $_POST['Login']
            /*это все равно что написать:
                    $login_model->email = $_POST['Login']['email'];
                    $login_model->password = $_POST['Login']['password']; */

            /*проверит с-ва $email и $password,при их заполнении данными,на все правила валидации,описанные в модели Login и вернет true/false*/
            if ($login_model->validate()) {  //if data is validate
                //var_dump('Success!');die();
                Yii::$app->user->login( $login_model->getUser() );
                Yii::$app->session->setFlash('success_login', 'Welcome to site '); //write in session a message,that will be output in main.php
                return $this->goHome();  //redirect to Home page
            }
        }
        /* or this вместо всего того,что выше
        if( $login_model->load( Yii::$app->request->post() ) && $login_model->validate() && $login_model->rules() ) {
            $login_model->#####();
            return $this->goHome();
        }
        */

        return $this->render('login', ['login_model'=>$login_model]); //return $this->render('login'); - testing
    }

    /** ACTION LOGOUT USER
     * @return
    */
    public function actionLogout() {
        //if(Yii::$app->user->isGuest){
        Yii::$app->user->logout();
        //return $this->redirect('login');  //redirect to login form page
        return $this->goHome(); //redirect to Home page
        // }
    }


    /** ACTION EDIT PROFILE USER
     * @return
    */
    public function actionProfile(){
        if( Yii::$app->user->isGuest ): return $this->goHome(); endif; //if user is guest(user is not logined) - redirect to Home page

        /*1*/ $profile_model = new Profile();

        /*2*/ if(Yii::$app->user->identity) {  //if user is authentication his data in component Yii::$app->user->identity
            $id_current_user = Yii::$app->user->identity['id']; //take `id` authentication User
        }

        /*3*/ $current_user_data = $profile_model->findModelCurrentUser($id_current_user);
        /* Or: $profile_model = $this->findModelCurrentUserThis($id_current_user); //var_dump($profile_model);
            if use the following method `protected function findModelCurrentUserThis($id)` in this Controller
        */

        /*4*/ if( isset($_POST['User']) ){  //or Yii::$app->request->post('User')
            //var_dump($_POST['User']);die; //or var_dump( Yii::$app->request->post('User') );die;

            //вызываем компонент request,в кот.хранятся результ.запроса $_POST,где есть массив $User,сформированный при отправке данных из формы регистрации в /views/user/profile.php
            $profile_model->attributes = Yii::$app->request->post('User');  //в $profile_model->attributes ложим данные из $_POST['User']
            /*это все равно что написать:
                    $signup_model->username = $_POST['User']['username'];
                    $signup_model->email = $_POST['User']['email'];
                    $signup_model->password = $_POST['User']['password']; и т.д.....*/

            /*4.1*/ /* Upload file(avatar User) to the directory */
            $upload_file_data = $_FILES['User']; //var_dump( $upload_file_data['name']['src_avatar'] ); var_dump( $upload_file_data['tmp_name']['src_avatar']);
            //$profile_model->file = UploadedFile::getInstance($profile_model,'file'); //var_dump($profile_model->file);die;
            //$profile_model->file->saveAs( 'file/'. $upload_file_data['name']['src_avatar'] );
            //$profile_model->src_avatar = '/file/'.$profile_model->file->baseName .'.'.$profile_model->file->extension; //path like: /file/short_song.mp3  //var_dump($model->file->baseName .'.'.$model->file->extension);die;

            $upload_file_path = $profile_model->upload_file_path; //$profile_model->upload_file_path  contains path to directory uploaded file(avatar User)
            $profile_model->uploadFileToDirectory( $upload_file_data['name']['src_avatar'], $upload_file_data['tmp_name']['src_avatar'], $upload_file_path);

            /*4.2*/ /*Pass the path to the loaded file to the class property($profile_model->src_avatar) for further saving it to the DB */
            $profile_model->src_avatar = $upload_file_path.$upload_file_data['name']['src_avatar'];

            /*5*/ $profile_model->SaveProfile($id_current_user);  //save new User to DB
            Yii::$app->session->setFlash('success_profile', 'You have successfully edit profile. Congratulation!'); //write in session a message,that will be output in main.php
            return $this->goHome();  //redirect to Home page
        }

        return $this->render('profile', ['current_user_data'=>$current_user_data]);
    }

    /** ACTION DELETE PROFILE USER
     * @return
     */
    public function actionDelete(){
        if( Yii::$app->user->isGuest ): return $this->goHome(); endif; //if user is guest(user is not logined) - redirect to Home page

        /*1*/ $profile_model = new Profile();

        /*2*/ if(Yii::$app->user->identity) {  //if user is authentication his data in component Yii::$app->user->identity
            $id_current_user = Yii::$app->user->identity['id']; //take `id` authentication User
        }

        /*3*/ $current_user_data = $profile_model->findModelCurrentUser($id_current_user);
        /* Or: $profile_model = $this->findModelCurrentUserThis($id_current_user); //var_dump($profile_model);
            if use the following method `protected function findModelCurrentUserThis($id)` in this Controller
        */

        $profile_model->DeleteProfile($id_current_user);  //delete current User from DB
        Yii::$app->session->setFlash('success_delete_profile', 'You have successfully delete profile. Sign up again!'); //write in session a message,that will be output in main.php
        return $this->goHome();  //redirect to Home page
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


} //__/class UserController
