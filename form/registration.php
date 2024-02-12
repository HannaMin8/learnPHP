<?php
declare(strict_types=1);

echo '<pre>';
$errors = array();
$name = trim($_POST['name'] ?? '');
$surname = trim($_POST['surname'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
$repeatPassword = trim($_POST['repeatPassword'] ?? '');
$aboutMe = trim($_POST['aboutMe'] ?? '');
$age = trim($_POST['age'] ?? '');
$color = trim($_POST['color'] ?? '');
$country = trim($_POST['country'] ?? '');
$visitedCountries = $_POST['visitedCountries'] ?? '';
$games = trim($_POST['games'] ?? '');
$promise = trim($_POST['promise'] ?? '');
$countriesList = [
    "AU" => "Australia",
    "CA" => "Canada",
    "CZ" => "Czech",
    "DK" => "Denmark",
    "FI" => "Finland",
    "JP" => "Japan", 
    "PL" => "Poland",
    "SE" => "Sweden",
    "USA" => "USA",
    "UA" => "Ukraine" 
];
$playGames = ["Every day", "Once a week", "Once a month", "Rarely", "Never"];

if (isset($_POST['submit'])){
    if (strlen($name) === 0) {
        $errors['name'] = 'The field is required';
    }
    if (strlen($password) === 0) {
        $errors['pwd'] = 'The field is required';
    }else{  
        if (strlen($password) < 8) {
        $errors['pwdCont'] = 'Password must contain 8 or more characters';
        }
    }
    if (strlen($repeatPassword) === 0) {
        $errors['pwdRep'] = 'The field is required';
    }else{ 
        if (strlen($repeatPassword) < 8) {
        $errors['pwdRepCont'] = 'Password must contain 8 or more characters';
        }
    }
    if (strlen($password) >= 8 && strlen($repeatPassword) >= 8 && $password !== $repeatPassword) {
        $errors['pwdMis'] = 'Password mismatch';
    }
    if ($age !== '' && !is_numeric($age)) {
        $errors['ageNum'] = 'Not a number';       
    }else{
        if ($age !== '' &&  $age <= 0) {
            $errors['age'] = 'Number must be > 0';       
        }
    }

    if (ctype_xdigit($color)) {

        $errors['color'] = 'Select a color from the options';       
    }
    if (strlen($country) === 0) {
        $errors['enterCountry'] = 'The field is required';
    }else{
        if (!in_array($country, ["AU","CA","CZ","DK","FI","JP","PL","SE","USA","UA"])){
            $errors['country'] = 'Enter your country correctly';
        }
    }
    if ($visitedCountries !== '' && !in_array($visitedCountries, ["AU","CA","CZ","DK","FI","JP","PL","SE","USA","UA"])){
        $errors['visitedCountries'] = 'Select countries from the options';
    }
    if ($games !== [] && !in_array($games, ["Every day", "Once a week", "Once a month", "Rarely", "Never"])){
        $errors['games'] = 'Select games from the options';
    }
    
    if (empty($errors)) {
        foreach ($_POST as $key => $value) {
            if ($key === 'color'){
                echo "$key: <span style='background-color: $value; color: black;'>$value</span> " ."<br>";
            } else {
            echo "$key: " . htmlspecialchars($value) . "<br>";
            }
        }
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
<input type="text" name="name" value="<?= isset($name) ? htmlspecialchars($name) : '' ?>"><span style='color: red;'>*</span><br><br>

Surname:<br>
<input type="text" name="surname" value="<?= isset($surname) ? htmlspecialchars($surname) : '' ?>"><br><br>

Email:<br>
<?php
    if (isset($errors['email'])) {
        echo "<div style='color: red;'>{$errors['email']}</div>";
    }
?>
<input type="email"  name="email" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>"><span style='color: red;'>*</span><br><br>

Password:<br>
<?php
    if (isset($errors['pwd'])) {
        echo "<span style='color: red;'>{$errors['pwd']}</span><br>";
    }
    if (isset($errors['pwdCont'])) {
        echo "<span style='color: red;'>{$errors['pwdCont']}</span><br>";
    }
?>
<input type="password"  name="password" value="<?= isset($password) ? htmlspecialchars($password) : '' ?>"><span style='color: red;'>*</span><br><br>

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
<input type="password" name="repeatPassword" value="<?= isset($repeatPassword) ? htmlspecialchars($repeatPassword) : '' ?>"><span style='color: red;'>*</span><br><br>

About me:<br>
<textarea name="aboutMe"><?=htmlspecialchars($aboutMe);?></textarea><br><br>

Age:<br>
<?php
    if (isset($errors['ageNum'])) {
    echo "<span style='color: red;'>{$errors['ageNum']}</span><br>";
    }
    if (isset($errors['age'])) {
        echo "<span style='color: red;'>{$errors['age']}</span><br>";
    }
?>
<input type="number" name="age" value="<?= isset($age) ? htmlspecialchars($age) : '' ?>"><br><br>

My favorite color:<br>
<?php
    if (isset($errors['color'])) {
        echo "<span style='color: red;'>{$errors['color']}</span><br>";
    }
?>
<input type="color" name="color" value="<?= isset($color) ? $color : '' ?>"
    style="background-color: 
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
    <option value=""> </option>
    <?php
    foreach ($countriesList as $code => $name) {
        echo "<option value=\"$code\"" . ($country === $code ? 'selected' : '') . ">$name</option>";
    }   
    ?>
</select><span style='color: red;'>*</span><br><br>


Visited countries:<br>
<?php
    if (isset($errors['visitedCountries'])) {
    echo "<span style='color: red;'>{$errors['visitedCountries']}</span><br>";
    }
?>
<select name="visitedCountries[]" multiple>
    <option value="AU">Australia</option>
    <option value="CA" >Canada</option>
    <option value="CZ" >Czech</option>
    <option value="DK">Denmark</option>
    <option value="FI">Finland</option>
    <option value="JP">Japan</option>   
    <option value="PL">Poland</option>
    <option value="SE">Sweden</option>   
    <option value="AU">USA</option>
    <option value="UA">Ukraine</option> 
</select><br><br>
    
How often do you play computer games:<br>
<?php foreach ($playGames as $nun => $value): ?>
    <input type="radio" name="games" value="<?= $value ?>" <?= ($games === $value) ? 'checked' : '' ?>>
    <label for="option<?=$num?>"><?=$value?></label>
<?php endforeach; ?>
<br><br>

I promise I'll be a good girl:
<input type="checkbox" name="promise" value="yes"<?= ($promise === 'yes') ? 'checked' : '' ?>><br><br>

<button type="submit" name="submit" value="submit">Submit</button>

<button type="reset" name="reset" value="reset">Reset</button>

</form>