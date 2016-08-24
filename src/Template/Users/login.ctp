<div class="large-4 middle-4 large-offset-4 medium-offset-4">
	<a2>Login</a2>
	<br><br>
	<?= $this->Form->create()?>
		<?= $this->Form->input('email'); ?>
		<?= $this->Form->input('password'); ?>
		<?= $this->Form->button('Login'); ?>
	<?= $this->Form->end()?>
</div>