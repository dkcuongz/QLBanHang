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
                        <h2 class="form-title">Email</h2>
                        <?= $this->Form->create() ?>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="email" name="email" id="name" placeholder="Your Email" required/>
                        </div>
                        <?= $this->Form->submit(__('Send Email'), ['class' => 'form-submit']); ?>
                        <?= $this->Form->end() ?>
                    </div>
                    <div class="signup-image">
                        <figure><img src="<?php echo $this->Url->webroot; ?>/register_forgot/img/signup-image.jpg" alt="sing up image"></figure>
                        <?= $this->Html->link("I am already member", ['action' => 'login', 'class' => 'signup-image-link']) ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- JS -->
        <?= $this->Html->script(['../register_forgot/js/jquery.min', '../register_forgot/js/main']) ?>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>