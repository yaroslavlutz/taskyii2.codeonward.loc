<?php
use yii\bootstrap\Html;

/* @var $this yii\web\View */
//______________________________________________________________________________________________________________________

$this->title = 'Home';
?>
<div class="site-index">

    <!--Information content in tabs -->
    <div class="tabbable"> <!-- Only required for left/right tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Личные данные</a></li>
            <li><a href="#tab2" data-toggle="tab">Профессиональные навыки(Skills)</a></li>
            <li><a href="#tab3" data-toggle="tab">Опыт работы. Portfolio</a></li>
        </ul>

        <div class="tab-content my_tab_content">
            <div class="tab-pane active" id="tab1">
                <span class="text-center span_for_title">Личные данные</span>

                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="avatar_container">
                            <?=Html::img('@web/uploads/lutskyi_Y_avatar.jpg');?>
                        </div>
                    </div> <!--/class="col-2"-->

                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                        <p class="description_txt">
                            Ярослав Луцкий (Yaroslav Lutskyi), 06 января 1986г.р.
                        </p>
                        <p class="description_txt">
                            г.Запорожье / г.Днепропетровск
                        </p> <br/>

                        <p class="description_txt"> <kbd>E-mail:</kbd> athlonnus1@gmail.com </p>
                        <p class="description_txt"> <kbd>Skype:</kbd>  yaroslav.lutskyi </p>
                        <p class="description_txt"> <kbd>M.phone 1:</kbd>  050 0 541 853 </p>
                        <p class="description_txt"> <kbd>M.phone 2:</kbd>  068 812 1605 </p>
                    </div> <!--/class="col-10"-->
                </div> <!--/class="row"-->

            </div>

            <div class="tab-pane fade" id="tab2">
                <span class="text-center span_for_title">Профессиональные навыки(Skills)</span>
                <p class="">
                    - Языки программирования/библиотеки: <kbd>HTML5</kbd>, <kbd>CSS3</kbd>, <kbd>javaScript+jQuery</kbd>, <kbd>PHP</kbd>, <kbd>PHP ООП</kbd>, <kbd>SQL</kbd> <br/>
                    - CSS-n-javaScript-frameworks: <kbd>Bootstrap3</kbd>, <kbd>Materialize</kbd>, <kbd>Angular.js</kbd> <br/>
                    - CMS and PHP-frameworks: <kbd>CMS `Wordpress`</kbd>, <kbd>PHP-framework `Yii2`</kbd>, <kbd>PHP-framework `Laravel`(на стадии освоения)</kbd> <br/>
                    - Системы контроля версий: <kbd>Git</kbd>, <kbd>Bitbucket</kbd>
                </p>
                <br/>
                <ul class="list_descr_skills">
                    <li>Могу работать в разных ОС таких как windows, Linux. Работаю в ОС <b>`linux Mint (KDE)`</b>; </li>
                    <li>Практическое применение объектно-ориентированного программирования <b>(ООП)</b>; </li>
                    <li>Знание принципов построения и работы сайтов и серверов;</li>
                    <li>Умение прочесть чужой код и документацию на английском языке;</li>
                    <li>Написание чистого кода;</li>
                    <li>Кроссбраузерная,адаптивная верстка;</li>
                    <li>Работаю с <b>Bootstrap3</b>, <b>Materialize</b>, <b>PHP-framework `Yii2`</b>, <b>Angular.js</b>, <b>CMS `Wordpress` (есть опыт работы и сделанные мною сайты-магазины на `Woocommerce`)</b>; </li>
                    <li>Написание плагинов, тем для <b>CMS `Wordpress`</b>; </li>
                    <li>Знания и работа с <b>Photoshop</b>, <b>AI</b>; </li>
                    <li>Умение работать с системами контроля версий <b>Git, Bitbucket</b>; </li>
                    <li>Готов изучать для работы frameworks: <b>Laravel</b>, <b>Symfony</b>, <b>Angular 2.0.</b> </li>
                </ul>
            </div>

            <div class="tab-pane fade" id="tab3">
                <span class="text-center span_for_title">Опыт работы. Portfolio</span>
                <p class="">
                    Опыт работы в IT 1,5 лет.
                </p>

                1) Ссылки на последние мои проекты на СMS `Wordpress`:
                <ul class="list_links_done_projects">
                    <li> <a href="http://littus.zzz.com.ua/truck.warranty.loc/" target="_blank">http://littus.zzz.com.ua/truck.warranty.loc/</a> </li>
                    <li> <a href="http://littus.zzz.com.ua/miami.spa.loc/" target="_blank">http://littus.zzz.com.ua/miami.spa.loc/</a> </li>
                    <li> <a href="http://itlittus.zzz.com.ua/www.pdso.loc/" target="_blank">http://itlittus.zzz.com.ua/www.pdso.loc/</a> </li>
                    <li> <a href="http://pag.05.aws3.net/" target="_blank">http://pag.05.aws3.net/</a> </li>
                    <li> <a href="http://scaranomarine.com/" target="_blank">http://scaranomarine.com/</a> </li>
                    <li> <a href="http://grich.com.ua/" target="_blank">http://grich.com.ua/</a> </li>
                </ul>

                2) Примеры кода PHP & SQL можно глянуть в моем репозитории на <b>github.com</b>: <br/>
                <ul class="list_links_done_projects">
                    <span style="font-size:91%; color:darkgray; font-style:italic">
                        Там много не нужного и просто сохраненных полу-законченных проектов, но есть несколько работоспособных проектов на чистом PHP, где я сам пытался реализовать вручную (в качестве собственного обучения) <b>MVC-модель</b> работу приложения, так и написанные с использованием <b>PHP framework Yii2</b>.
                    </span>
                    <li> <a href="https://github.com/velozalet/yii.loc" target="_blank">проект на Yii2</a> </li>
                    <li> <a href="https://github.com/velozalet/taskyii2.flexi.loc" target="_blank">проект на Yii2</a> </li>
                    <li> <a href="https://github.com/velozalet/yii2_basic_shop" target="_blank">проект на Yii2 (делал интернет-магазин в качестве освоения фреймворка)</a> </li>
                    <li> <a href="https://github.com/velozalet/mvc_step.loc" target="_blank">нативный PHP + SQL (реализация MVC-модели вручную.)</a> </li>
                    <li> <a href="" target="_blank">данный ПРОЕКТ</a> </li>
                </ul>

                <kbd>(!)</kbd>
                <span style="font-size:91%; color:darkgray; font-style:italic">
                    Почти в каждом проекте в корне лежит файл <b>`ReadMe.txt` </b>в котором я описываю что это за приложение, что в нем реализовано и что пытался сделать и как. Сразу извиняюсь, там много кода с очень излишними комментариями, но это учебные проекты я по ним учился и осваивал Yii2.
                </span>
                <br/><br/>

                <kbd>athlonnus1@gmail.com</kbd>
            </div>
        </div>
    </div>
    <!--Information content in tabs -->
    <!--///////////////////////////////////////////////////////////////////////// -->

    <!-- Information content in Accordion effect -->
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><span class="text-center span_for_title">Личные данные</span></a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">  <!--class='in' -делает по умолчанию эту вкладку с контентом сразу открытой.Если class='in' убрать,-то изначально эта вкладка будет открыта-->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="avatar_container">
                                <?=Html::img('@web/uploads/lutskyi_Y_avatar.jpg');?>
                            </div>
                        </div> <!--/class="col-2"-->

                        <div class="col-xs-12">
                            <p class="description_txt">
                                Ярослав Луцкий (Yaroslav Lutskyi), 06 января 1986г.р.
                            </p>
                            <p class="description_txt">
                                г.Запорожье / г.Днепропетровск
                            </p> <br/>

                            <p class="description_txt"> <kbd>E-mail:</kbd> athlonnus1@gmail.com </p>
                            <p class="description_txt"> <kbd>Skype:</kbd>  yaroslav.lutskyi </p>
                            <p class="description_txt"> <kbd>M.phone 1:</kbd>  050 0 541 853 </p>
                            <p class="description_txt"> <kbd>M.phone 2:</kbd>  068 812 1605 </p>
                        </div> <!--/class="col-10"-->
                    </div> <!--/class="row"-->
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><span class="text-center span_for_title">Профессиональные навыки(Skills)</span></a>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body">
                    <p class="">
                        - Языки программирования/библиотеки: <kbd>HTML5</kbd>, <kbd>CSS3</kbd>, <kbd>javaScript+jQuery</kbd>, <kbd>PHP</kbd>, <kbd>PHP ООП</kbd>, <kbd>SQL</kbd> <br/>
                        - CSS-n-javaScript-frameworks: <kbd>Bootstrap3</kbd>, <kbd>Materialize</kbd>, <kbd>Angular.js</kbd> <br/>
                        - CMS and PHP-frameworks: <kbd>CMS `Wordpress`</kbd>, <kbd>PHP-framework `Yii2`</kbd>, <kbd>PHP-framework `Laravel`(на стадии освоения)</kbd> <br/>
                        - Системы контроля версий: <kbd>Git</kbd>, <kbd>Bitbucket</kbd>
                    </p>
                    <br/>
                    <ul class="list_descr_skills">
                        <li>Могу работать в разных ОС таких как windows, Linux. Работаю в ОС <b>`linux Mint (KDE)`</b>; </li>
                        <li>Практическое применение объектно-ориентированного программирования <b>(ООП)</b>; </li>
                        <li>Знание принципов построения и работы сайтов и серверов;</li>
                        <li>Умение прочесть чужой код и документацию на английском языке;</li>
                        <li>Написание чистого кода;</li>
                        <li>Кроссбраузерная,адаптивная верстка;</li>
                        <li>Работаю с <b>Bootstrap3</b>, <b>Materialize</b>, <b>PHP-framework `Yii2`</b>, <b>Angular.js</b>, <b>CMS `Wordpress` (есть опыт работы и сделанные мною сайты-магазины на `Woocommerce`)</b>; </li>
                        <li>Написание плагинов, тем для <b>CMS `Wordpress` любой сложности</b>; </li>
                        <li>Знания и работа с <b>Photoshop</b>, <b>AI</b>; </li>
                        <li>Умение работать с системами контроля версий <b>Git, Bitbucket</b>; </li>
                        <li>Готов изучать для работы frameworks: <b>Laravel</b>, <b>Symfony</b>, <b>Angular 2.0.</b> </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><span class="text-center span_for_title">Опыт работы. Portfolio</span></a>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body">
                    <p class="">
                        Опыт работы в IT 1,5 лет.
                    </p>

                    1) Ссылки на последние мои проекты на СMS `Wordpress`:
                    <ul class="list_links_done_projects">
                        <li> <a href="http://littus.zzz.com.ua/truck.warranty.loc/" target="_blank">http://littus.zzz.com.ua/truck.warranty.loc/</a> </li>
                        <li> <a href="http://littus.zzz.com.ua/miami.spa.loc/" target="_blank">http://littus.zzz.com.ua/miami.spa.loc/</a> </li>
                        <li> <a href="http://itlittus.zzz.com.ua/www.pdso.loc/" target="_blank">http://itlittus.zzz.com.ua/www.pdso.loc/</a> </li>
                        <li> <a href="http://pag.05.aws3.net/" target="_blank">http://pag.05.aws3.net/</a> </li>
                        <li> <a href="http://scaranomarine.com/" target="_blank">http://scaranomarine.com/</a> </li>
                        <li> <a href="http://grich.com.ua/" target="_blank">http://grich.com.ua/</a> </li>
                    </ul>

                    2) Примеры кода PHP & SQL можно глянуть в моем репозитории на <b>github.com</b>: <br/>
                    <ul class="list_links_done_projects">
                    <span style="font-size:91%; color:darkgray; font-style:italic">
                        Там много не нужного и просто сохраненных полу-законченных проектов, но есть несколько работоспособных проектов на чистом PHP, где я сам пытался реализовать вручную (в качестве собственного обучения) <b>MVC-модель</b> работу приложения, так и написанные с использованием <b>PHP framework Yii2</b>.
                    </span>
                        <li> <a href="https://github.com/velozalet/yii.loc" target="_blank">проект на Yii2</a> </li>
                        <li> <a href="https://github.com/velozalet/taskyii2.flexi.loc" target="_blank">проект на Yii2</a> </li>
                        <li> <a href="https://github.com/velozalet/yii2_basic_shop" target="_blank">проект на Yii2 (делал интернет-магазин в качестве освоения фреймворка)</a> </li>
                        <li> <a href="https://github.com/velozalet/mvc_step.loc" target="_blank">нативный PHP + SQL (реализация MVC-модели вручную.)</a> </li>
                        <li> <a href="" target="_blank">данный ПРОЕКТ</a> </li>
                    </ul>

                    <kbd>(!)</kbd>
                    <span style="font-size:91%; color:darkgray; font-style:italic">
                        Почти в каждом проекте в корне лежит файл <b>`ReadMe.txt` </b>в котором я описываю что это за приложение, что в нем реализовано и что пытался сделать и как. Сразу извиняюсь, там много кода с очень излишними комментариями, но это учебные проекты я по ним учился и осваивал Yii2.
                    </span>
                    <br/><br/>

                    <kbd>athlonnus1@gmail.com</kbd>
                </div>
            </div>
        </div>
    </div>
    <!--/Information content in Accordion effect -->

</div>  <!--/div class="site-index"-->
<br/>

</div>
