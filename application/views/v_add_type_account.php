<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <div style="width:400px;margin:200px auto;background-color: #32BDDC;color: red;border-radius: 10px 10px 10px 10px;text-align: center;"> 
            <h2 style="color:white;font-family: arial;margin-bottom: 40px;background-color:#036C82;padding:5px;border-radius: 10px 10px 0px 0px;"><?php echo $title; ?></h2>
            <?php echo form_open('add/verify_add_type_account'); ?>
            <input style="font-style: italic;width:75%;margin-bottom: 10px;height: 35px;border-radius: 7px 7px 7px 7px;font-size: 20px;" type="text" size="20" id="name" name="name" placeholder="name"/>
            <br/>
            <?php echo validation_errors(); ?>           
            <input style="font-weight: bold;width:75%;margin-bottom: 40px;margin-top:20px;height: 45px;border-radius: 7px 7px 7px 7px;background-color: #055D73;font-size: 25px; color: white;" type="submit" value="Confirm"/>
            </form>
        </div>
    </body>
</html>
