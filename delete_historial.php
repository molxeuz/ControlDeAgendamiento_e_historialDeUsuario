<?php    

    include("controller/db.php");

    if(isset($_GET['id_historial'])) {
        $id = $_GET['id_historial'];
        $query = "DELETE FROM historial WHERE id_historial = $id";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query failed");
        }
        
        $_SESSION['message'] = 'Borrado con exito';
        $_SESSION['message_type'] = 'danger';
        header("location: index_lista_historial.php");
        
    }

?>