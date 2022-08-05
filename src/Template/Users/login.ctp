<a href="signup">Signup</a>

<h1>Login</h1>

<?= $this->Form->create('', [
    'id' => ''
]) ?>

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
$this->Form->input('Login', [
    'type' => 'submit',
    'label' => false
])
?>

<?= $this->Form->end() ?>

