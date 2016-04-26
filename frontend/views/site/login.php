<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('http://res.wx.qq.com/connect/zh_CN/htmledition/js/wxLogin.js');
$js = <<<EOF
var obj = new WxLogin({
    id:"login_container",
    appid: "{$wechatOptions['app_id']}",
    scope: "snsapi_login",
    redirect_uri: "{$wechatOptions['oauth']['callback']}",
    state: "aaa",
    style: "",
    href: ""
  });
EOF;
$this->registerJs($js);
?>
<div class="site-login">


    <div class="row">
        <div class="col-lg-7 col-md-7">

            <div class="login_container" id="login_container">

            </div>
        </div>

    </div>
</div>
