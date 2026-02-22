<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<label for="list">my list</label>
<select name="list" id="list">
    <?php for ($i = 1; $i <= 30; $i++):?>
        <option value="<?php $i?>"><?php echo $i?></option>
    <?php endfor; ?>
</select>
</body>
</html>

<?= __DIR__ ?>