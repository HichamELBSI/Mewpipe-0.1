<?= $this->Form->create('User'); ?>
	<?= $this->Form->input('username', array('label' => 'Identifiant')); ?>
	<?= $this->Form->input('password', array('label' => 'Mot de passse')); ?>
<?= $this->Form->end('Se connecter'); ?>