<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?=toRoute('/')?>" class="site_title"><i class="fa fa-code"></i></a>
        </div>
        <?php if (!Yii::$app->user->isGuest):?>
        <?php $user = \common\models\User::findOne(Yii::$app->user->id);?>
        <!-- menu prile quick info -->
        <div class="profile">
            <div class="profile_info">
                <span>Welcome</span>
                <h2><?=$user->user_profile->full?></h2>
            </div>
        </div>
        <?php endif;?>
        <!-- /menu prile quick info -->
        <div class="clearfix"></div>
        <br />
        <?php
            $langs = \common\models\Lang::find()->where('id != :current_id', [':current_id' => \common\models\Lang::getCurrent()->id])->all();
            foreach ($langs as $lang){
                echo \yii\helpers\Html::a($lang->name, '/backend/'.$lang->url.'/'.Yii::$app->getRequest()->pathInfo, ['style' => 'margin-right: 10px; margin-left: 15px; color: white']);
            }
        ?>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-users"></i> Users<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a class="fa fa-user" href="<?=toRoute('/user/index')?>">Users</a>
                            </li>
                            <li><a class="fa fa-user" href="<?=toRoute('/user-profile/index')?>">Profiles</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-graduation-cap"></i> Course<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a class="fa fa-graduation-cap" href="<?=toRoute('/category/index')?>">Category</a>
                            </li>
                            <li><a class="fa fa-university" href="<?=toRoute('/course/index')?>">Course</a>
                            </li>
                            <li><a class="fa fa-info" href="<?=toRoute('/course-information/index')?>">Course Info</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-graduation-cap"></i> News<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a class="fa fa-graduation-cap" href="<?=toRoute('/news/index')?>">News</a>
                            </li>
                            <li><a class="fa fa-university" href="<?=toRoute('/news-information/index')?>">News Info</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-users"></i>Contacts<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a class="fa fa-user" href="<?=toRoute('/feedback/index')?>">Feedback</a>
                            </li>
                            <li><a class="fa fa-user" href="<?=toRoute('/comments/index')?>">Comments</a>
                            </li>
                            <li><a class="fa fa-user" href="<?=toRoute('/contact/index')?>">Contact</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="fa fa-picture-o" href="<?=toRoute('/gallery/index')?>">Gallery</a>
                    </li>
                    <li><a class="fa fa-globe" href="<?=toRoute('/lang/index')?>">Languages</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a href="" data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a href="<?=toRoute('/site/logout')?>" data-method="post" class="pull-right" data-toggle="tooltip"
                data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>