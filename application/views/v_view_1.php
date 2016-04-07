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
        </style>
    </head>
    <body style="font-family:arial;">
        <?php 
            var_dump($results);
            echo $links;
            ?>
    </body>
</html>