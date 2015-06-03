<div class='col-lg-5 col-lg-offset-4'>
    <div class="panel panel-primary" style='margin-top:50px;'>
        <div class="panel-heading ">
            <div class="panel-title no-padding no-margin"><?php echo __('information'); ?></div>
        </div>
        <div class="panel-body">
               <div>
                    <span><strong>ID: </strong><?php echo $post['Post']['id']; ?>  </span><br/><hr/>
                    <span><strong><?php echo __('title'); ?></strong> <?php echo $post['Post']['title']; ?>  </span><br/><hr/>
                    <span><strong><?php echo __('body'); ?></strong> <?php echo $post['Post']['body']; ?>  </span><br/><hr/>
                    <a href='<?php echo $this->Html->url('/'); ?>' class='btn btn-success'><?php echo __('home') ?></a>
               </div>
        </div>
    </div>
</div>