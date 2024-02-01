<?php
declare(strict_types=1);

echo '<pre>';
$errors = array();


foreach ($_POST as $key =>$value) {
    $_POST[$key] = htmlspecialchars($value);//предотвращает вставки html-кода, html-код будет выведен как обычный текст
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];
    $age = $_POST['age'];
    $color = $_POST['color'];
    $country = $_POST['country'];
    $visitedCountries = $_POST['visitedCountries'];
    $games = $_POST['games'];
    
    if (!isset($name) || $name === null || strlen($name) === 0) {
        $errors['name'] = 'The field is required';
    }
    if (!isset($password) || $password === null || strlen($password) === 0) {
        $errors['pwd'] = 'The field is required';
    }else{  
        if (strlen($password) < 8) {
        $errors['pwdCont'] = 'Password must contain 8 or more characters';
        }
    }
    if (!isset($repeatPassword) || $repeatPassword === null || strlen($repeatPassword) === 0) {
        $errors['pwdRep'] = 'The field is required';
    }else{ if (strlen($repeatPassword) < 8) {
        $errors['pwdRepCont'] = 'Password must contain 8 or more characters';
        }
    }
    if (strlen($password) >= 8 && strlen($repeatPassword) >= 8 && $password !== $repeatPassword) {
        $errors['pwdMis'] = 'Password mismatch';
    }
    if (!is_numeric($age)) {
        $errors['ageNum'] = 'Not a number';       
    }
    if ($age <= 0) {
        $errors['age'] = 'Number must be > 0';       
    }
    if (ctype_xdigit($color)) {
        $errors['color'] = 'Select a color from the options';       
    }
    if (!isset($country) || $country === null || strlen($country) === 0) {
        $errors['enterCountry'] = 'The field is required';
    }
    if (!in_array($country, ["AU","CA","CZ","DK","FI","JP","PL","SE","USA","UA"])){
        $errors['country'] = 'Enter your country correctly';
    }
    if (!in_array($visitedCountries, ["AU","CA","CZ","DK","FI","JP","PL","SE","USA","UA"])){
        $errors['visitedCountries'] = 'Select countries from the options';
    }
    if (!in_array($games, ["Every day", "Once a week", "Once a month", "Rarely", "Never"])){
        $errors['games'] = 'Select games from the options';
    }
    if (empty($errors)) {
        echo "$key: $value <br>";
    } 
}
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
    if (isset($errors['pwd'])) {
        echo "<span style='color: red;'>{$errors['pwd']}</span><br>";
    }
    if (isset($errors['pwdCont'])) {
        echo "<span style='color: red;'>{$errors['pwdCont']}</span><br>";
    }
?>
<input type="password"  name="password"><span style='color: red;'>*</span><br><br>

Repeat password:<br>
<?php
    if (isset($errors['pwdRep'])) {
        echo "<span style='color: red;'>{$errors['pwdRep']}</span><br>";
    }   
    if (isset($errors['pwdRepCont'])) {
        echo "<span style='color: red;'>{$errors['pwdRepCont']}</span><br>";
    } 
    if (isset($errors['pwdMis'])) {
        echo "<span style='color: red;'>{$errors['pwdMis']}</span><br>";
    }
?>
<input type="password" name="repeatPassword"><span style='color: red;'>*</span><br><br>

About me:<br>
<textarea name="aboutMe"  value="aboutMe:"></textarea><br><br>

Age:<br>
<?php
    if (isset($errors['ageNum'])) {
    echo "<span style='color: red;'>{$errors['ageNum']}</span><br>";
    }
    if (isset($errors['age'])) {
        echo "<span style='color: red;'>{$errors['age']}</span><br>";
    }
?>
<input type="number" name="age"><br><br>

My favorite color:<br>
<?php
    if (isset($errors['color'])) {
        echo "<span style='color: red;'>{$errors['color']}</span><br>";
    }
?>
<input type="color" name="color" style="background-color: 
    <?= ($color ?? '#ffffff'); ?>"> <br><br>

Country of birth:<br>
<?php
    if (isset($errors['enterCountry'])) {
    echo "<span style='color: red;'>{$errors['enterCountry']}</span><br>";
    }
    if (isset($errors['country'])) {
    echo "<span style='color: red;'>{$errors['country']}</span><br>";
    }
?>
<select name="country">
    <option value="" selected disabled> </option>
    <option value="AU">Australia</option>
    <option value="CA">Canada</option>
    <option value="CZ">Czech</option>
    <option value="DK">Denmark</option>
    <option value="FI">Finland</option>
    <option value="JP">Japan</option>   
    <option value="PL">Poland</option>
    <option value="SE">Sweden</option>   
    <option value="USA">USA</option>
    <option value="UA">Ukraine</option> 
</select><span style='color: red;'>*</span><br><br>

Visited countries:<br>
<?php
    if (isset($errors['visitedCountries'])) {
    echo "<span style='color: red;'>{$errors['visitedCountries']}</span><br>";
    }
?>
<select name="visitedCountries" multiple>
    <option value="AU">Australia</option>
    <option value="CA">Canada</option>
    <option value="CZ">Czech</option>
    <option value="DK">Denmark</option>
    <option value="FI">Finland</option>
    <option value="JP">Japan</option>   
    <option value="PL">Poland</option>
    <option value="SE">Sweden</option>   
    <option value="USA">USA</option>
    <option value="UA">Ukraine</option> 
</select><br><br>

How often do you play computer games:<br>
<input type="radio" name="games" value="Every day">
<label for="option1">Every day</label>
<input type="radio" name="games" value="Once a week">
<label for="option2">Once a week</label>
<input type="radio" name="games" value="Once a month">
<label for="option3">Once a month</label>
<input type="radio" name="games" value="Rarely">
<label for="option4">Rarely</label>
<input type="radio" name="games" value="Never">
<label for="option5">Never</label><br><br>

I promise I'll be a good girl:
<input type="checkbox" name="promise" value="yes"><br><br>

<button type="submit" name="submit" value="submit">Submit</button>

</form>