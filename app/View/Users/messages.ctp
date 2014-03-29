<?php
	if($username)
	{
		echo "Logged in as $username <br>";
		echo $this->Html->link('Logout',array('controller' => 'users','action' => 'logout'));
		echo '<br>';
		
	}
?>
	
		<table>
	<tr>
		<th>Title</th>
		<th>From</th>
		<th>Options</th>
		<th>Created</th>
	</tr>
	<?php foreach($messages as $message): ?>
	<tr>
		<td>
            <?php echo $this->Html->link($message['title'],
				array('controller' => 'messages', 'action' => 'view', $message['id'])); ?>
        </td>
        <td><?php echo $message['from_user']; ?></td>
        <td><?php echo $this->Html->link('Delete',array('controller'=>'messages','action' => 'delete',$message['id'])); ?></td>
        <td><?php echo $message['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    
    <?php unset($review); ?>
</table>
