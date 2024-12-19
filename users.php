<?php
include("../admin/includes/sidebar.php");
?>

<div class="primary__container">
    <div class="inner__container">


        <div>
            <p class="container__title border__bottom">MANAGE USERS</p>
            <div class="p__20">
                <table id="customers">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>EMAIL</th>
                            <th>NAME</th>
                            <th>COUNTRY</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $records = fetchUsers();
                        $counter = 1;
                        foreach ($records as $record) { ?>
                            <tr>
                                <td><?php echo $counter;
                                $counter += 1; ?></td>
                                <td><?php echo ucwords($record['EMAIL_ID']); ?></td>
                                <td><?php echo ucwords($record['FIRST_NAME']) . " " . ucwords($record['LAST_NAME']); ?></td>
                                <td><?php echo ucwords($record['COUNTRY']); ?></td>
                                <td>
                                    <div class="action__group">
                                        <a class="action action__default" id="edit" href=""><ion-icon
                                                name="create-outline"></ion-icon></a>
                                        <a class="action action__success open__modal" id="order"
                                            data-id="<?php echo $record['EMAIL_ID']; ?>"><ion-icon
                                                name="document-outline"></ion-icon></a>
                                        <a class="action action__danger" id="delete" href=""><ion-icon
                                                name="trash-outline"></ion-icon></a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script src="admin_js/jquery.min.js"></script>
<script src="js/adminlte.min.js"></script>
<script src="admin/js/script.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#customers').DataTable();
        tippy('#edit', {
            content: 'Edit Details',
        });
        tippy('#order', {
            content: 'View Posts',
        });
        tippy('#delete', {
            content: 'Delete',
        });
    });
</script>
</body>

</html>