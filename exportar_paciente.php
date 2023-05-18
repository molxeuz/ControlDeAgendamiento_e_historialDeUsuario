<?php 

    include("controller/db.php"); 

    require('librerias/fpdf.php');

    $sql = "SELECT identificacion, tipoidentificacion, nombre, telefono, correo, fechanacimiento, genero, direccion, imagen_paciente FROM usuarios";
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
        
        // Mostrar la imagen del paciente con descripción
        if (!empty($fila['imagen_paciente']) && file_exists($fila['imagen_paciente'])) {
            $pdf->Ln(10);
            $pdf->Cell(0, 10, 'Foto del paciente', 0, 1, 'L');
            $pdf->Ln(5);
            
            // Obtener las dimensiones de la imagen
            $imageSize = getimagesize($fila['imagen_paciente']);
            $imageWidth = $imageSize[0];
            $imageHeight = $imageSize[1];
            
            // Ajustar el tamaño de la imagen según el ancho deseado y mantener la proporción
            $maxWidth = 100; // Ajusta el ancho máximo según tus necesidades
            $maxHeight = 0; // Deja la altura máxima en 0 para mantener la proporción
            $pdf->Image($fila['imagen_paciente'], $pdf->GetX(), $pdf->GetY(), $maxWidth, $maxHeight);
            
            $pdf->Ln($imageHeight + 10);
            $pdf->MultiCell(0, 10, 'Descripción de la imagen del paciente', 0, 'L');
        }

    }

    $pdf->Output('Registro_paciente.pdf', 'D');
    
?>