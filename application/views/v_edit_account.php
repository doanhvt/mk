<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <div style="width:400px;margin:200px auto;background-color: #32BDDC;color: red;border-radius: 10px 10px 10px 10px;text-align: center;"> 
            <h2 style="color:white;font-family: arial;margin-bottom: 40px;background-color:#036C82;padding:5px;border-radius: 10px 10px 0px 0px;"><?php echo $title; ?></h2>
            <?php echo form_open("edit/verify_edit_account/".$account->id); ?>
            <input style="font-style: italic;width:75%;margin-bottom: 10px;height: 35px;border-radius: 7px 7px 7px 7px;font-size: 20px;" type="text" size="20" id="username" name="username" placeholder="username" value="<?php echo $account->username; ?>"/>
            <br/>
            <input style="font-style: italic;width:75%;margin-bottom: 10px;height: 35px;border-radius: 7px 7px 7px 7px;font-size: 20px;" type="password" size="20" id="password" name="password" placeholder="password" value="<?php echo pack("H*", $account->password); ?>"/>
            <br/>
            <input style="font-style: italic;width:75%;margin-bottom: 10px;height: 35px;border-radius: 7px 7px 7px 7px;font-size: 20px;" type="password" size="20" id="re-password" name="re-password" placeholder="re-password"/>
            <br/>
            <input style="font-style: italic;width:75%;margin-bottom: 10px;height: 35px;border-radius: 7px 7px 7px 7px;font-size: 20px;" type="text" size="20" id="secret-question" name="secret-question" placeholder="secret-question" value="<?php echo $account->secret_question; ?>"/>
            <br/>
            <input style="font-style: italic;width:75%;margin-bottom: 10px;height: 35px;border-radius: 7px 7px 7px 7px;font-size: 20px;" type="text" size="20" id="answer" name="answer" placeholder="answer" value="<?php echo $account->answer; ?>"/>
            <br/>
            <select style="font-style: italic;width:75%;margin-bottom: 10px;height: 35px;border-radius: 7px 7px 7px 7px;font-size: 20px;" name="typeaccount">
                <?php
                foreach ($type_account_list as $item) {
                    if ($item->name == $account->name) {
                        ?>
                        <option selected="selected" value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
                        <?php
                    } else {
                        ?>
                        <option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>   
                        <?php
                    }
                    ?>
                    <?php
                }
                ?>
            </select>
            <?php echo validation_errors(); ?>           
            <input style="font-weight: bold;width:75%;margin-bottom: 40px;margin-top:20px;height: 45px;border-radius: 7px 7px 7px 7px;background-color: #055D73;font-size: 25px; color: white;" type="submit" value="Confirm"/>
        </form>
    </div>
</body>
</html>
