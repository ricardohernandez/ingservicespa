<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Inicio extends CI_Controller {

    function __construct(){
        parent::__construct();
    }


    public function index(){ 
        $datos = array(
           'titulo' => "Ley de ductos - Splice Chile",
           'contenido' => "inicio",
           'tipo' => 'home'

        );  
        $this->load->view('plantillas/plantilla_front_end',$datos);

    }   

    public function nosotros(){ 
        $datos = array(
           'titulo' => "Splice Chile - nosotros",
           'contenido' => "nosotros",
        );  
        $this->load->view('plantillas/plantilla_front_end',$datos);
    }   

    public function servicios(){ 
        $datos = array(
           'titulo' => "Splice Chile - servicios",
           'contenido' => "servicios",
        );  
        $this->load->view('plantillas/plantilla_front_end',$datos);
    }   

    public function clientes(){ 
        $datos = array(
           'titulo' => "Splice Chile - clientes",
           'contenido' => "clientes",
        );  
        $this->load->view('plantillas/plantilla_front_end',$datos);
    }   

    public function contacto(){ 
        $datos = array(
           'titulo' => "Splice Chile - contacto",
           'contenido' => "contacto",
        );  
        $this->load->view('plantillas/plantilla_front_end',$datos);
    }   

    public function servicio(){ 

        $data = array(
           'ingenieria' =>
               array(
                     'titulo'   => 'Ingeniería',
                     'imagen' => 'ingenieria.jpg',
                     'descripcion'   => '<div class="single-well">
                          <ul>

                            <li>
                              <i class="fa fa-check"></i> Walk out cartográfico, levantamiento técnico.
                            </li>

                            <li>
                              <i class="fa fa-check"></i> Survey y levantamiento técnico.
                            </li>
                            
                            <li>
                              <i class="fa fa-check"></i> Dibujo y digitalización de planos de proyectos de telecomunicaciones.
                            </li>
                            
                            <li>
                              <i class="fa fa-check"></i> Diseño de proyectos de redes de planta externa e interna (HFC , FTTX , Etc.) .
                            </li>
                            
                            <li>
                              <i class="fa fa-check"></i> Proyectos de obras civiles en general..
                            </li>
                            
                            <li>
                              <i class="fa fa-check"></i> Proyectos de ajuste de redes por modificaciones viales.
                            </li>
                            
                            <li>
                              <i class="fa fa-check"></i> Proyectos de acceso de redes verticales e inmobiliarias.
                            </li>

                            <li>
                              <i class="fa fa-check"></i> Proyectos de nueva ley de ductos (RIT).
                            </li>

                            <li>
                              <i class="fa fa-check"></i> Plataformas GE Smallworld, OSP (Out Side Plant) , Lode Data, Etc.
                            </li>

                          </ul>
                        </div>'
                    ),
          
           'construccion_redes' => array(
                     'titulo'   => 'Construcción de redes',
                     'imagen' => 'construccion.jpg',
                     'descripcion'   => '<div class="single-well">
                        <ul>
                          <li>
                            <i class="fa fa-check"></i> Construccion de edificios bajo Ley de ductos 20.808 .
                          </li>

                          <li>
                            <i class="fa fa-check"></i>Construcción de planta externa incluyendo la activación, equipado y tendido de redes de fibra óptica y cable coaxial.
                          </li>
                          <li>
                            <i class="fa fa-check"></i> Construcción de planta interna incluyendo la instalación de equipamiento y cableado de energía, coaxial y UTP.
                          </li>
                          <li>
                            <i class="fa fa-check"></i> Construcción de verticales en edificios con cableado, equipado y activación.
                          </li>
                          <li>
                            <i class="fa fa-check"></i> Gestión de permisos de acceso y de construcción.
                          </li>
                          <li>
                            <i class="fa fa-check"></i> Supervisión de tendidos de cables.
                          </li>
                          <li>
                            <i class="fa fa-check"></i> Certificación de proyectos.
                          </li>
                          <li>
                            <i class="fa fa-check"></i> Auditorias de redes.
                          </li>
                         
                        </ul>
                      </div>'
           ),

           'operacion_domiciliaria' => array(
                     'titulo'   => 'Operación domiciliaria',
                     'imagen' => 'operacion.jpg',
                     'descripcion'   => '<div class="single-well">
                      <ul>
                        <li>
                          <i class="fa fa-check"></i> Instalación y mantención de servicios de telecomunicaciones (Internet, telefonía, televisión) en distintos tipos de redes (HFC, DTH, Satelital).
                        </li>
                        <li>
                          <i class="fa fa-check"></i> Servicio técnico en domicilios de clientes para todos los servicios de telecomunicaciones de clientes residenciales.
                        </li>
                        <li>
                          <i class="fa fa-check"></i> Gestión de desconexión y retiro de equipamiento de domicilio de clientes.
                        </li>
                        <li>
                          <i class="fa fa-check"></i> Proyectos especiales (renovación tecnológica, cambio de baterías, etc.).
                        </li>
                        <li>
                          <i class="fa fa-check"></i> Gestión de factibilidades técnicas sistemáticas y en terreno.
                        </li>
                        <li>
                          <i class="fa fa-check"></i> Delivery de equipos a domicilios de clientes.
                        </li>
                      </ul>
                    </div>'
           ),
           'mantenimiento_redes' => array(
                     'titulo'   => 'Mantenimiento de redes',
                     'imagen' => 'mantenimiento.jpg',
                     'descripcion'   => '<div class="single-well">
                        <ul>
                          <li>
                            <i class="fa fa-check"></i> Ejecución de planes de mantención preventiva de redes HFC.
                          </li>
                          <li>
                            <i class="fa fa-check"></i> Ejecución de tareas de mantención correctiva de redes HFC.
                          </li>
                          <li>
                            <i class="fa fa-check"></i> Ejecución de modificaciones especiales.
                          </li>
                          <li>
                            <i class="fa fa-check"></i> Atención de urgencias de mantención de redes.
                          </li>
                        </ul>
                      </div>'
            ),

            'outsourcing' => array(
                   'titulo'   => 'Outsourcing',
                   'imagen' => 'outsourcing.jpg',
                   'descripcion'   => ' <div class="single-well">
                    <ul>
                      <li>
                        <i class="fa fa-check"></i> Programadores y desarrolladores de sistemas.
                      </li>
                      <li>
                        <i class="fa fa-check"></i> Analistas de base de datos.
                      </li>
                     
                      <li>
                        <i class="fa fa-check"></i> Supervisión e inspección de redes y equipos de operaciones.
                      </li>
                      <li>
                        <i class="fa fa-check"></i> Personal técnico y operadores especialistas.
                      </li>
                      <li>
                        <i class="fa fa-check"></i> Administrativos.
                      </li>
                       <li>
                        <i class="fa fa-check"></i> Nos adaptamos a los requerimientos de clientes.
                      </li>
                    </ul>
                  </div>'
             ),

            'gestion-inmobiliaria' => array(
                   'titulo'   => 'Gestion inmobiliaria',
                   'imagen' => 'gestion_inmobiliaria.jpg',
                   'descripcion'   => '<div class="single-well">
                    <ul>
                      <li>
                        <i class="fa fa-check"></i> Gestión de permisos de construcción y modificación de redes.
                      </li>
                      <li>
                        <i class="fa fa-check"></i> Proyectos de corrientes debiles (CCDD).
                      </li>
                      <li>
                        <i class="fa fa-check"></i> Estudio de mercado y levantamiento de infraestructuras.
                      </li>
                      <li>
                        <i class="fa fa-check"></i> Ejecutivos en gestión comercial.
                      </li>
                    </ul>
                  </div>'
            ),

            'ley-de-ductos' => array(
                   'titulo'   => 'Ley de ductos',
                   'imagen' => 'santiago.jpg',
                   'descripcion'   => '<div class="single-well">
                    <ul>
                      <li>
                        <i class="fa fa-check"></i> Diseño y RPI - Inspección en terreno y análisis de planos constructivos, corrientes débiles y parámetros espaciales de cada proyecto.<br><br>
                      </li>
                      <li>
                        <i class="fa fa-check"></i> Construcción RIT - Definición y adecuación de plan de construcción de la RIT (Red interna de telecomunicaciones) basado en el diseño alineándolo con los avances de construcción del proyecto inmobiliario.<br><br>
                      </li>
                      <li>
                        <i class="fa fa-check"></i> Certificación de la RIT y elaboración de Informe Favorable.
                      </li>
                    
                    </ul>
                  </div>'
            ),

            'confeccion-etiquetas-en-lamicoide' => array(
                   'titulo'   => 'Confección de etiquetas en lamicoide',
                   'imagen' => 'lami2.jpeg',
                   'descripcion'   => '<div class="single-well">
                    <ul>
                      <li>
                        <i class="fa fa-check"></i> Grabado laser en lamicoide.<br><br>
                      </li>
                      <li>
                        <i class="fa fa-check"></i> Diferentes tamaños de acuerdo a necesidad.<br><br>
                      </li>
                      <li>
                        <i class="fa fa-check"></i> Etiquetas para fibra óptica. <br><br>
                      </li>

                      <li>
                        <i class="fa fa-check"></i> Letreros para tableros eléctricos y similar. <br><br>
                      </li>
                    
                    </ul>
                  </div>'
            ),

            
        );

        $url = $this->uri->segment(2);
            
        if (!array_key_exists($url, $data)) {
          show_404();exit;
        }; 

        $datos = array(
           'titulo' => "Splice chile - servicio",
           'contenido' => "servicio",
           'data' => $data[$url]
        );  
        $this->load->view('plantillas/plantilla_front_end',$datos);
    }   

    public function enviaContacto(){
        $nombre=$this->security->xss_clean(strip_tags($this->input->post("nombre")));
        $correo=$this->security->xss_clean(strip_tags($this->input->post("correo")));
        $asunto=$this->security->xss_clean(strip_tags($this->input->post("asunto")));
        $mensaje=$this->security->xss_clean(strip_tags($this->input->post("mensaje")));

        if($nombre=="" || $correo=="" || $mensaje==""){
             echo json_encode(array('res'=>"error", 'msg' => "Debe ingresar los datos, intente nuevamente."));exit;
        }

        $this->load->library('email');
        $config = array (
          'mailtype' => 'html',
          'charset'  => 'utf-8',
          'priority' => '1',
          'wordwrap' => TRUE,
          'protocol' => "smtp",
          'smtp_port' => 587,
          'smtp_host' => 'mail.splice.cl',
          'smtp_user' => 'reporte@splice.cl',
          'smtp_pass' => 'IY3bH8iGUeJ?'
        );
         
        $this->email->initialize($config);
        $asunto="Nuevo Mensaje de ".$nombre." desde splice.cl";
        $html="<b>".$mensaje.'</b>';

        $prueba=FALSE;
        if($prueba){
            $this->email->from("reporte@splice.cl", "Splice Chile");
            $this->email->to('ricardo.hernandez@splice.cl');
        }else{
            $this->email->from("reporte@splice.cl", "Splice Chile");
            $this->email->to(array("contacto@splice.cl",
                "german.cortes@splice.cl",
                "ricardo.jimenez@splice.cl"));
            $this->email->bcc('ricardo.hernandez@splice.cl'); 
        }
    
        $this->email->subject($asunto);
        $this->email->message($html);

        $resp=$this->email->send();
        if($resp){
           echo json_encode(array('res'=>"ok", 'msg' => "Mensaje enviado correctamente!."));exit;
        }else{
           echo json_encode(array('res'=>"error", 'msg' => "Problemas enviando el correo, intente nuevamente."));exit;
        }
    }

}