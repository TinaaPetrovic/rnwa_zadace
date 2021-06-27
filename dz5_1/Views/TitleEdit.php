<h1>Edit title</h1>

<?php
/** @var $data */
//print_r($data);
?>

<div class="container">
    <form action="titles_update" method="post">
        <input type="hidden" name="id" value="<?= $data['title']->id ?>">
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <label for="name">Tip</label>
            <input type="text" class="form-control" name="type"  value="<?= $data['title']->type ?>">
        </div>
        <div class="row">
            <br><br>
            <input type="submit" value="Submit">
        </div>
    </form>
</div>