<div class="container" style="padding-bottom: 30px">
	<div class="row">
		<div class="col-sm-offset-1 col-sm-10"> 
		<?= $this->Form->create()?>
			<div class="col-sm-12"><h2>Нэвтрэх</h2></div>
			<div class="col-sm-12" style="padding-bottom:20px"><h5>Бүртгүүлж амжаагүй бол <a href="#">энд</a> дарж бүртгүүлнэ үү!!</h5></div>


			<div>
			<div class="col-sm-6">
				<div class="form-group">
					<label for="inputUsername" class="col-sm-12 control-label" style="padding-left:0px">Хэрэглэгчийн нэр</label>
					<?= $this->Form->input('username', array('label' => false, 
						'class' => 'form-control', 'id' => 'inputUsername')); ?>
				</div>
			</div>


			<div class="col-sm-6">
				<div class="form-group">
					<label for="inputPass" class="col-sm-12 control-label" style="padding-left:0px">Нууц үг</label>
					<?= $this->Form->input('password', array('label' => false
						, 'class' => 'form-control', 'id' => 'inputPass')); ?>
				</div>
			</div>
			</div>
			
			<div class="col-sm-12" style="text-align:right">
				<a href="">Нууц үг ээ мартсан?</a>
			</div>

		    <div class="col-sm-12" style="text-align:right">
		      	<?= $this->Form->input('remember_me', array('type' => 'checkbox','label' => array('class' => 'small_text','text'=>'Намайг сана'))); ?>

		    </div>

			<div class="col-sm-12 form-group" style="text-align:right">
					<?= $this->Form->submit('Нэвртэх',array('class' => 'btn btn-primary')); ?>
			</div>
					
			<?= $this->Form->end()?>
			</div>
	</div>
</div>