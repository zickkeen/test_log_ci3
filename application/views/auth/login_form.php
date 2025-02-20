<?php
$ci =& get_instance(); // Dapatkan instance controller
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if ($ci->session->flashdata('error')): ?> <p style="color: red;"><?php echo $ci->session->flashdata('error'); ?></p>
    <?php endif; ?>
    <form method="post" action="<?=dynamic_base_url().'auth/login' ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        <button type="submit">Login</button>
    </form>
    <p>Belum punya akun? <a href="<?=dynamic_base_url().'auth/register' ?>">Daftar di sini</a></p>
</body>
</html>