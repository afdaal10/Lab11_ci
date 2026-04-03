<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('/style.css');?>">
    <style>
        #login-wrapper {
            width: 400px;
            margin: 80px auto;
            background: #fff;
            padding: 30px 40px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        #login-wrapper h1 {
            text-align: center;
            margin-bottom: 24px;
            color: #333;
            font-size: 26px;
        }
        #login-wrapper .form-label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #555;
            font-size: 14px;
        }
        #login-wrapper .form-control {
            width: 100%;
            padding: 9px 12px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }
        #login-wrapper .form-control:focus {
            border-color: #1a73e8;
            outline: none;
        }
        #login-wrapper .btn-primary {
            width: 100%;
            padding: 10px;
            background: #1557b0;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 15px;
            cursor: pointer;
        }
        #login-wrapper .btn-primary:hover {
            background: #1a73e8;
        }
        #login-wrapper .alert-danger {
            background: #f8d7da;
            color: #721c24;
            padding: 10px 14px;
            border-radius: 4px;
            margin-bottom: 16px;
            font-size: 14px;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div id="login-wrapper">
        <h1>Sign In</h1>
        <?php if(session()->getFlashdata('flash_msg')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('flash_msg') ?>
        </div>
        <?php endif; ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="InputForEmail" class="form-label">
                    Email address
                </label>
                <input type="email" 
                       name="email" 
                       class="form-control"
                       id="InputForEmail" 
                       value="<?= set_value('email') ?>"
                       placeholder="Masukkan email">
            </div>
            <div class="mb-3">
                <label for="InputForPassword" class="form-label">
                    Password
                </label>
                <input type="password" 
                       name="password" 
                       class="form-control" 
                       id="InputForPassword"
                       placeholder="Masukkan password">
            </div>
            <button type="submit" class="btn-primary">Login</button>
        </form>
    </div>
</body>
</html>