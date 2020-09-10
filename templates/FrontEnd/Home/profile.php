<?php

/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $categories
 */

use Cake\Routing\Router;
?>
<div class="container">
    <h1>Edit Profile</h1>
    <hr>
    <div class="row">
    <?= $this->Flash->render() ?>
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
                <h6>Upload a different photo...</h6>

                <input type="file" class="form-control">
            </div>
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-coffee"></i>
                This is an <strong>.alert</strong>. Use this to show important messages to the user.
            </div>
            <h3>Personal info</h3>

            <?php echo $this->Form->create(null, ['url' => ['controller' => 'Home', 'action' => 'postUser']]); ?>
            <div class="form-group">
                <label class="col-lg-3 control-label">Name:</label>
                <div class="col-lg-8">
                    <input type="text" class="input-text form-control" name="name" placeholder="Name" required value="<?php if ($auth) {
                                                                                                                            echo h($auth->username);
                                                                                                                        } ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Phone:</label>
                <div class="col-lg-8">
                    <input type="text" class="input-text form-control" name="phone" placeholder="Name" required value="<?php if ($auth) {
                                                                                                                            echo h($auth->phone);
                                                                                                                        } ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                    <input type="email" class="input-text form-control" name="email" placeholder="Name" required value="<?php if ($auth) {
                                                                                                                            echo h($auth->email);
                                                                                                                        } ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Address:</label>
                <div class="col-lg-8">
                    <input type="text" class="input-text form-control" name="address" placeholder="Name" required value="<?php if ($auth) {
                                                                                                                                echo h($auth->address);
                                                                                                                            } ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Password:</label>
                <div class="col-md-8">
                    <input type="password" class="input-text form-control" name="password" placeholder="Password" value="" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">New Password:</label>
                <div class="col-md-8">
                    <input type="password" class="input-text form-control" name="newpassword" placeholder="New Password" value="" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Confirm password:</label>
                <div class="col-md-8">
                    <input type="password" class="input-text form-control" name="confirmpassword" placeholder="Confirm Password" value="" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                    <?= $this->Form->button(__('Save Changes'), array('type' => 'submit', 'class' => 'btn btn-primary btn-custom')) ?>
                    <span></span>
                    <?php echo $this->Form->button('Cancel', array(
                        'type' => 'button',
                        'class' => 'btn btn-danger',
                        'onclick' => 'location.href=\'/\''
                    )); ?>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<hr>