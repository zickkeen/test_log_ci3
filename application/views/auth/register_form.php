<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <?php if ($this->session->flashdata('error')): ?>
        <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
    <form method="post" action="<?=dynamic_base_url().'auth/register'?>">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        <button type="submit">Register</button>
    </form>
    <p>Sudah punya akun? <a href="<?=dynamic_base_url().'auth/login'?>">Login di sini</a></p>
</body>
</html>