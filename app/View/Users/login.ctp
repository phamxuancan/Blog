<div class="users form">
<?php echo $this->Session->flash(); ?>
<?php echo $this->Form->create('Users'); ?>
    <fieldset>
        <legend>
            <?php echo __('enter_login'); ?>
        </legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('login')); ?>
</div>