<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="<?php echo base_url("public/js/main.js"); ?>"></script>
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
    <body style="text-align:center;font-family:arial;">
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
                        <td><?php echo $list_account[$i]->secret_question; ?></td>
                        <td><?php echo $list_account[$i]->name; ?></td>
                        <td><input type="checkbox" name="status" value="<?php echo $list_account[$i]->id; ?>" /></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
        <div style="text-align: center;margin-top:20px;">
            <?php echo $links; ?>
        </div>
        <input style="display: none;" name="url" value="<?php echo site_url("delete/delete_account"); ?>" />
        <button style="color:white;padding:10px 20px 10px 20px;margin-top:20px;border-radius: 5px 5px 5px 5px;background-color: blue;" id="delete" >DELETE</button>
    </body>
</html>