<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <style>
            *{
                margin: 0;
                padding: 0;
            }
        </style>
    </head>
    <body>
        <div style="width:400px;margin:200px auto;background-color: #32BDDC;color: red;border-radius: 10px 10px 10px 10px;text-align: center;"> 
            <h1 style="color:white;font-family: arial;margin-bottom: 40px;background-color:#036C82;padding:5px;border-radius: 10px 10px 0px 0px;">Sign in</h1>
            <?php echo form_open('verifylogin'); ?>
            <input style="font-style: italic;width:75%;margin-bottom: 30px;height: 35px;border-radius: 7px 7px 7px 7px;font-size: 20px;" type="text" size="20" id="username" name="username" placeholder="username"/>
            <br/>
            <input style="font-style: italic;width:75%;margin-bottom: 20px;height: 35px;border-radius: 7px 7px 7px 7px;font-size: 20px;" type="password" size="20" id="passowrd" name="password" placeholder="password"/>
            <br/>
            <?php echo validation_errors(); ?>           
            <input style="font-weight: bold;width:75%;margin-bottom: 40px;margin-top:20px;height: 45px;border-radius: 7px 7px 7px 7px;background-color: #055D73;font-size: 25px; color: white;" type="submit" value="Log in"/>
            </form>
        </div>
    </body>
</html>