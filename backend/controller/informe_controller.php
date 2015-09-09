<?php

class Informe_controller extends Controller {

    private $_informe_model;

    public function __construct() {
        parent::__construct();
        $this->_informe_model = $this->load_model('informe_model');
        $this->fpdf = $this->load_library('fpdf');
    }

    public function index() {
        $this->_view->tittle = 'INFORMES';
        $this->_view->renderizar('informe');
    }     

//1
    public function maintenances_of_month() {

        $this->fpdf->AddPage();

            //add date
        $this->fpdf->SetFont('Arial','B',10);   
        $this->fpdf->Cell(190, 10, date("d/m/Y"), 0, 2, "R");        
        $this->fpdf->Ln(5);

            //add title
        $this->fpdf->SetFont('Arial','B',15);                    
        $this->fpdf->Cell(190,10, utf8_decode('COORPORACIÓN DE RESCATE GARSA'), 0, 2, "C");
        $this->fpdf->Ln(5);

            //add subtitle
        $this->fpdf->SetFont('Arial', '', 15);   
        $this->fpdf->Cell(190, 10, "Mantenimientos del mes", 0, 2, "L");        
        $this->fpdf->Ln(5);

        $data = $this->_informe_model->mantenimientos_del_mes();
        $header = array('Nombre', 'Codigo', 'Proximo mantenimiento');
        $this->fpdf->SetFont('Arial','',14);

           // Cabecera
        foreach($header as $key => $value)
            $this->fpdf->Cell(55, 7, $value, 1);
        $this->fpdf->Ln();
            // Datos
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->fpdf->Cell(55 , 6, $col, 1);
            $this->fpdf->Ln();
        }

        $this->fpdf->Output();  	  
    }

//2
    public function medical_and_tool_expire_in_month() {

        $this->fpdf->AddPage();

            //add date
        $this->fpdf->SetFont('Arial','B',10);   
        $this->fpdf->Cell(190, 10, date("d/m/Y"), 0, 2, "R");        
        $this->fpdf->Ln(5);

            //add title
        $this->fpdf->SetFont('Arial','B',15);                    
        $this->fpdf->Cell(190,10, utf8_decode('COORPORACIÓN DE RESCATE GARSA'), 0, 2, "C");
        $this->fpdf->Ln(5);

            //add subtitle
        $this->fpdf->SetFont('Arial', '', 15);   
        $this->fpdf->Cell(190, 10, "Medicamentos y utensilios a vencer este mes", 0, 2, "L");        
        $this->fpdf->Ln(5);

        $data = $this->_informe_model->m_u_vencer_mes();
        $header = array('Nombre', 'Presentacion', 'Lote', 'Cantidad', 'Expiracion');
        $this->fpdf->SetFont('Arial','',14);

           // Cabecera
        foreach($header as $key => $value)
            $this->fpdf->Cell(35, 7, $value, 1);
        $this->fpdf->Ln();
            // Datos
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->fpdf->Cell(35 , 6, $col, 1);
            $this->fpdf->Ln();
        }

        $this->fpdf->Output();        
    }   

//3
    public function events_of_months() {

        $this->fpdf->AddPage("L");

            //add date
        $this->fpdf->SetFont('Arial','B',10);   
        $this->fpdf->Cell(240, 10, date("d/m/Y"), 0, 2, "R");        
        $this->fpdf->Ln(5);

            //add title
        $this->fpdf->SetFont('Arial','B',15);                    
        $this->fpdf->Cell(190,10, utf8_decode('COORPORACIÓN DE RESCATE GARSA'), 0, 2, "C");
        $this->fpdf->Ln(5);

            //add subtitle
        $this->fpdf->SetFont('Arial', '', 15);   
        $this->fpdf->Cell(190, 10, "Eventos del mes", 0, 2, "L");        
        $this->fpdf->Ln(5);

        $data = $this->_informe_model->eventos_del_mes();
        $header = array('Nombre', 'F. Inicial', 'F. Final', 'Duracion', 'Capacidad', 'Aforo');
        $this->fpdf->SetFont('Arial','',10);

           // Cabecera
        foreach($header as $key => $value)
            $this->fpdf->Cell(40, 7, $value, 1);
        $this->fpdf->Ln();
            // Datos
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->fpdf->Cell(40, 6, $col, 1);
            $this->fpdf->Ln();
        }

        $this->fpdf->Output();        
    }   

//4
    public function users_active() {

        $this->fpdf->AddPage("L");

            //add date
        $this->fpdf->SetFont('Arial','B',10);   
        $this->fpdf->Cell(240, 10, date("d/m/Y"), 0, 2, "R");        
        $this->fpdf->Ln(5);

            //add title
        $this->fpdf->SetFont('Arial','B',15);                    
        $this->fpdf->Cell(190,10, utf8_decode('COORPORACIÓN DE RESCATE GARSA'), 0, 2, "C");
        $this->fpdf->Ln(5);

            //add subtitle
        $this->fpdf->SetFont('Arial', '', 15);   
        $this->fpdf->Cell(190, 10, "Usuarios activos", 0, 2, "L");        
        $this->fpdf->Ln(5);

        $data = $this->_informe_model->usuarios_activos();
        $header = array('Identificacion', 'Nombre', 'Telefono', 'Celular', 'Email');
        $this->fpdf->SetFont('Arial','',10);

           // Cabecera
        foreach($header as $key => $value)
            $this->fpdf->Cell(50, 7, $value, 1);
        $this->fpdf->Ln();
            // Datos
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->fpdf->Cell(50, 6, $col, 1);
            $this->fpdf->Ln();
        }

        $this->fpdf->Output();        
    }   
    
    //5
    public function people_company_active() {

        $this->fpdf->AddPage("L");

            //add date
        $this->fpdf->SetFont('Arial','B',10);   
        $this->fpdf->Cell(240, 10, date("d/m/Y"), 0, 2, "R");        
        $this->fpdf->Ln(5);

            //add title
        $this->fpdf->SetFont('Arial','B',15);                    
        $this->fpdf->Cell(190,10, utf8_decode('COORPORACIÓN DE RESCATE GARSA'), 0, 2, "C");
        $this->fpdf->Ln(5);

            //add subtitle
        $this->fpdf->SetFont('Arial', '', 15);   
        $this->fpdf->Cell(190, 10, "Personas/Empresas activas", 0, 2, "L");        
        $this->fpdf->Ln(5);

        $data = $this->_informe_model->Persona_empresa_activa();
        $header = array('Nombre', 'Direccion', 'Celular', 'Telefono', 'Tipo');
        $this->fpdf->SetFont('Arial','',10);

           // Cabecera
        foreach($header as $key => $value)
            $this->fpdf->Cell(52, 7, $value, 1);
        $this->fpdf->Ln();
            // Datos
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->fpdf->Cell(52, 6, $col, 1);
            $this->fpdf->Ln();
        }

        $this->fpdf->Output();        
    }  

//6
    public function medical_and_tool_active() {

        $this->fpdf->AddPage("L");

            //add date
        $this->fpdf->SetFont('Arial','B',10);   
        $this->fpdf->Cell(240, 10, date("d/m/Y"), 0, 2, "R");        
        $this->fpdf->Ln(5);

            //add title
        $this->fpdf->SetFont('Arial','B',15);                    
        $this->fpdf->Cell(190,10, utf8_decode('COORPORACIÓN DE RESCATE GARSA'), 0, 2, "C");
        $this->fpdf->Ln(5);

            //add subtitle
        $this->fpdf->SetFont('Arial', '', 15);   
        $this->fpdf->Cell(190, 10, "Medicamentos/Utensilios activas", 0, 2, "L");        
        $this->fpdf->Ln(5);

        $data = $this->_informe_model->m_u_active();
        $header = array('Nombre', 'Presentacion', 'Lote', 'F. Vencimiento', 'Cantidad actual');
        $this->fpdf->SetFont('Arial','',10);

           // Cabecera
        foreach($header as $key => $value)
            $this->fpdf->Cell(52, 7, $value, 1);
        $this->fpdf->Ln();
            // Datos
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->fpdf->Cell(52, 6, $col, 1);
            $this->fpdf->Ln();
        }

        $this->fpdf->Output();        
    }   

    //7
    public function tools_active() {

        $this->fpdf->AddPage();

            //add date
        $this->fpdf->SetFont('Arial','B',10);   
        $this->fpdf->Cell(240, 10, date("d/m/Y"), 0, 2, "R");        
        $this->fpdf->Ln(5);

            //add title
        $this->fpdf->SetFont('Arial','B',15);                    
        $this->fpdf->Cell(190,10, utf8_decode('COORPORACIÓN DE RESCATE GARSA'), 0, 2, "C");
        $this->fpdf->Ln(5);

            //add subtitle
        $this->fpdf->SetFont('Arial', '', 15);   
        $this->fpdf->Cell(190, 10, "Herramientas activas", 0, 2, "L");        
        $this->fpdf->Ln(5);

        $data = $this->_informe_model->herramientas_activas();
        $header = array('Nombre', 'Codigo');
        $this->fpdf->SetFont('Arial','',10);

           // Cabecera
        foreach($header as $key => $value)
            $this->fpdf->Cell(52, 7, $value, 1);
        $this->fpdf->Ln();
            // Datos
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->fpdf->Cell(52, 6, $col, 1);
            $this->fpdf->Ln();
        }

        $this->fpdf->Output();        
    }
}
?>
