<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
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
        <div style="width:800px;height: 508px;margin: 0 auto;">
            <div>
                <div class="grow" style="width: 396px;height: 250px;float:left;background-color: blue;text-align: center;border: 2px solid white;border-radius: 15px;">
                    <a href="<?php echo site_url("add/add_account"); ?>" style="line-height: 250px;font-size: 40px;color: white;text-decoration: none;">ACCOUNT</a>
                </div>
                <div class="grow" style="width: 396px;height: 250px;float:left;background-color: grey;text-align: center;border: 2px solid white;border-radius: 15px;">
                    <a href="<?php echo site_url("add/add_type_account");?>" style="line-height: 250px;font-size: 40px;color: white;text-decoration: none;">TYPE OF ACCOUNT</a>
                </div>
                <div style="clear: both;"></div>
            </div>
        </div>
    </body>
</html>