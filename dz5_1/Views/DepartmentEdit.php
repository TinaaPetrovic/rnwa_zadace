<h1>Edit department</h1>

<?php
/** @var $data */
//print_r($data);
?>

<div class="container">
    <form action="departments_update" method="post">
        <input type="hidden" name="id" value="<?= $data['department']->id ?>">
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <label for="name">Naziv</label>
            <input type="text" class="form-control" name="name"  value="<?= $data['department']->name ?>">
        </div>
        <div class="row">
            <br><br>
            <input type="submit" value="Submit">
        </div>
    </form>
</div>