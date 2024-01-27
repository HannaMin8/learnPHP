<?php
declare(strict_types=1);

echo '<pre>';
$errors = array();

foreach ($_POST as $key =>$value) {
    $value = htmlspecialchars($value);//предотвращает вставки html-кода, html-код будет выведен как обычный текст
    $name = $_POST['name'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    if (!isset($name) || $name == null || strlen($name) === 0) {
        $errors['name'] = 'The field is required';
    }
    if (!isset($password) || $password == null || strlen($password) === 0 || 
    !isset($repeatPassword) || $repeatPassword== null || strlen($repeatPassword) === 0) {
        $errors['pwd1'] = 'The field is required';
    } else {
        if (strlen($password) < 8 || strlen($repeatPassword) < 8) {
            $errors['pwd2'] = 'Password must contain 8 or more characters';
        }
    }
    if ($password !== $repeatPassword) {
        $errors['pwd3'] = 'Password mismatch';
    }
    if (!is_numeric($age)) {
        $errors['age1'] = 'Not a number';       
        }else {
            if (!is_int($age)){
                $errors['age2'] = 'Not an integer';       
            }  
        }   
    if (empty($errors)) {
        echo "$key: $value <br>";
    }
 
    
}
//var_dump($_POST);
echo '</pre>';
?>

<form method="post" enctype="application/x-www-form-urlencoded" action="">
Name:<br>
<?php
    if (isset($errors['name'])) {
        echo "<div style='color: red;'>{$errors['name']}</div>";
    }
?>
<input type="text" name="name"><span style='color: red;'>*</span><br><br>
Surname:<br>
<input type="text" name="surname"><br><br>
Email:<br>
<?php
    if (isset($errors['email'])) {
        echo "<div style='color: red;'>{$errors['email']}</div>";
    }
?>
<input type="email"  name="email" ><span style='color: red;'>*</span><br><br>
Password:<br>
<?php
    if (isset($errors['pwd1'])) {
        echo "<div style='color: red;'>{$errors['pwd1']}</div>";
    }
    if (isset($errors['pwd2'])) {
        echo "<div style='color: red;'>{$errors['pwd2']}</div>";
    }
?>
<input type="password"  name="password"><span style='color: red;'>*</span><br><br>
Repeat password:<br>
<?php
    if (isset($errors['pwd1'])) {
        echo "<div style='color: red;'>{$errors['pwd1']}</div>";
    }
    if (isset($errors['pwd2'])) {
        echo "<div style='color: red;'>{$errors['pwd2']}</div>";
    }
?>
<?php
    if (isset($errors['pwd3'])) {
        echo "<span style='color: red;'>{$errors['pwd3']}</span>";
    }
?><br>
<input type="password" name="repeatPassword"><span style='color: red;'>*</span><br><br>
About me:<br>
<textarea name="aboutMe"  value="aboutMe:"></textarea><br><br>
Age:<br>
<?php
  if (isset($errors['age1'])) {
    echo "<span style='color: red;'>{$errors['age1']}</span>";
    }
    if (isset($errors['age2'])) {
        echo "<span style='color: red;'>{$errors['age2']}</span>";
    }
?><br>
<input type="text" name="age"><br><br>
My favorite color:<br>
<input type="color" name="favoriteColor:"><br><br>
Country of birth:
<select name="countryOfBirth" value="countryOfBirth:"><br><br>
    <option>USA</option>
    <option>Ukraine</option>
    <option>Denmark</option>
</select><br><br>
Visited countries:<br>
<select name="visitedCountries" multiple="multiple" value="visitedCountries:">
    <option>England</option>
    <option>Czech</option>
    <option>Canada</option>
    <option>Poland</option>
    <option>Japan</option>
    <option>Ukraine</option>
</select><br><br>
How often do you play computer games:<br>
<input type="radio" name="playComputerGames" value="everyDay">
<label for="option1">Every day</label>
<input type="radio" name="playComputerGames" value="OnceAweek">
<label for="option2">Once a week</label>
<input type="radio" name="playComputerGames" value="OnceAmonth">
<label for="option3">Once a month</label>
<input type="radio" name="playComputerGames" value="rarely">
<label for="option4">Rarely</label>
<input type="radio" name="playComputerGames" value="never">
<label for="option5">Never</label><br><br>
I promise I'll be a good girl:
<input type="checkbox" name="promise" value="yes"><br><br>
<button type="submit" name="submit" value="submit">Submit</button>

</form>