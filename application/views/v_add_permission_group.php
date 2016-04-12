<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <form action="<?php echo site_url("permission/add_permission_group_data"); ?>" method="post">
            <label>Name of permission :</label>
            <input type="text" name="permission-name" value=""/>
            <?php echo validation_errors(); ?> 
            <br>
            <?php
                foreach($list_permission as $item){ ?>
                <label><?php echo $item->permission; ?></label> <input type="checkbox" name="<?php echo $item->permissionID; ?>" value="<?php echo $item->permissionID;?>"/><br>
            <?php
                }
            ?>
                <input type="submit" value="Submit"/>
        </form>
    </body>
</html>