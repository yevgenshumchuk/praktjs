<?php
session_start();

if (!isset($_SESSION['name'])) {
    header("Location: register.php");
    exit();
}
?>

<h2>Привіт, <?php echo $_SESSION['name']; ?>!</h2>
<p>Email: <?php echo $_SESSION['email']; ?></p>

<?php
if (isset($_COOKIE['email'])) {
    echo "<p>Ваш email запам'ятали: " . $_COOKIE['email'] . "</p>";
}
?>

<a href="logout.php">Вийти</a>