_____________________________________DataBase access:
DB NAME: taskyii2_codeonward
DB PASS: 1111 
DB LOGIN: root

_____________________________________Admin-Panel access:
Name: Vasua
Surname: Batareikin
Username: admin
E-mail: admin@gmail.com
Date of birth: 1970-01-01
Mobile telephone: 000-0000000
Password: 55555
________________________________Test account User access:
Name: Homer
Surname: Simpson
Username: fatHomer
E-mail: homer@gmail.com
Date of birth: 1959-05-10
Mobile telephone: 111-1111111
Password: 123456

Name: John
Surname: Smith
Username: englishman
E-mail: englishman@mail.uk
Date of birth: 1970-11-05
Mobile telephone: 222-2222222
Password: 331429

Name: Jack
Surname: Sparrow
Username: captain
E-mail: captain@gmail.com
Date of birth: 2003-12-31
Mobile telephone: 333-3333333
Password: 123456789

Name: Nicola
Surname: Orehov
Username: orehoff
E-mail: orehoff@i.ua
Date of birth: 1988-09-20
Mobile telephone: 252-5252525
Password: 00000
//===========================================================================================


________________________________Platform:
Yii2

____________________________________Used:
PHP / CSS3 / HTML5 / JavaScript+jQuery /

- Cсылка на GitHub repository: ####################################


----------------------------Tasks:
Файл .pdf с описанием тасков по этому приложению: taskyii2.codeonward.loc/TasksInfo))/ТЗ.pdf

________________________INFO:
- Model User.php - основная модель для работы с табл.`user`. Свойства класса(модели) User.php ассоциированы с соответствующими полями `user`,т.о.мы через
  эти свойства модели User.php имеем доступ к соответствующим полям `user`.

- Регистрация Юзера выполнена через модель-прослойку Signup.php. Для регистрации(Registration) Юзера.
     Тут мы не наследуем ActiveRecord и не работаем с БД,- т.е. не имеем связи с табл.'user' и ее полями как свойствами этого Класса.
     Тут нам нужно получить данные из формы регистрации(Registration) и обработать их и сохранить - т.е.эта модель для фильтрации и валидации данных и сохранения их в табл.'user' БД.
     При успешной регистрации Юзера ему на почту, на указанныи им тут же адресс при регистрации, отправляется приветственное письмо. Отправка почты работает в тестовом режиме(development)
     - письма уходят не на реальный почтовый ящик а на эмулятор Yii2 и попадают в /runtime/mail. Чтобы уходили на реальный почтовый ящик в
     /config/web.php настройку 'useFileTransport' выставить в false !!

- Аутентификация(Логинация) Юзера выполнена через модель-прослойку Login.php. Для логинации(Login in) Юзера.
    Тут мы не наследуем ActiveRecord и не работаем с БД,- т.е. не имеем связи с табл.'user' и ее полями как свойствами этого Класса.
    Тут нам нужно получить данные из формы логинации(Login in) и обработать их - т.е.эта модель для фильтрации и валидации данных
- Аутентификация(Логинация) Юзера сделана через interface IdentityInterface implementation in model User.php
- Аутентификация(Логинация) может осуществляться как по введенному пользователем email(при его регистрации),так и по введенному username(при его регистрации).

- Редактирование своего профиля(Profile User): http://taskyii2.codeonward.loc/user/profile  -выполнена через модель-прослойку Profile.php. Для редактирования(Edit) Profile User.
    В ней `public function findModelCurrentUser($id)` - берет данные Юзера из табл.`user` по конкретному `id` Юзера;
          `public function SaveProfile($id_current_user)` - передача данных из POST формы редактирования данных Юзера в соответствующие свойства модели `User` и сохранения этих данных(из POST из
           формы редактирования данных Юзера) в табл.`user` БД.
    В Контроллере /controllers/UserController.php отрабатывает метод `public function actionProfile()`, который получает `id` текущего залогиненого Юзера(через Объект Identity):
    Yii::$app->user->identity['id'];
    Потом через метод `findModelCurrentUser($id)` получаем все данные текущего Юзера и рендерим их в представление (profile.php) где и выводим в Форму редактирования.
    Если нажимаем `Submit` этой формы, то тут же в этом методе Контроллера обрабатываем POST-дпанные и передаем их методу SaveProfile($id_current_user), который сохранит(UPDATE) нам их
    по текущему `id` Юзера.
    Также реализована кастомная валидация полей формы вввода. Поля не должны быть пустые. Если какое-то поле пустое, - вывод текстового сообщения Юзеру и блокировка кнопки `Submit`("Save Profile").
    (!) при выводе в Форму редактирования данных Юзера для редактирования поле с паролем пустое. Это сделано специально на jQuery чтобы пароль вводился заново как есть и проходил
    снова процедуру хеширования в чистом виде, как новый пароль(процедура хеширования в `public function SaveProfile($id_current_user)` в моделе-прослойке Profile.php).
    Отдельно на jQuery реализована валидация загружаемого файла. Если расширение файла ни `gif`,`jpeg`,`jpg` или `png`' то тоже выводится соответствующее сообщение и блокируется кнопка `Submit`("Save Profile").

- Удаление профиля Юзера с подтверждением - public function DeleteProfile($id_current_user) в моделе-пролойке Profile.php. И в Контроллере /controllers/UserController.php
    отрабатывает метод `public function actionDelete()`.
