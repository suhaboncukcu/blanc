<?php
$this->extend('Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Receipts'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Receipts'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($receipt, ['type' => 'file']); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Receipt']) ?></legend>
    <?php
	    echo $this->Form->input('date');
	    echo $this->Form->file('file_file');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
