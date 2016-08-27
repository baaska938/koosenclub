<div class="container" style="padding-bottom: 30px">
	<div class="row">
		<div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6"> 
			<?= $this->Form->create()?>
				<div class="form-horizontal">
					<div class="form-group">
						<label for="inputEmail" class="col-sm-4 control-label">И-мэйл</label>
						<div class="col-sm-8">
							<?= $this->Form->input('email', array('label' => false, 
								'class' => 'form-control', 'id' => 'inputEmail')); ?>
						</div>
					</div>
				
					<div class="form-group">
						<label for="inputEmail" class="col-sm-4 control-label">Нууц үг</label>
						<div class="col-sm-8">
							<?= $this->Form->input('password', array('label' => false
								, 'class' => 'form-control', 'id' => 'inputPass')); ?>
						</div>
					</div>
					<div class="form-group">
					    <div class="col-sm-offset-4 col-sm-8">
					      	<?= $this->Form->input('remember', array('type'=>'checkbox', 'label' => 'Намайг сана')); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-sm-12" style="text-align:right">
							<?= $this->Form->button('Нэвртэх',array('class' => 'btn btn-primary')); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12" style="text-align:right">
							<?= $this->Html->link(
							    'Бүртгүүлэх',
							    ['controller' => 'users', 'action' => 'add', '_full' => true]
							);?>
						</div>
					</div>
				</div>	
			<?= $this->Form->end()?>
			</div>
	</div>
</div>