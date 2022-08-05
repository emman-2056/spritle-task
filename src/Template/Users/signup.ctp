<h1>Signup</h1>

<?= $this->Form->create('', [
    'id' => ''
]) ?>

<?=
$this->Form->input('name', [
    'type' => 'text',
    'placeholder' => 'Name',
    'required',
    'label' => false
])
?>

<?=
$this->Form->input('email', [
    'type' => 'text',
    'placeholder' => 'Email',
    'label' => false,
    'required'
])
?>

<?=
$this->Form->input('password', [
    'type' => 'password',
    'placeholder' => 'Password',
    'label' => false,
    'required'
])
?>

<?=
$this->Form->input('Signup', [
    'type' => 'submit',
    'label' => false
])
?>

<?= $this->Form->end() ?>