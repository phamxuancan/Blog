<div class='col-lg-1'>
    <?php echo $this->Html->link(
            '',
            array('controller' => 'posts', 'action' => 'add'),
            array('class'=>'fa fa-plus fa-5x btn btn-default')
        ); ?>
</div>
<div class='col-lg-10'>
    <div class='col-lg-12'>
        <h3 style='background:#00BFFF;'><?php echo $this->Session->flash(); ?></h3>
    </div>
    <table class='info table table-bordered table-hover text-center'>
            <tr class='info'>
                <th class='text-center'>ID</th>
                <th class='text-center'>TITLE</th>
                <th class='text-center'>BODY</th>
                <th class='text-center'>CREATED_AT</th>
                <th class='text-center'>Action</th>
            </tr>
            <?php
                foreach ($posts as $post){
            ?>
            <tr>
                <td class='text-center'><?php echo $post['Post']['id']; ?></td>

                <td class='text-center'><?php echo $post['Post']['title']; ?></td>
                <td class='text-center'><?php echo $post['Post']['body']; ?></td>
                <td class='text-center'><?php echo $post['Post']['created']; ?></td>
                <td class='text-center'>
                 <?php
                                    echo $this->Html->link('Xem',
                                    array('controller'=>'posts','action'=>'view',$post['Post']['id']),
                                    array('class'=>'btn btn-info')
                                    );
                                ?>
                    <?php
                        echo $this->Html->link(
                            'Edit',
                            array('action' => 'edit', $post['Post']['id']),
                            array('class'=>'btn btn-warning')
                        );
                    ?>
                    <?php
                        echo $this->Form->postLink(
                            'Delete',
                            array('action' => 'delete', $post['Post']['id']),
                            array('confirm' => 'Are you sure?','class'=>'btn btn-danger')
                        );
                    ?>
                </td>
            </tr>
            <?php
                }
            ?>
    </table>
</div>