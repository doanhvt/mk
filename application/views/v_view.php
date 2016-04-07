<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 15px;
                text-align: center;
            }
            th{
                background-color: #72A942;
            }
            td{
                background-color: #C7DEB3;
            }
            a{
                text-decoration: none;
                vertical-align: -5px;
            }
        </style>
    </head>
    <body style="font-family:arial;text-align: center;">
        <h1><a href="<?php echo site_url("home"); ?>">==> Go back home <==</a></h1>
        <h1><?php echo $title; ?></h1>
        <table align="center" border="1" style="width:70%">
            <tr>
                <th>STT</th>
                <th>Username</th>               
                <th>Secret Question</th>
                <th>Account Type</th>
                <th>Action</th>
            </tr>
            <?php
            if ($list_account) {
                for ($i = 0; $i < count($list_account); $i++) {
                    ?>
                    <tr>
                        <td><?php echo $i + 1; ?></td>
                        <td><?php echo $list_account[$i]->username; ?></td>
                        <td><?php echo  $list_account[$i]->secret_question; ?></td>
                        <td><?php echo $list_account[$i]->name; ?></td>
                        <td><a href="<?php echo site_url("view/view_password/" . $list_account[$i]->id); ?>">View password & answer</a></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
        <div style="text-align: center;margin-top:20px;">
            <?php echo $links ?>
        </div>
    </body>
</html>