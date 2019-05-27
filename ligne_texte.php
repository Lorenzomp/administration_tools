<tr>
    <form action="" method="post">
    <th class="align-middle" scope="row"><?php echo $page; ?></th>
        <input value="<?php echo $page ?>" type="hidden" name="page_a_modifier" >
    <td class="align-middle"><?php echo $numero_emplacement; ?></td>
    <td><input name="texte_a_modifier" style="height: 200px; width: 100%" type="text" value="<?php echo $texte; ?>"></td>
    <td class="align-middle">
            <input type="hidden" name="numero_emplacement" value="<?php echo $numero_emplacement; ?>">
            <input  type="submit" class="btn btn-primary" name="submit_modifier" value="Modifier">

    </td>
    </form>
</tr>