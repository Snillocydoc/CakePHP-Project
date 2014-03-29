<h1><?php echo h($message['Message']['title']); ?></h1>

<p><small>Created: <?php echo $message['Message']['created']; ?></small></p>
<p><?php echo "From: ".$message['Message']['from_user']." <br>"; ?></p>

<p><?php echo h($message['Message']['body']); ?></p>
<p><?php echo $this->Html->link('Reply',array('controller'=>'messages','action'=>'add',$message['Sender']['id'])); ?></p>

