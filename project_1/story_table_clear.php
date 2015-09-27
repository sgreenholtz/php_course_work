<table>
   <?php
    $select_last_query = "SELECT * FROM story ORDER BY id DESC LIMIT 1";
    $select_last = mysqli_query($dbc, $select_last_query);

   while ($row = mysqli_fetch_assoc($select_last))
    {
        ?>
            <tr>
                <td>
                Once there was a <?= $row["adjective"]?> <?=$row["noun"]?> from
                Texas who like to <?= $row["adverb"]?> <?=$row["verb"]?> anyone
                passing by.
                </td>
            </tr>
    <?php } ?>
</table>