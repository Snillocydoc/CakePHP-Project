<?php
	class MessagesController extends AppController
	{
		public $helpers = array('Html','Form','Session');
		public $components = array('Session');
		
		public function index()
		{
			$userid = $this->Auth->user('id');
			$username = $this->Auth->user('username');
			if($userid&&$username)
			{
				$messages = $this->Message->findAllByUserId($userid);
				$this->set('messages',$messages);
				$this->set('username',$username);
			}
			else{
				$this->Session->setFlash(__('You must be logged in to see your messages.'));
				return $this->redirect(array('action' => 'index'));
			}
		}
		public function add($to_id=null)
		{
			$user = $this->Auth->user('id');
			if ($user) {
        		if ($this->request->is('post')) {
						$this->request->data['Message']['from_user'] = $user;
						$this->request->data['Message']['user_id']=$to_id;
            			$this->Message->create();
            			if ($this->Message->save($this->request->data)) {
                			$this->Session->setFlash(__('Your message has been saved.'));
                			return $this->redirect(array('controller' => 'messages','action' => 'index'));
            			}
            			$this->Session->setFlash(__('Unable to add your review.'));
        		}
			}
			else {
				$this->Session->setFlash(__('You must be logged in to send a message.'));
				return $this->redirect(array('action' => 'index'));
			}
		}
		public function view($id=null)
		{
			if (!$id) {
            throw new NotFoundException(__('Invalid message'));
        	}

    	  	$message = $this->Message->findById($id);
    	  	if (!$message) {
        	    throw new NotFoundException(__('Invalid message'));
        	}
    		 $this->set('message', $message);	
		}
		public function delete($id=null) {
	    		if ($this->request->is('post')) {
	        		throw new MethodNotAllowedException();
	    		}
	
			if ($this->Message->delete($id)) {
	        		$this->Session->setFlash(
	            		__('The message with id: %s has been deleted.', h($id))
	        		);
	        		return $this->redirect(array('controller' => 'messages','action' => 'index'));
	    		}
		}			
		
	}
?>