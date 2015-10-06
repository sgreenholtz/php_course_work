<table>
   <?php while ($row = mysqli_fetch_assoc($selected))
    { 
        if ((empty($row["noun"])) || (empty($row["adjective"])) || 
            (empty($row["adverb"])) || (empty($row["verb"])))
        {
            // output nothing
        }
        else
        { ?>
            <tr>
                <td>
                Once there was a <?= $row["adjective"]?> <?=$row["noun"]?> from 
                Texas who like to <?= $row["adverb"]?> <?=$row["verb"]?> anyone 
                passing by.
                </td>
            </tr>
    <?php }  
    } ?>
</table>