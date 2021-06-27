<h1>Add new department</h1>

<?php
/** @var $data */
//print_r($data);
?>

<div class="container">
    <form action="departments" method="post">
        <div class="row">
            <label for="name">Naziv</label>
            <input type="text" class="form-control" name="name">
        </div>
        <br><br>
        <div class="row">
            <br><br>
            <input type="submit" value="Submit">
        </div>
    </form>
</div>