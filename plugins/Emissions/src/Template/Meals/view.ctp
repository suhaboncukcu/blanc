<?php
$this->extend('Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Meal'), ['action' => 'edit', $meal->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Meal'), ['action' => 'delete', $meal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meal->id)]) ?> </li>
<li><?= $this->Html->link(__('List Meals'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Meal'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Meal'), ['action' => 'edit', $meal->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Meal'), ['action' => 'delete', $meal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meal->id)]) ?> </li>
<li><?= $this->Html->link(__('List Meals'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Meal'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($meal->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($meal->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Amount') ?></td>
            <td><?= $this->Number->format($meal->amount) ?></td>
        </tr>
        <tr>
            <td><?= __('Emission Factor') ?></td>
            <td><?= $this->Number->format($meal->emission_factor) ?></td>
        </tr>
        <tr>
            <td><?= __('Impact') ?></td>
            <td><?= $this->Number->format($meal->impact) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($meal->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($meal->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Is Meat') ?></td>
            <td><?= $meal->is_meat ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Is Community') ?></td>
            <td><?= $meal->is_community ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Is Outside') ?></td>
            <td><?= $meal->is_outside ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

