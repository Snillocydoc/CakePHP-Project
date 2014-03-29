<!-- app/View/Users/add.ctp -->

<?php echo $this->Form->create('User');
    echo $this->Form->input('username');
    echo $this->Form->input('password');
	echo $this->Form->end('Create User'); ?>