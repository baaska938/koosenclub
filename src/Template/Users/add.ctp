<div class="large-4 middle-4 large-offset-4 medium-offset-4">
	<a2>Register user for TEST</a2>
	<br><br>
	<?= $this->Form->create('users',[
			'type' => 'post',
			'url' => ['controller' => 'users','action' => 'add']]
			)?>
					
		<?= $this->Form->input('email'); ?>
		<?= $this->Form->input('password'); ?>
		<?= $this->Form->button('Submit'); ?>
		<?= $this->Form->end()?>
</div>