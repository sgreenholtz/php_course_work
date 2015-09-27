<table>
   <?php while ($row = mysqli_fetch_assoc($selected))
    { ?>
        <tr>
            <td>
                Once there was a <?php $row["adjective"] . $row["noun"] ?> from 
                Texas who like to <?php $row["adverb"] . $row["verb"] ?> anyone 
                passing by.
            </td>
        </tr>
    <?php } ?>
</table>