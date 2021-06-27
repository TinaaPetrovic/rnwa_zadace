<h1>Professors</h1>

<?php
/** @var $data */
//print_r($data);
?>

<div style="overflow-x:auto;">
    <table class="table">
        <tr>
            <th>#</th>
            <th>Ime</th>
            <th>Odjeljenje</th>
            <th>Titule</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($data['professors'] as $row): ?>
            <tr>
                <td><?php echo $row->id ?></td>
                <td><?php echo $row->name ?></td>
                <td><?php echo $row->department_name ?></td>
                <td>
                    <?php foreach ($row->titles as $title): ?>
                    <?= $title->type.','?>
                    <?php endforeach; ?>
                </td>
                <td><a href="professors_edit?id=<?php echo $row->id ?>" class="btn btn-primary btn-xs"> Edit</a>
                </td>
                <td>
                    <form action="professors_delete" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?= $row->id ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>



