<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php echo $title; ?></title>

    <!-- Font Icon -->
    <?= $this->Html->css(['../register_forgot/css/material-design-iconic-font.min', '../register_forgot/css/style']) ?>
    <!-- Main css -->
</head>

<body>

    <div class="main">
        <!-- Sign up form -->

        <section class="signup">
            <div class="container">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <?= $this->Form->create() ?>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" placeholder="Your Name" required />
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email" required />
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-phone-in-talk"></i></label>
                            <input type="text" name="phone" id="re_pass" placeholder="Phone" required />
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-pin-drop"></i></label>
                            <input type="text" name="address" id="pass" placeholder="Address" required />
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="pass" placeholder="Password" required />
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required />
                        </div>
                        <?= $this->Form->submit(__('Register'), ['class' => 'form-submit']); ?>
                        <?= $this->Form->end() ?>
                    </div>
                    <div class="signup-image">
                        <figure><img src="<?php echo $this->Url->webroot; ?>/register_forgot/img/signup-image.jpg" alt="sing up image"></figure>
                        <?= $this->Html->link("Forgot Password", ['action' => 'forgotPassword', 'class' => 'signup-image-link']) ?>
                        <?= $this->Html->link("I am already member", ['action' => 'login', 'class' => 'signup-image-link']) ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- JS -->
        <?= $this->Html->script(['../register_forgot/js/jquery.min', '../register_forgot/js/main']) ?>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>