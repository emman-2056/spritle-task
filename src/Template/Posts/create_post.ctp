<h1>Create Post</h1>

<?= $this->Form->create('', [
    'id' => ''
]) ?>

<?=
$this->Form->input('title', [
    'type' => 'text',
    'placeholder' => 'Title',
    'label' => false,
    'required'
])
?>

<?=
$this->Form->input('content', [
    'type' => 'textarea',
    'placeholder' => 'Content',
    'label' => false,
    'required'
])
?>

<?=
$this->Form->input('Save Post', [
    'type' => 'submit',
    'label' => false
])
?>

<?= $this->Form->end() ?>