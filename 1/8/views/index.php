<html>
<head>
</head>
<style type="text/css">
    body {
        background-image: url("img/fon.jpg");
        background-size: 100% auto;
        color: aliceblue;
    }
    div {
        background: rgba(82, 82, 82, 0.4);
        float: left;
        outline: 1px solid #EEE;
        margin: 5px;
    }
    .centr {
        float: none;
        margin: auto 138px;
        outline: none;
        height: 410px;
    }
</style>
<body>
    <?php include __DIR__.'/../forms/userInOut.php'; ?>
    <?php include __DIR__.'/../forms/add.php'; ?>
    <div class="centr">
        <?php foreach ($items as $item): ?>
            <div>
                <p style="margin-left: 30px; height: 3px; margin-top: 5px;"><?php echo $item['name'] ?></p>
                <img src="<?php echo $item['path'] ?>" height="170" />
            </div>
        <?php endforeach;?>
    </div>
</body>
</html>