<?php
    include("../admin/includes/sidebar.php");
?>
            
            <div class="primary__container">
                <div class="inner__container">
                    <div>
                        <p class="container__title border__bottom">MANAGE PROJECTS</p>
                        <div class="p__20">
                            <table id="categories">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>PROJECT TITLE</th>
                                        <th>DESCRIPTION</th>
                                        <th>CREATED AT</th>
                                        <th>START DATE</th>
                                        <th>COMPLETION DATE</th>
                                        <th>STATUS</th>
                                        <th style="width: 10%">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $records = fetchProjects();
                                        $counter = 1;
                                        foreach($records as $record){?>
                                            <tr>
                                                <td><?php echo ucwords($record['PROJECT_ID']); ?></td>
                                                <td><?php echo ucwords($record['PROJECT_TITLE']); ?></td>
                                                <td><?php echo ucwords($record['DESCRIPTION']); ?></td>
                                                <td><?php echo $record['DATE_TIME_CREATED'] ?></td>
                                                <td><?php echo $record['START_DATE'] ?></td>
                                                <td><?php echo $record['PLANNED_COMPLETION_DATE'] ?></td>
                                                <td><?php echo $record['STATUS'] ?></td>
                                                <td>
                                                    <div class="action__group">
                                                        <a class="action action__default" id="edit" href=""><ion-icon name="create-outline"></ion-icon></a>
                                                        <?php  
                                                            if($record['STATUS']=='CAMPAIGNING'){?>
                                                                <a class="action action__success" id="activate" href=""><ion-icon name="arrow-undo-outline"></ion-icon></a>
                                                                <?php
                                                            }else {?>
                                                                <a class="action action__warning" id="deactivate" href=""><ion-icon name="arrow-undo-outline"></ion-icon></a>
                                                             <?php
                                                            }
                                                        ?>
                                                        <a class="action action__danger" id="delete" href=""><ion-icon name="trash-outline"></ion-icon></a>
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
        $(document).ready(function(){
            $('#categories').DataTable();
            tippy('#edit', {
                content: 'Edit Details',
            });
            tippy('#activate', {
                content: 'Publish',
            });
            tippy('#deactivate', {
                content: 'Campaining',
            });
            tippy('#delete', {
                content: 'Delete',
            });
        });
    </script>
</body>
</html>