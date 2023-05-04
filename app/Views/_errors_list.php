<?php $errors = [
    'nama_pemilik' => 'The Nama pemilik field must be unique.',
];?>

<?php if (! empty($errors)): ?>
<div class="alert alert-danger" role="alert">
    <ul>
        <?php foreach ($errors as $error): ?>
        <li><?= esc($error) ?></li>
        <?php endforeach ?>
    </ul>
</div>
<?php endif ?>