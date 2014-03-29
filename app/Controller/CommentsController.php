<?php
	class CommentsController extends AppController
	{
		public $helpers = array('Html','Form','Session');
		public $components = array('Session');
		public function index()
		{
			
		}
		 public function edit($id = null,$reviewid=null) {
			if (!$id) {
	        		throw new NotFoundException(__('Invalid Comment'));
	    		}
	
	    		$comment = $this->Comment->findById($id);
	    		if (!$comment) {
	        		throw new NotFoundException(__('Invalid Comment'));
	    		}
	
			$userid = $this->Auth->user('id');
			if ($comment['Comment']['user_id'] != $userid)
			{
				$this->Session->setFlash(__('You can not edit that comment.'));
				return $this->redirect(array('controller'=>'reviews','action' => 'view',$reviewid));
			}
	
			if ($this->request->is('post')) {
	        		$this->Comment->id = $id;
	        		if ($this->Comment->save($this->request->data)) {
	            			$this->Session->setFlash(__('Your comment has been updated.'));
	            			return $this->redirect(array('controller'=>'reviews','action' => 'view',$reviewid));
	        		}
	        		$this->Session->setFlash(__('Unable to update your comment.'));
	    		}
	
			if (!$this->request->data) {
	     			$this->request->data = $comment;
	    		}
	    	unset($id);
	    	unset($comment);
	    	unset($userid);
	    	unset($reviewid);
		}
		public function delete($id=null,$revid=null)
		{
			if (!$id) {
	        		throw new NotFoundException(__('Invalid comment'));
	    		}
	
	    		$comment = $this->Comment->findById($id);
	    		if (!$comment) {
	        		throw new NotFoundException(__('Invalid comment'));
	    		}
					$userid = $this->Auth->user('id');
				if ($comment['Comment']['user_id'] != $userid)
				{
					$this->Session->setFlash(__('You can not delete that comment.'));
					return $this->redirect(array('controller'=>'reviews','action' => 'view',$revid));
				}
	    		if ($this->request->is('post')) {
	        		throw new MethodNotAllowedException();
	    		}
	
			if ($this->Comment->delete($id)) {
	        		$this->Session->setFlash(
	            		__('The comment with id: %s has been deleted.', h($id))
	        		);
	        		return $this->redirect(array('controller'=>'reviews','action' => 'view',$revid));
	    		}
	    		unset($comment);
	    		unset($id);
	    		unset($userid);
		}
		public function add($reviewid=null)
		{
				$userid = $this->Auth->user('id');
				$username = $this->Auth->user('username');
				if ($userid) {
	        		if ($this->request->is('post')) {
							$this->request->data['Comment']['user_id'] = $userid;
							$this->request->data['Comment']['username'] = $username;
							$this->request->data['Comment']['review_id']=$reviewid;
	            			$this->Comment->create();
	            			if ($this->Comment->save($this->request->data)) {
	                			$this->Session->setFlash(__('Your comment has been saved.'));
	                			return $this->redirect(array('controller' => 'reviews','action' => 'view',$reviewid));
	            			}
	            			$this->Session->setFlash(__('Unable to add your comment.'));
	        		}
				}
				else {
					$this->Session->setFlash(__('You must be logged in to add a commentreview.'));
					return $this->redirect(array('action' => 'index'));
				}
				unset($userid);
				unset($username);
				
		}
	}
?>