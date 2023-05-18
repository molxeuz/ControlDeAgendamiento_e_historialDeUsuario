<?php 

    include("controller/db.php"); 

    require('librerias/fpdf.php');

    $sql = "SELECT identificacion_paciente, altura_paciente, peso_paciente, traumaticos, patologicos, tratamiento_previo, motivo_consulta, columna, pelvis, extremidades, zona_craneal, nombre_doctor FROM historial";
    $resultado = $conn->query($sql);

    $pdf = new FPDF();

    $pdf->AddPage();

    $pdf->SetFont('Arial', '', 12);

    while ($fila = $resultado->fetch_assoc()) {
        
        class PDF extends FPDF {
            function Header() {
                $this->SetFont('Arial', 'B', 16);
                $this->Cell(0, 20, 'Registro de Pacientes', 0, 1, 'C');
            }
        
            function Footer() {
                $this->SetY(-15);
                $this->SetFont('Arial', 'I', 8);
                $this->Cell(0, 10, 'Pagina '.$this->PageNo().'/{nb}', 0, 0, 'C');
            }
        }
        
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(60, 10, 'Datos de campo', 1, 0, 'C');
        $pdf->Cell(130, 10, 'Datos de registro', 1, 1, 'C');
        
        $pdf->SetFont('Arial', '', 12);
        
        $datos = array(
            array('Identificacion', $fila['identificacion']),
            array('Tipo Identificacion', $fila['tipoidentificacion']),
            array('Nombre', $fila['nombre']),
            array('Telefono', $fila['telefono']),
            array('Correo', $fila['correo']),
            array('Fecha de Nacimiento', $fila['fechanacimiento']),
            array('Genero', $fila['genero']),
            array('Direccion', $fila['direccion']),
            array('Foto del paciente', $fila['imagen_paciente'])
        );
        
        foreach ($datos as $filaDatos) {
            $campo = $filaDatos[0];
            $valor = $filaDatos[1];
        
            $pdf->Cell(60, 10, $campo, 1, 0, 'L');
            $pdf->Cell(130, 10, $valor, 1, 1, 'L');
        }

    }

    $pdf->Output('Registro_historial_clinico.pdf', 'D');
    
?>