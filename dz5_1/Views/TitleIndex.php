<h1>Titles</h1>

<?php
/** @var $data */
?>

<div style="overflow-x:auto;">
    <table class="table">
        <tr>
            <th>#</th>
            <th>Tip</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($data['titles'] as $row): ?>
            <tr>
                <td><?php echo $row->id ?></td>
                <td><?php echo $row->type ?></td>
                <td><a href="titles_edit?id=<?php echo $row->id ?>" class="btn btn-primary btn-xs"> Edit</a>
                </td>
                <td>
                    <form action="titles_delete" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?= $row->id ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>



