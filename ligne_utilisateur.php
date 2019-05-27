<tr>
    <th scope="row"><?php echo $nom; ?></th>
    <td><?php echo $password; ?></td>
    <td>
        <form action="" method="post">
            <input type="hidden" name="id_user" value="<?php echo $nom; ?>">
            <input type="submit" class="btn btn-danger" name="submit" value="Supprimer">
        </form>
    </td>
</tr>