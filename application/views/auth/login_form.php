<?php
$ci =& get_instance(); // Dapatkan instance controller
?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Login</h1>
            </div>
            <div class="card-body">
                <?php if ($ci->session->flashdata('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $ci->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?= dynamic_base_url() . 'auth/login' ?>">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <p class="mt-3">Belum punya akun? <a href="<?= dynamic_base_url() . 'auth/register' ?>">Daftar di sini</a></p>
            </div>
        </div>
    </div>
</div>