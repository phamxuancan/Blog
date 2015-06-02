<div class='col-lg-5 col-lg-offset-4'>
    <div class="panel panel-primary" style='margin-top:50px;'>
        <div class="panel-heading ">
            <div class="panel-title no-padding no-margin">Infomation record</div>
        </div>
        <div class="panel-body">
               <div>
                    <span> Bản ghi số: <?php echo $post['Post']['id']; ?>  </span><br/><hr/>
                    <span> Tiêu đề: <?php echo $post['Post']['title']; ?>  </span><br/><hr/>
                    <span> Tiêu đề: <?php echo $post['Post']['body']; ?>  </span><br/><hr/>
                    <a href='<?php echo $this->Html->url('/'); ?>' class='btn btn-success'> Trang chủ</a>
               </div>
        </div>
    </div>
</div>