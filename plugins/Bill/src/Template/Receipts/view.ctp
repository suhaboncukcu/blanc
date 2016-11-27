<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Receipt'), ['action' => 'edit', $receipt->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Receipt'), ['action' => 'delete', $receipt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $receipt->id)]) ?> </li>
<li><?= $this->Html->link(__('List Receipts'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Receipt'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Receipt'), ['action' => 'edit', $receipt->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Receipt'), ['action' => 'delete', $receipt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $receipt->id)]) ?> </li>
<li><?= $this->Html->link(__('List Receipts'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Receipt'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($receipt->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('File') ?></td>
            <td><?= h($receipt->file) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($receipt->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Date') ?></td>
            <td><?= h($receipt->date) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($receipt->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($receipt->modified) ?></td>
        </tr>
    </table>
</div>

