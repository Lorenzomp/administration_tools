<tr>
    <form action="" method="post">
    <th scope="row"><?php echo $nom; ?></th>
    <td><input type="text" name="mdp" value="<?php echo $password; ?>"></td>
    <td>
            <input  type="submit" class="btn btn-primary" name="submit_modifier" value="Modifier">
    </td>
    <td>
            <input type="hidden" name="id_user" value="<?php echo $nom; ?>">
            <input type="submit" class="btn btn-danger" name="submit" value="Supprimer">
    </td>
    </form>
</tr>