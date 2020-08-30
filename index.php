<?php
require_once("originalinit.php");

require_once("originalchat_data.php");

$user = $_SESSION["user"];
if(!empty($user["name"])){
//var_dump($user);
$userName = $user["name"];
$userColor = $user["color"];

$title = "original-chat";
require_once("originallayout.php");
} else {
    header("location:originallogin.php");
    exit();
}
//var_dump($user)
//var_dump($_POST["message"]);  
?>


    <div class="box">
        <div class="head">
            <h1 class="chat-ttl">ChatPage</h1>
            <a href="originallogout.php" class="logout-btn">Log Out</a>
        </div>
        <div class="chat-box">
            <div class="chat-info">
                <p>Name</p>
                <p><?= $userName ?></p>
                <p>Color</p>
                <p><?= $userColor ?></p>
            </div>
            <ul class="chat-list">
                <?php if (empty($messages)) : ?>
                    <?php echo ('Theres no chat. Please enter the room and greet us!') ?>
                <?php else : ?>
                    <!-- 後で実際のチャットの一覧表示 -->
                    <?php foreach ($messages as $msg) : ?>
                        <li style="color:<?= $msg->color ?>">
                            <p><?= $msg->name ?></p>
                            <p><?= $msg->message ?></p>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
        <div class="foot">
            <form class="chat-form" action="originalinput.php" method="post" class="chat-form">
                <input type="hidden" name="message[name]" value="<?= $userName ?>">
                <input type="hidden" name="message[color]" value="<?= $userColor ?>">
                <input class="chat-input" type="text" name="message[message]" />
                <button class="chat-button" type="submit">Entering a room</button>
            </form>
        </div>
</body>

</html>
