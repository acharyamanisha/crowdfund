<?php
include("../admin/includes/sidebar.php");
?>

<div class="primary__container">
    <div class="inner__container">


        <div>
            <p class="container_title border_bottom">MANAGE CATEGORIES</p>
            <div class="p__20">
                <table id="categories">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>DESCRIPTION</th>
                            <th>STATUS</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $records = fetchCategories();
                        $counter = 1;
                        foreach ($records as $record) { ?>
                            <tr>
                                <td><?php echo ucwords($record['CATEGORY_ID']); ?></td>
                                <td><?php echo ucwords($record['NAME']); ?></td>
                                <td><?php echo ucwords($record['DESCRIPTION']); ?></td>
                                <td>
                                    <?php
                                    if ($record['STATUS'] == 0) { ?>
                                        <!-- <span class="tag tag__danger"><?php echo "Deactive"; ?></span> -->
                                        <?php
                                    } else if ($record['STATUS'] == 1) { ?>
                                            <span class="tag tag__success"><?php echo "Active"; ?></span>
                                        <?php
                                    }
                                    ?>
                                </td>

                                <td>
                                    <div class="action__group">
                                        <a class="action action__default" id="edit" href=""><ion-icon
                                                name="create-outline"></ion-icon></a>
                                        <?php
                                        if ($record['STATUS'] == 0) { ?>
                                            <a class="action action__success" id="activate" href=""><ion-icon
                                                    name="arrow-undo-outline"></ion-icon></a>
                                            <?php
                                        } else if ($record['STATUS'] == 1) { ?>
                                                <a class="action action__warning" id="deactivate" href=""><ion-icon name="arrow-undo-outline"></ion-icon></a>
                                            <?php
                                        }
                                        ?>
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
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#categories').DataTable();
        tippy('#edit', {
            content: 'Edit Details',
        });
        tippy('#activate', {
            content: 'Activate',
        });
        tippy('#deactivate', {
            content: 'Deactivate',
        });
        tippy('#delete', {
            content: 'Delete',
        });
    });
</script>
</body>

</html>