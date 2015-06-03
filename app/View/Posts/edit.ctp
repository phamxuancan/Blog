<div class='col-lg-5 col-lg-offset-4'>
    <div class="panel panel-primary" style='margin-top:50px;'>
         <div class="panel-heading">
                <h3 class="panel-title "><?php echo __('title_edit_post') ?></h3>
        </div>
            <div class="panel-body">
                <?php
                echo $this->Form->create('Post',array('type'=>'post'));
                echo $this->Form->input('title',array('class'=>'form-control'));
                echo $this->Form->input('body', array('rows' => '3','class'=>'form-control'));
                echo $this->Form->input('id', array('type' => 'hidden'));
                echo $this->Form->end(__('save_edit'),array('class'=>'btn btn-success'));
                ?>
            </div>
    </div>
</div>