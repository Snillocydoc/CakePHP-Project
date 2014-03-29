<?php
	class Message extends AppModel
	{
		public $belongsTo = array(
	        'Sender' => array(
	            'className' => 'User',
	            'foreignKey' => 'from_user'
	        ),
	        'Recipient' => array(
	            'className' => 'User',
	            'foreignKey' => 'user_id'
	        )
	    );
		public $validate = array('title' => array('rule' => 'notEmpty'), 'body' => array('rule' => 'notEmpty'));
	}
?>