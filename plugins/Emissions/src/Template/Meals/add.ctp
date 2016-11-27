<?php
$this->extend('Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Meals'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Meals'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($meal); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Meal']) ?></legend>
    <?php
    echo $this->Form->input('amount');
    echo $this->Form->input('is_meat');
    echo $this->Form->input('is_community');
    echo $this->Form->input('is_outside');
    echo $this->Form->input('emission_factor');
    echo $this->Form->input('impact');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
