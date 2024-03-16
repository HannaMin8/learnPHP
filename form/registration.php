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
$visitedCountries = $_POST['visitedCountries'] ?? [];

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

function printError ($field, $errors){
    if (isset($errors[$field])) {
        echo "<div style='color: red;'>{$errors[$field]}</div>";
    }
}  

if (isset($_POST['submit'])){
    var_dump(ini_get('upload_tmp_dir'), ini_get('upload_max_filesize'), $_FILES);
    if (!empty($_FILES['avatar']['name'])) {
        $tempFilePath = $_FILES['avatar']['tmp_name'];
        $originalFileName = $_FILES['avatar']['name'];
        $fileExtension = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $targetDirectory = __DIR__ . '/avatars/';
        //if (strpos($originalFileName, $targetDirectory) === 0) {
            if (in_array($fileExtension, $allowedExtensions)) {
                $newFileName = str_replace('@', '_', $email) . '-' . $name . '.jpeg';
                $savePath = __DIR__ . '/avatars/' . $newFileName;
                //$r = move_uploaded_file($_FILES['avatar']['tmp_name'], 'avatars/$newFileName');
                if (move_uploaded_file($tempFilePath,  $savePath)) {
                    echo "<div style='color: green;'>File upload and saved as $newFileName.</div>";
                } else {
                    echo "<div style='color: red;'>Error: Unable to save the file.</div>";
                }
            } else {
                echo "<div style='color: red;'>Error: Invalid file extension.</div>";
            }
        } else {
            echo "<div style='color: red;'>Error: Invalid file name or directory.</div>";
    // }
    }
    if (strlen($name) === 0) {
        $errors['name'] = 'The field is required';
    }

    if (strlen($email) === 0) {
        $errors['email'] = 'The field is required';
    } else{
        if (strpos($email, '@') === false) {
            $errors['email'] = 'Invalid email format(missing @)';
        }
    }

    if (strlen($password) === 0) {
        $errors['password'] = 'The field is required';
    }else{  
        if (strlen($password) < 8) {
        $errors['password'] = 'Password must contain 8 or more characters';
        }
    }

    if (strlen($repeatPassword) === 0) {
        $errors['repeatPassword'] = 'The field is required';
    }else{ 
        if (strlen($repeatPassword) < 8) {
        $errors['repeatPassword'] = 'Password must contain 8 or more characters';
        }
    }

    if (strlen($password) >= 8 && strlen($repeatPassword) >= 8 && $password !== $repeatPassword) {
        $errors['repeatPassword'] = 'Password mismatch';
    }

    if ($age !== '' && !is_numeric($age)) {
        $errors['age'] = 'Not a number';       
    }else{
        if ($age !== '' &&  $age <= 0) {
            $errors['age'] = 'Number must be > 0';       
        }
    }

    if (ctype_xdigit($color)) {
        $errors['color'] = 'Select a color from the options';       
    }

    if (strlen($country) === 0) {
        $errors['country'] = 'The field is required';
    }else{
            if (!in_array($country, ["AU","CA","CZ","DK","FI","JP","PL","SE","USA","UA"])){
            $errors['country'] = 'Enter your country correctly';
        }
    }

    foreach ($visitedCountries as $selectCountry){
    
        if (!array_key_exists($selectCountry, $countriesList)){
            $errors['visitedCountries'] = 'Select countries from the options';
        }
    }

    if ($games !== '' && !in_array($games, ["Every day", "Once a week", "Once a month", "Rarely", "Never"])){
        $errors['games'] = 'Select games from the options';
    } 

    if (empty($errors)) {
        foreach ($_POST as $key => $value) {
            if ($key === 'color'){
                echo "$key: <span style='background-color: $value; color: black;'>$value</span> " ."<br>";
            } elseif ($key === 'visitedCountries'){
                echo "$key:" . implode(', ', $visitedCountries) ."<br>";
            } else {
            echo "$key: " . htmlspecialchars(trim($value)) . "<br>";
            }
        }
    }
}

echo '</pre>';
?>

<form method="post" enctype="multipart/form-data" action="">

Name:<br>
<?php printError('name', $errors); ?> 
<input type="text" name="name" value="<?= isset($name) ? htmlspecialchars($name) : '' ?>"><span style='color: red;'>*</span><br><br>

Surname:<br>
<input type="text" name="surname" value="<?= isset($surname) ? htmlspecialchars($surname) : '' ?>"><br><br>

Email:<br>
<?php printError('email', $errors); ?> 
<input type="email"  name="email" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>"><span style='color: red;'>*</span><br><br>

Password:<br>
<?php printError('password', $errors); ?> 
<input type="password"  name="password" value="<?= isset($password) ? htmlspecialchars($password) : '' ?>"><span style='color: red;'>*</span><br><br>

Repeat password:<br>
<?php printError('repeatPassword', $errors); ?> 
<input type="password" name="repeatPassword" value="<?= isset($repeatPassword) ? htmlspecialchars($repeatPassword) : '' ?>"><span style='color: red;'>*</span><br><br>

About me:<br>
<textarea name="aboutMe"><?=htmlspecialchars($aboutMe);?></textarea><br><br>

Age:<br>
<?php printError('age', $errors); ?> 
<input type="number" name="age" value="<?= isset($age) ? htmlspecialchars($age) : '' ?>"><br><br>

My favorite color:<br>
<?php printError('color', $errors); ?> 
<input type="color" name="color" value="<?= isset($color) ? $color : '' ?>"
    style="background-color: 
    <?= ($color ?? '#ffffff'); ?>"> <br><br>

Country of birth:<br>
<?php printError('country', $errors); ?> 
<select name="country">
    <option value=""> </option>
    <?php
    foreach ($countriesList as $code => $name) {
        echo "<option value=\"$code\"" . ($country === $code ? 'selected' : '') . ">$name</option>";
    }   
    ?>
</select><span style='color: red;'>*</span><br><br>


Visited countries:<br>
<?php printError('visitedCountries', $errors); ?> 
<select name="visitedCountries[]" multiple>
<?php foreach ($countriesList as $code => $name): ?> 
    <option <?= in_array($code, $visitedCountries) ? 'selected' : ''?> value = "<?= $code ?>"><?= $name ?></option>
<?php endforeach; ?>
</select><br><br>

  
How often do you play computer games:<br>
<?php foreach ($playGames as $num => $value): ?>
    <input type="radio" name="games" value="<?= $value ?>" <?= ($games === $value) ? 'checked' : '' ?>>
    <label for="option<?= $num ?>"><?=$value?></label>
<?php endforeach; ?>
<br><br>



Avatar: <input type="file" name="avatar">
<!--    <input type="submit" value="Upload"> -->
    <br><br>

I promise I'll be a good girl:
<input type="checkbox" name="promise" value="yes"<?= ($promise === 'yes') ? 'checked' : '' ?>><br><br>

<button type="submit" name="submit" value="submit">Submit</button>

<button type="reset" name="reset" value="reset">Reset</button>

</form>