<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    
	<?= $this->Html->css('bootstrap.min.css');?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<button type="button" class="navbar-toggle"
			data-toggle="collapse"
			data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			
			<a class="navbar-brand" href="#">Коосэн клуб</a>
			
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class=""><?= $this->Html->link(__('Add user for test',true),['controller' => 'users', 'action' => 'add', '_full' => true], array('style' => 'color:red;')); ?></li>
					<li class=""><?= $this->Html->link('Коосэны тухай',['controller' => 'mylayout', 'action' => 'index', '_full' => true]); ?></li>
					<li class=""><?= $this->Html->link('Асуулт хариулт',['controller' => 'mylayout', 'action' => 'question', '_full' => true]); ?></li>
					<li class=""><?= $this->Html->link('Гишүүдийн нийтлэл',['controller' => 'mylayout', 'action' => 'index', '_full' => true]); ?></li>
					<li class=""><a href="/#" class="btn btn-default" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-user"></span> Нэвтрэх </a></li>
				</ul>
			</div>
		</div>
	</nav>	
	
	<div id="loginModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Нэвтрэх</h3>
				</div>
				
				<div class="modal-body">
					<?= $this->Form->create()?>
						<?= $this->Form->input('email'); ?>
						<?= $this->Form->input('password',array('type' => 'password')); ?>
						<?= $this->Form->submit('ログイン',array('class' => 'button')); ?>
					<?= $this->Form->end()?>
					
					<!--
					<form role="form" method="post" action="./mylayout/sendForm">
						<div class="form-group">
							<label class="sr-only" for="Username">Username</label>
							<input type="text" name="username" class="form-control" placeholder="Хэрэглэгчийн нэр">
						</div>
						<div class="form-group">
							<label class="sr-only" for="Password">Password</label>
							<input type="password" name="password" class="form-control" placeholder="Нууц үг">
						</div>
						<div class="form-group">
							<input type="submit" class="form-control" name="Нэвтрэх">
						</div>
					</form>
					-->
				</div>
				
				<div class="modal-footer">
					
				</div>
			</div>
		</div>
	</div>
    
    <?= $this->fetch('content') ?>
    
    <div class="navbar navbar-inverse navbar-static-bottom">
		<div class="container">
			<div class="navbar-text pull-left">
				<p>Copyright &copy; Kosen club 2016</p>
			</div>
		</div>
	</div>
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');?>
    <?= $this->Html->script(['bootstrap.min']);?>
    
</body>
</html>
