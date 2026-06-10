<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="<?= base_url('/style.css?v=' . time());?>">
</head>
<body style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background: linear-gradient(135deg, #f0f4f8 0%, #e2e8f0 100%); margin: 0; font-family: 'Inter', Arial, sans-serif;">
    <div id="login-wrapper" style="width: 100%; max-width: 400px; padding: 40px; background: #ffffff; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #edf2f7;">
        <h1 style="text-align: center; color: #2b6cb0; font-size: 26px; margin-bottom: 30px; font-weight: 700;">Admin Login</h1>
        
        <?php if(session()->getFlashdata('flash_msg')):?>
            <div class="alert alert-danger" style="background: #fed7d7; color: #c53030; padding: 12px; border-radius: 6px; margin-bottom: 20px; text-align: center; font-size: 14px; font-weight: 600; border: 1px solid #f5c6cb;">
                <?= session()->getFlashdata('flash_msg') ?>
            </div>
        <?php endif;?>
        
        <form action="" method="post">
            <div class="mb-3" style="margin-bottom: 20px;">
                <label for="InputForEmail" style="display: block; margin-bottom: 8px; color: #4a5568; font-weight: 600; font-size: 14px;">Email address</label>
                <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email') ?>" style="width: 100%; padding: 10px 15px; background: #f7fafc; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 14px; box-sizing: border-box;" required autofocus>
            </div>
            
            <div class="mb-3" style="margin-bottom: 25px;">
                <label for="InputForPassword" style="display: block; margin-bottom: 8px; color: #4a5568; font-weight: 600; font-size: 14px;">Password</label>
                <input type="password" name="password" class="form-control" id="InputForPassword" style="width: 100%; padding: 10px 15px; background: #f7fafc; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 14px; box-sizing: border-box;" required>
            </div>
            
            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 12px; font-size: 15px; background: #3182ce; color: white; border: none; border-radius: 6px; font-weight: bold; cursor: pointer; transition: background 0.2s;">Sign In</button>
        </form>
        
        <div style="text-align: center; margin-top: 20px; font-size: 13px; color: #a0aec0;">
            <a href="<?= base_url('/'); ?>" style="color: #4299e1; text-decoration: none;">&larr; Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>