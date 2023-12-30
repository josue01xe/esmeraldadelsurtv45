<?php
require('./fpdf.php');

class PDF extends FPDF
{
    private $conexion; // Variable para la conexión a la base de datos

    // Constructor que recibe la conexión a la base de datos
    public function __construct($conexion)
    {
        parent::__construct();
        $this->conexion = $conexion;
    }

    // Cabecera de página
    function Header()
    {

        $this->Image('EDS PNG 02.png', 179, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
        $this->SetFont('Helvetica', 'U', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
        $this->Cell(35); // Movernos a la derecha
        $this->SetTextColor(0, 0, 0); //color
        //creamos una celda o fila
        $this->Cell(110, 15, utf8_decode('CONTRATO DE SERVICIO PUBLICITARIO'), 0, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
        $this->Ln(3); // Salto de línea
        $this->SetTextColor(70); //color

        /* UBICACION */
        $this->Cell(1);  // Mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $texto = utf8_decode("");
        $this->MultiCell(0, 6, $texto);
        $this->Ln(-6);

    }

    // Función para obtener los datos de contrato desde la base de datos
    public function obtenerDatosContratoR($idcontrato)
    {
        $datosContrato = [];

        // Ejemplo de consulta, debes ajustarla según tu base de datos y tabla
        $stmt = $this->conexion->prepare("CALL ListarContratosR(?)");
        $stmt->bind_param("i", $idcontrato);
        $stmt->execute();

        $result = $stmt->get_result();

        while ($fila = $result->fetch_assoc()) {
            $datosContrato[] = $fila;
        }

        $stmt->close();

        return $datosContrato;
    }

    // Función para añadir los datos de contrato a la tabla
    public function agregarDatosContratoR($idcontrato)
    {
        $datosContrato = $this->obtenerDatosContratoR($idcontrato); // Obtener los datos de contrato desde la base de datos

        foreach ($datosContrato as $dato) {
         $this->SetTextColor(70); //color
         $this->Cell(1);  // Mover a la derecha
         $this->SetFont('Arial', 'B', 10);
         $this->MultiCell(0, 6, utf8_decode('Conste por el presente documento privado el Contrato de Servicios, que celebran por una parte, la empresa Esmeralda del Sur Televisión- con Cobertura a nivel Regional, Canal 45 señal abierta, Cable Dunas Canal 83 (EDS-Tv) con domicilio legal para efectos en Entrada Tres Marías, Pasaje las Campiñas, debidamente representado por el:________________________ identificado con DNI: ____________, a quien se le denominará el contratista y de la otra parte: ' . $dato['empresa'] . ', debidamente representada por el/la Sr./Sra: ' . $dato['persona'] . ', identificado con DNI: ' . $dato['nrodocumento'] . ', a quien se le denominará el contratante conforme a los términos y condiciones siguientes:'));
         $this->Ln(5);

                 /* TELEFONO */
        $this->Cell(1);  // mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(59, 10, utf8_decode("PRIMERA.- LA EMPRESA se compromete a las siguientes cláusulas. "));
        $this->Ln(9);
               /* CAMPOS DE LA TABLA */
        //color
        $this->SetFillColor(50, 54, 57); //colorFondo
        $this->SetTextColor(255, 255, 255); //colorTexto
        $this->SetDrawColor(163, 163, 163); //colorBorde
        $this->SetFont('Arial', 'B', 11);
        //$this->Cell(18, 10, utf8_decode('N°'), 1, 0, 'C', 1);
        $this->Cell(42, 10, utf8_decode('Nombre del programa'), 1, 0, 'C', 1);
        $this->Cell(47, 10, utf8_decode('Duracion(DIAS - MESES)'), 1, 0, 'C', 1);
        $this->Cell(40, 10, utf8_decode('Horario programa'), 1, 0, 'C', 1);
        $this->Cell(47, 10, utf8_decode('Periodo'), 1, 1, 'C', 1);




        $this->SetFillColor(228, 100, 0);
        $this->SetTextColor(0);
        $this->SetFont('Arial', '', 11);
        

         

        foreach ($datosContrato as $dato) {
            //$this->Cell(18, 10, $dato['idcontrato'], 1, 0, 'C', 0);
            $this->Cell(42, 10, utf8_decode('Spot ' . $dato['duracionspot']), 1, 0, 'C', 0);
            $this->Cell(47, 10, utf8_decode(''), 1, 0, 'C', 0);
            $this->Cell(40, 10, utf8_decode('Cada día ' . $dato['cantanunciosdia'] . ' anuncios'), 1, 0, 'C', 0);
            $this->Cell(47, 10, utf8_decode($dato['fechainicio'] . ' - ' . $dato['fechafin']), 1, 0, 'C', 0);
            $this->Ln(12);

            $this->SetTextColor(70); //color
            $this->Cell(1);  // Mover a la derecha
            $this->SetFont('Arial', 'B', 10);
            $texto = utf8_decode("SEGUNDA.- EL CLIENTE, formaliza el presente contrato, con el pago del 50% del monto total, en la oficina del canal, a la persona autorizada y acreditada por la Empresa. (ESTOS COSTOS NO INCLUYE I.G.V.), por lo tanto se compromete abonar la cantidad de:");
            $this->MultiCell(0, 6, $texto);
            $this->Ln(1);

        
               
               

   // Títulos de la tabla de pagos
   $this->SetFillColor(50, 54, 57); //colorFondo
   $this->SetTextColor(255, 255, 255);
   $this->Cell(7);  // Mover a la derecha
   $this->SetDrawColor(163, 163, 163);
   $this->SetFont('Arial', 'B', 11);
   //$this->Cell(18, 10, utf8_decode('N'), 1, 0, 'C', 1);
   $this->Cell(70, 10, utf8_decode("COSTO - TRATADO (No incluye I.G.V)"), 1, 0, 'C', 1);
   $this->Cell(28, 10, utf8_decode('INICIAL       '), 1, 0, 'C', 1);
   //$this->Cell(64, 10, utf8_decode('PAGO AL CONTADO RESTA 50%'), 1, 0, 'C', 1);
   $this->Cell(60, 10, utf8_decode('FECHA PENDIENTES DE PAGO:'), 1, 1, 'C', 1);
        }
    }
   }

   // Función para obtener los datos de los pagos del contrato
   public function obtenerDatosPagosContratoR($idcontrato)
   {
       $pagosContrato = [];

       $stmt = $this->conexion->prepare("CALL ListarPagosContrato(?)");
       $stmt->bind_param("i", $idcontrato);
       $stmt->execute();

       $result = $stmt->get_result();

       while ($fila = $result->fetch_assoc()) {
           $pagosContrato[] = $fila;
       }

       $stmt->close();

       return $pagosContrato;
   }

   // Función para agregar los datos de los pagos a la tabla
   public function agregarDatosPagosContratoR($idcontrato)
   {
       $pagosContrato = $this->obtenerDatosPagosContratoR($idcontrato);

       $this->SetFillColor(228, 100, 0);
       $this->SetTextColor(0);
       $this->SetFont('Arial', '', 11);

       foreach ($pagosContrato as $dato) {
        $this->Cell(7);  // Mover a la derecha
           //$this->Cell(18, 10, $dato['idpago'], 1, 0, 'C', 0);
           $this->Cell(70, 10, utf8_decode($dato['idplan']), 1, 0, 'C', 0);
           $this->Cell(28, 10, utf8_decode($dato['monto']), 1, 0, 'C', 0);
           //$this->Cell(64, 10, utf8_decode(''), 1, 0, 'C', 0);
           $this->Cell(60, 10, utf8_decode($dato['fechapago']), 1, 1, 'C', 0);
    }

       $this->Ln(2);
       $this->SetTextColor(70); //color
       $this->Cell(1);  // Mover a la derecha
       $this->SetFont('Arial', 'B', 10);
       $texto = utf8_decode("TERCERO.- En caso de Programas Especiales, los avisos o espacios contratados podran reajustarse en su horario de transmision, sin perjuicios del CLIENTE, pero por motivos fortuitos ajenos a la Empresa, se asumira como cumplida transmisión.");
       $this->MultiCell(0, 6, $texto);
       $this->Ln(3);

       $this->SetTextColor(70); //color
       $this->Cell(1);  // Mover a la derecha
       $this->SetFont('Arial', 'B', 10);
       $texto = utf8_decode("CUARTA.- Ambas partes se comprometen a cumplir, estrictamente, el presente contrato a la firma del mismo, respetando las cláusulas establecidas.");
       $this->MultiCell(0, 6, $texto);
       $this->Ln(1);

       $this->SetTextColor(70); //color
       $this->Cell(132);  // Mover a la derecha
       $this->SetFont('Arial', 'B', 10);
       $texto = utf8_decode("Sunampe __ de _______ del 2023");
       $this->MultiCell(0, 10, $texto);
       //$this->Ln(10);
   }

   // Pie de página
   function Footer()
   {
    $this->SetTextColor(70); //color
    $this->Ln(60);

    // Bloque izquierdo
    $this->SetFont('Arial', 'B', 10);
    $this->MultiCell(0, 0, utf8_decode("________________"),"","L");

    // Bloque derecho
    $this->SetFont('Arial', 'B', 10);
    $this->MultiCell(0, 0, utf8_decode("______________________________"),"","R");

    $this->Ln(5);
    // $this->Cell(5);  // Mover a la derecha
    $this->MultiCell(0, 0, utf8_decode("CLIENTE:"),"","L");
    $this->MultiCell(151, 0, utf8_decode("NOMBRE:"),"","R");

    $this->Ln(8);
    $this->MultiCell(0, 0, utf8_decode("DNI:"),"","L");
    $this->MultiCell(151, 0, utf8_decode("DNI:"),"","R");
   }
}

// Crear la conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "proyectend");

// Verificar la conexión
if ($conexion->connect_error) {
   die("Error de conexión: " . $conexion->connect_error);
}

// Obtener el ID de contrato desde la URL o cualquier fuente necesaria
$idcontrato = isset($_GET['idcontrato']) ? $_GET['idcontrato'] : 0;

if ($idcontrato > 0) {
   $pdf = new PDF($conexion);
   $pdf->AddPage();
   $pdf->agregarDatosContratoR($idcontrato);
   $pdf->agregarDatosPagosContratoR($idcontrato); // Agregar la tabla de pagos
   $pdf->Output('Reporte.pdf', 'I');
} else {
   echo "ID de contrato no válido";
}

$conexion->close();
?>