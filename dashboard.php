<?php
    include("includes/sidebar.php");
    // session_start();
    // include("dbconn.php"); // Ensure this file establishes the `$conn` connection
?>

<div class="primary__container">
    <h1>Fundraise Data</h1>
    <table id="fundraiseTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Email ID</th>
                <th>Pledged Money</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Query to fetch data from the fundraise table
                $query = "SELECT EMAIL_ID, PLEDGED_MONEY FROM funds";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['EMAIL_ID']) . "</td>
                                <td>" . htmlspecialchars($row['PLEDGED_MONEY']) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No fundraise data available.</td></tr>";
                }
            ?>
        </tbody>
    </table>
</div>

<!-- Include necessary JS and CSS for DataTable -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"></script>

<script>
    $(document).ready(function() {
        $('#fundraiseTable').DataTable(); // Initialize DataTable for enhanced table features
    });
</script>
