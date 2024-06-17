<?php
declare(strict_types=1);
session_start();

$errors = [];
$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
$loggedIn = $_SESSION['loggedin'] ?? false;

function userExists($email, $password) {
    $file = 'users.txt';
    
    if (!file_exists($file)) {
        return false;
    }

    $handle = fopen($file, "r");
    
    while (($line = fgets($handle)) !== false) {
        list($existingEmail, $existingPassword) = explode('|', $line);
        $existingEmail = rtrim($existingEmail);
        $existingPassword = rtrim($existingPassword);

        if ($existingEmail === $email && $existingPassword === $password) {
            fclose($handle); 
            return true;
        }
    }
    
    fclose($handle);
    return false;
}

if (isset($_POST['submit'])) {
    if (strlen($email) === 0) {
        $errors['email'] = 'The field is required';
    } else {
        if (strpos($email, '@') === false) {
            $errors['email'] = 'Invalid email format (missing @)';
        }
    }

    if (strlen($password) === 0) {
        $errors['password'] = 'The field is required';
    }

    if (empty($errors)) {
        if (userExists($email, $password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $loggedIn = true;
        } else {
            $errors['login'] = 'Invalid email or password';
        }
    }
}

if (isset($_POST['logout'])) {
    session_destroy();
    $loggedIn = false;
}

?>

<?php if ($loggedIn): ?>
    <p>You are logged in as <?= htmlspecialchars($_SESSION['email']) ?>. Welcome!</p>
    <form method="post" action="">
        <button type="submit" name="logout" value="logout">Logout</button>
    </form>
<?php else: ?>
    <form method="post" action="">
        Email:<br>
        <?php if (isset($errors['email'])) echo "<div style='color: red;'>{$errors['email']}</div>"; ?>
        <input type="email" name="email" value="<?= htmlspecialchars($email) ?>"><br><br>

        Password:<br>
        <?php if (isset($errors['password'])) echo "<div style='color: red;'>{$errors['password']}</div>"; ?>
        <input type="password" name="password" value="<?= htmlspecialchars($password) ?>"><br><br>

        <?php if (isset($errors['login'])) echo "<div style='color: red;'>{$errors['login']}</div>"; ?>
        
        <button type="submit" name="submit" value="submit">Login</button>
    </form>
<?php endif; ?>
