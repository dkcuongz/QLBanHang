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
                <div class="signup-content">
                    <div class="signup-form">
                        <?= $this->Flash->render() ?>
                        <h3 class="form-title">Login</h3>
                        <?= $this->Form->create() ?>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="email" name="email" id="name" placeholder="Your Email" required />
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-email"></i></label>
                            <input type="password" name="password" id="email" placeholder="Your Password" required />
                        </div>
                        <?= $this->Form->submit(__('Login'), ['class' => 'form-submit']); ?>
                        <?= $this->Form->end() ?>
                    </div>
                    <div class="signup-image">
                        <figure><img src="<?php echo $this->Url->webroot; ?>/register_forgot/img/signup-image.jpg" alt="sing up image"></figure>
                        <?= $this->Html->link("Register", ['action' => 'register', 'class' => 'signup-image-link']) ?>
                        <?= $this->Html->link("Forgot Password", ['action' => 'forgotPassword', 'class' => 'signup-image-link']) ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- JS -->
        <?= $this->Html->script(['../register_forgot/js/jquery.min', '../register_forgot/js/main']) ?>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>