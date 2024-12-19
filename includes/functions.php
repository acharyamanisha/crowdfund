<?php
    include("connect.php");
    session_start();
    
    function safeInput($string){
        $string=strip_tags($string);
        return $string;
    }

    function fetchRecordsBasedOnId($table, $id){
        global $conn;
        $query="SELECT * FROM $table WHERE id='$id'";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_assoc($result);
        return $row;
    }

    function successAlert($text, $redirectUrl) {
        $text = safeInput($text);
        echo "<script>
            swal({
                title: 'Success!',
                text: '$text',
                icon: 'success',
                button: 'Ok!'
            }).then(function(){
                location.href='$redirectUrl';
            });
        </script>";
    }

    function errorAlert($text, $redirectUrl) {
        $text = safeInput($text);
        echo "<script>
            swal({
                title: 'Error!',
                text: '$text',
                icon: 'error',
                button: 'Ok!'
            }).then(function(){
                location.href='$redirectUrl';
            });
        </script>";
    }

    function fetchCategories(){
        global $conn;
        
        $sql    = "SELECT * FROM category";
        $query  = mysqli_query($conn,$sql);

        while($row  = mysqli_fetch_assoc($query)){
            $records[]  = $row;
        }

        return $records;
    }

    function fetchUsers(){
        global $conn;
        $sql="SELECT * from USER";
        $query=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($query)){
            $records[]=$row;
        }
        return $records;
    }

    function fetchProjects(){
        global $conn;
        $sql="SELECT * from PROJECT";
        $query=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($query)){
            $records[]=$row;
        }
        return $records;
    }
?>