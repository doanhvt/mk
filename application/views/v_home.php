<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title;?></title>
        <style>
            *{
                margin: 0;
                padding: 0;
            }
            .grow { transition: all .2s ease-in-out; }
            .grow:hover { transform: scale(1.4); }
        </style>
    </head>
    <body style="background-color: #E9EAED;font-family: arial;">
        <h1 style="color:blue;text-align: center;font-family: arial;margin-top: 70px;margin-bottom: 90px;"><?php echo $title; ?></h1>
        <div style="width:300px; margin:0 auto;">
            <?php
            if ($list_permission) {
                foreach ($list_permission as $item){
                    ?>
                    <div class="grow" style="background-color:green;height: 100px;margin-top: 10px;text-align: center;border-radius: 10px 10px 10px 10px">
                        <a style="line-height: 100px;text-decoration: none;color:white;font-size:30px;" href="<?php echo site_url($item); ?>"><?php echo $item;?></a>
                    </div>             
                    <?php
                }
            }
            ?>
        </div>
    </body>
</html>