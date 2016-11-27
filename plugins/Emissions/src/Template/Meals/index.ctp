<?php
/* @var $this \Cake\View\View */
$this->extend('Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Meal'), ['action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('amount'); ?></th>
            <th><?= $this->Paginator->sort('is_meat'); ?></th>
            <th><?= $this->Paginator->sort('is_community'); ?></th>
            <th><?= $this->Paginator->sort('is_outside'); ?></th>
            <th><?= $this->Paginator->sort('emission_factor'); ?></th>
            <th><?= $this->Paginator->sort('impact'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($meals as $meal): ?>
        <tr>
            <td><?= $this->Number->format($meal->id) ?></td>
            <td><?= $this->Number->format($meal->amount) ?></td>
            <td><?= h($meal->is_meat) ?></td>
            <td><?= h($meal->is_community) ?></td>
            <td><?= h($meal->is_outside) ?></td>
            <td><?= $this->Number->format($meal->emission_factor) ?></td>
            <td><?= $this->Number->format($meal->impact) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $meal->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $meal->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $meal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meal->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
