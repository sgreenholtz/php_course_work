<table>
   <?php while ($row = mysqli_fetch_assoc($selected))
    { ?>
        <tr>
            <td>
                Once there was a <?= $row["adjective"]?> <?=$row["noun"]?> from 
                Texas who like to <?= $row["adverb"]?> <?=$row["verb"]?> anyone 
                passing by.
            </td>
        </tr>
    <?php } ?>
</table>