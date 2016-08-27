<div class="container" style="padding-bottom: 30px">
	<div class="row">
		<div class="col-sm-offset-1 col-sm-10"> 
			<?= $this->Form->create()?>
				<div class="form-horizontal">
					<div class="form-group">
						<label for="inputYear" class="col-sm-4 control-label">Коосэнээр ирсэн он <red>*</red></label>
						<div class="col-sm-8">
							<?= $this->Form->input('ARRIVED YEAR', array('label' => false, 
								'class' => 'form-control', 'id' => 'inputYear', 'placeholder' => '2006, 2016 ...', 'size' => '4', 'maxlength' => '4')); ?>

						</div>
					</div>
				
					<div class="form-group">
						<label for="inputLastname" class="col-sm-4 control-label">Овог <red>*</red></label>
						<div class="col-sm-8">
							<?= $this->Form->input('LAST NAME', array('label' => false
								, 'class' => 'form-control', 'id' => 'inputLastname', 'placeholder' => 'Овог')); ?>
						</div>
					</div>

					<div class="form-group">
						<label for="inputFirstname" class="col-sm-4 control-label">Нэр <red>*</red></label>
						<div class="col-sm-8">
							<?= $this->Form->input('FIRST NAME', array('label' => false
								, 'class' => 'form-control', 'id' => 'inputFirstname', 'placeholder' => 'Нэр')); ?>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail" class="col-sm-4 control-label">Мэйл хаяг <red>*</red></label>
						<div class="col-sm-8">
							<?= $this->Form->input('email', array('label' => false
								, 'class' => 'form-control', 'id' => 'inputEmail', 'placeholder' => 'Email')); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12" style="text-align:right">
							<?= $this->Form->button('Бүртгүүлэх',array('class' => 'btn btn-primary')); ?>
						</div>
					</div>
				</div>	
			<?= $this->Form->end()?>
			</div>
	</div>
</div>