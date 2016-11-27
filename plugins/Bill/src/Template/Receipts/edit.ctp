<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $receipt->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $receipt->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Receipts'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $receipt->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $receipt->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Receipts'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($receipt); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Receipt']) ?></legend>
    <?php
    echo $this->Form->input('date');
    echo $this->Form->input('file');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
