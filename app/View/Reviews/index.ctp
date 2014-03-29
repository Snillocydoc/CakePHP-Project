<h1> Reviews </h1>
<?php 	if($userid)
		{
			echo "Logged in as $username <br>" ;
			echo $this->Html->link('Logout',array('controller' => 'users','action' => 'logout'));
			echo '<br>';
			echo $this->Html->link('View Messages',array('controller'=>'messages','action'=>'index'));
			echo '<br>';
		}
		else
		{
			echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'))." or ";
			echo $this->Html->link('Create New User', array('controller' => 'users', 'action' => 'add'));
		}
		
?>
<br>


<table>
	<tr>
		
		<th>Title</th>
		<th>By</th>
		<th>Rating</th>
		<th>Media</th>
		<th>Options</th>
		<th>Created</th>
	</tr>
	<?php foreach($reviews as $review): ?>
	<tr>
		<td>
            <?php  echo $this->Html->link($review['Review']['title'],
				array('controller' => 'reviews', 'action' => 'view', $review['Review']['id'])); ?>
        </td>
        <td><?php echo $review['User']['username'];?></td>
        <td><?php echo $review['Review']['rating'];?></td>
        <td><?php echo $review['Review']['media'];?></td>
        <td><?php echo $this->Html->link('Edit',array('controller' => 'reviews','action' => 'edit',$review['Review']['id']));
        			echo " ".$this->Html->link('Delete',array('controller' => 'reviews','action' => 'delete',$review['Review']['id']));?></td>
        <td><?php echo $review['Review']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    
    <?php unset($review); ?>
</table>
<?php echo $this->Html->link('Add Review', array('controller' => 'reviews', 'action' => 'add')); ?>

