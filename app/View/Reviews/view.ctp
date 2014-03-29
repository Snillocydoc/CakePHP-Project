<p><?php echo $this->Html->link('<--Back To All Reviews',array('controller'=>'reviews','action'=>'index'));?></p>
<h2><?php echo h($review['Review']['title']); ?></h1>

<p><small>Created: <?php echo $review['Review']['created']; ?></small></p>
<p>By: <?php echo $review['User']['username'];?></p>
<p>Rating: <?php echo $review['Review']['rating'];?></p>
<p>Media: <?php echo $review['Review']['media'];?></p>
<p><?php echo h($review['Review']['body']); ?></p>
<br>
<p><?php echo $this->Html->link('Send Message',array('controller' => 'messages','action' => 'add',$review['User']['id']));?></p>
<br>
<h1>Comments:</h2>
<br>
<?php 
	
	foreach($review['Comment'] as $comment)
	{
		echo $comment['body']."<br>";
		echo "<p> By: ".$comment['username']."</p>";
		echo $this->Html->link('Edit',array('controller'=>'comments','action'=>'edit',$comment['id'],$review['Review']['id']));
		echo " ".$this->Html->link('Delete',array('controller'=>'comments','action'=>'delete',$comment['id'],$review['Review']['id']));
		echo "<br><br>";
	}
?>
<br>
<p><?php echo $this->Html->link('Add Comment',array('controller' => 'comments','action' => 'add',$review['Review']['id']));?></p>