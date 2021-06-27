
<h1>Edit professor</h1>

<?php
/** @var $data */
//print_r($data);
?>

<div class="container">
    <form action="professors_update" method="post">
        <input type="hidden" name="id" value="<?= $data['professor']->id ?>">
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <label for="name">Ime</label>
            <input type="text" class="form-control" name="name" value="<?= $data['professor']->name ?>">
        </div>
        <div class="row">
            <div class="col-25">
                <label for="rid">Odjeljenje</label>
            </div>
            <div class="col-75">
                <select id="dep_id" name="dep_id">
                    <option value="-1" selected disabled>Odaberite odjeljenje</option>
                    <?php foreach ($data['departments'] as $department): ?>
                        <option value="<?=$department->id?>" <?= $department->id == $data['professor']->department_id ? 'selected' : '' ?>><?=$department->name?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-25">
                <label for="titles[]">Titule</label>
            </div>
            <div class="col-75">
                <select multiple id="titles[]" name="titles[]">
                    <option selected disabled>Odaberite titule</option>
                    <?php foreach ($data['titles'] as $title): ?>
                        <option value="<?=$title->id?>" <?= in_array($title, $data['professor']->titles) ? 'selected' : '' ?>><?=$title->type?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <br><br>
        <div class="row">
            <br><br>
            <input type="submit" value="Submit">
        </div>
    </form>
</div>