<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Форма и аккаунты</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <style>
.error {
  border: 2px solid #aa0000; 
background: #F8E4DF; 
padding: 15px; 
border-radius: 9px; 
font-size: 12px;
}
.error_text {
  margin: 4px;
  text-decoration-line: underline;
  text-decoration-color: red;
}
    </style>
  </head>
  <body>
      <header>
        <p class="header-text">my form</p>
      </header>
      <main>
        <div>
                <form action="" method="POST">
                  
                <label>Введите Ваше имя: <br />
                  <input name="fio" 
                         <?php if ($errors['fio']) {print 'class="error"';} ?> value="<?php print $values['fio']; ?>"/>
                </label><br />
                <?php if ($errors['fio']) {print $messages[0];} ?>

                <label>Введите свою почту: <br />
                  <input name="email"
                  <?php if ($errors['email']) {print 'class="error"';} ?> value="<?php print $values['email']; ?>"
                    type="email" />
                </label><br />
                <?php if ($errors['email']) {print $messages[1];} ?>

                <p>Укажите год своего рождения: <br>
                  <select name="birthday" 
                          <?php if ($errors['birthday']) {print 'class="error"';} ?>>
                    <?php 
                    for ($i = 1922; $i <= 2022; $i++) {
                      printf('<option value="%d">%d год</option>', $i, $i);}
                    ?><?php
                    for ($i = 2023; $i >= 1922; $i--) {
                      if ($i == $values['birthday']) {
                        printf('<option selected value="%d">%d год</option>', $i, $i);
                      } else {
                        printf('<option value="%d">%d год</option>', $i, $i);
                      }
                    }?></select>
                     
                  Укажите Ваш пол:
                <br />
                <?php if ($errors['gender']) 
{print '<div class="error">';} ?>
                <label><input type="radio"
                  name="gender" value="Male" 
                              <?php if($values['gender']=='Male') print "checked";else print ""; ?> />
                  мужской
                </label>
                <label><input type="radio"
                  name="gender" value="Female" 
                              <?php echo ($values['gender']=='Female') ?  "checked" : "" ;  ?> />
                  женский
                </label>
                <label><input type="radio"
                  name="gender" value="Other"
                              <?php echo ($values['gender']=='Other') ?  "checked" : "" ;  ?> />
                  другое
                </label>
                <br />
                <?php if ($errors['gender']) {print '</div>';print $messages[3];} ?>


                Сколько у Вас конечностей?<br />
                <?php if ($errors['limbs']) {print '<div class="error">';} ?>
                <label><input type="radio"
                  name="limbs" value="0" 
                              <?php echo ($values['limbs']=='0') ?  "checked" : "" ;  ?>/>
                  0
                </label>
                <label><input type="radio"
                  name="limbs" value="1" 
                              <?php echo ($values['limbs']=='1') ?  "checked" : "" ;  ?>/>
                  1
                </label>
                <label><input type="radio"
                  name="limbs" value="2" 
                              <?php echo ($values['limbs']=='2') ?  "checked" : "" ;  ?>/>
                  2
                </label>
                <label><input type="radio"
                  name="limbs" value="3" 
                              <?php echo ($values['limbs']=='3') ?  "checked" : "" ;  ?>/>
                  3
                </label>
                <label><input type="radio"
                  name="limbs" value="4" 
                              <?php echo ($values['limbs']=='4') ?  "checked" : "" ;  ?>/>
                  4
                </label>
                <label><input type="radio"
                  name="limbs" value="5+" 
                              <?php echo ($values['limbs']=='5+') ?  "checked" : "" ;  ?>/>
                  5+
                </label>
                <br />
                <?php if ($errors['limbs']) {print '</div>';print $messages[4];} ?>
                <?php echo (in_array("0",$ability)) ?  "selected" : ""  ; ?>
                <label>
                  Какую суперсилу вы хотите/имеете?
                  <br />
                  <select name="ability[]"
                    multiple="multiple" <?php if ($errors['ability']) {print 'class="error"';} ?>>
                    <option value="0" <?php echo (in_array("0",$ability)) ?  "selected" : ""  ; ?>>Летать</option>
                    <option value="1" <?php echo (in_array('1',$ability)) ?  "selected" : ""  ; ?>>Читать</option>
                    <option value="2" <?php echo (in_array('2',$ability)) ?  "selected" : ""  ; ?>>Писать</option>
                  </select>
                </label><br />
                <?php if ($errors['ability']) {print $messages[5];} ?>

                <label>
                  Расскажите немного о себе: <br />
                  <textarea name="biography" <?php if ($errors['biography']) {print 'class="error"';} ?>><?php echo $values['biography'] ;  ?></textarea>
                </label><br />
                <?php if ($errors['biography']) {print $messages[6];} ?>
                <br />
                <label><input type="checkbox"
                  name="contract" <?php if ($errors['contract']) {print 'class="error"';} ?>/>
                  С контрактом ознакомлен
                </label><br />
                <?php if ($errors['contract']) {print $messages[7];} ?>

                <input id="submit" type="submit" value="ok" />
              </form>
          </div>

              <a href="login.php">logout/login</a>
      </main>
      <?php
if (!empty($messages)) {
print $messages[8];
print $messages[9];
if(!empty($_SESSION['login']))
printf($messages[10], $_SESSION['login'], $_SESSION['uid']);
}
?>
  </body>
</html>
