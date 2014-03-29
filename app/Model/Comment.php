<?php
	class Comment extends AppModel
	{
		public $belongsTo = array('User','Review');
		public $validate = array('title' => array('rule' => 'notEmpty'), 'body' => array('rule' => 'notEmpty'),'username'=> array('rule' => 'notEmpty'));
	}
?>