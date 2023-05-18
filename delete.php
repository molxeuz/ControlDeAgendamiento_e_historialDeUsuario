<?php    

include("controller/db.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM usuarios WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query failed");
    }
    
    $_SESSION['message'] = 'Borrado con exito';
    $_SESSION['message_type'] = 'danger';
    header("location: index_lista_paciente.php");
    
}

?>