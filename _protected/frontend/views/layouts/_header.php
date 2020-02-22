<?php   
use Yii\helpers\Url;
?>

<header id="header" class="alt">
    <h1><a href="index.html">Spectral</a></h1>
    <nav id="nav">
        <ul>
            <li class="special">
                <a href="#menu" class="menuToggle"><span>Menu</span></a>
                <div id="menu">
                    <ul>
                        <li><a href="<?=Url::to(['index'])?>">home</a></li>
                        <li><a href="<?=Url::to(['generic'])?>">generic</a></li>
                        <li><a href="<?=Url::to(['elements'])?>">elements</a></li>
                        <li><a href="<?=Url::to(['signup'])?>">signup</a></li>
                        <li><a href="<?=Url::to(['login'])?>">login</a></li>
                        <li><a href="<?=Url::to(['logout'])?>">logout</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</header>