<?php
require_once("originalinit.php");
                                       //ログインしている状態だったら、originallogin.phpにアクセスしても、original.phpへリダイレクトされる(他のページとかにも応用きく)
if(isset($_SESSION["user"]["name"])){ //$_SESSION["user"]["name"]に値が入っているかという式で、入っているという事はこのすぐ下のelseifの式の
  header("location:original.php");    //$_SESSION["user"] = $_POST["user"];を処理済みすなわち、このページにきた事があるという事なのでoriginal.phpに飛ぶ
  exit();
} elseif(!empty($_POST["user"]["name"]) && !empty($_POST["user"]["color"])){ //$_SESSION["user"]["name"]に値が入ってなくても
$_SESSION["user"] = $_POST["user"];                                          //$_POST["user"]["name"]と$_POST["user"]["color"]に値が入っていたら
  header("location:original.php");                                           //original.phpに飛ぶという式このように細かいとこまで指定してあげないといけないので
  exit();                                                                    //elseは使えない
}

$title = "originallogin";
require ("originallayout.php");

$originalcolors = "originalcolor.json";        //jsonファイルを使うための2行のしき
$logincolor = json_decode(file_get_contents($originalcolors));
?>


<div class="login-box">
  <h1 class="login-ttl">LoginPage</h1>
  <form class="login-form" action="originallogin.php" method="post">
    <div class="form-group">
      <label class="login-form__label">Your Name</label>
      <input class="login-form__input" type="text" name="user[name]" />
    </div>
    <div class="form-group">
      <label class="login-form__label">Choise Your Color</label>
      <select class="login-form__select" name="user[color]">
        <?php foreach($logincolor as $logcor):?>
         <option value=<?=$logcor->color?>><?=$logcor->text?></option> <!--<?=$logcor->color?>>の値がuser[color]の[color]として送られる,-->
        <?php endforeach;?>                                             <!--<?=$logcor->text?>は、ログインの時の文字 -->
      </select>
    </div>
    <button class="login__submit" type="submit">Entering a room</button>
  </form>
</div>
</body>
</html>
