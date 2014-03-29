<?php
		echo $this->Html->link('<--Back to All Reviews',array('controller'=>'reviews','action'=>'index'));
		echo "<br>Logged in as $username <br>";
		echo $this->Html->link('Logout',array('controller' => 'users','action' => 'logout'));
		echo '<br>';
?>
	
		<table>
	<tr>
		<th>Title</th>
		<th>From</th>
		<th>Options</th>
		<th>Created</th>
		
	</tr>
	<?php  foreach($messages as $message): ?>
	<tr>
		<td>
            <?php echo $this->Html->link($message['Message']['title'],
				array('controller' => 'messages', 'action' => 'view', $message['Message']['id'])); ?>
        </td>
        <td><?php echo $message['Sender']['username']; ?></td>
        <td><?php echo $this->Html->link('Delete',array('controller'=>'messages','action' => 'delete',$message['Message']['id'])); 
        		echo " ".$this->Html->link('Reply',array('controller'=>'messages','action'=>'add',$message['Sender']['id']));
        ?></td>
        <td><?php echo $message['Message']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    
    <?php unset($messages); ?>
</table>
