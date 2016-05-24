<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    
    public $status;
    public $roles;
    public $blog_text = '';

        function __construct(){
            parent::__construct();
            $this->load->model('User_model', 'user_model', TRUE);
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->status = $this->config->item('status');
            $this->roles = $this->config->item('roles');

        }

        public function index()
    {   
            if(empty($this->session->userdata['email'])){
                //redirect(site_url().'main/login/');
                redirect('main/login');
            }

            //$data['title'] = 'Mis cursos';            
            /*front page*/
            $data = $this->session->userdata; 
            $data['cpu'] = $this->user_model->getUserCourses($this->session->userdata['email']);
            $this->load->view('header', $data);     
            $this->load->view('home_view');     
            $this->load->view('page_menu', $data); 
            //$this->load->view('cursosusuario', $data); 
            $this->load->view('footer');

    }


        public function register(){

            $this->form_validation->set_rules('firstname', 'First Name', 'required');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

            if($this->form_validation->run() == FALSE){
                $this->load->view('headertologin');
                $this->load->view('register');
                 $this->load->view('footer');
            }else{
                if($this->user_model->isDuplicate($this->input->post('email'))){
                    $this->session->set_flashdata('flash_message', 'Este correo electrónico ya ha sido registrado');
                    redirect('main/login');
                }else{
                    $clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
                    $id = $this->user_model->insertUser($clean);
                    $token = $this->user_model->insertToken($id);
                    $qstring = base64_encode($token);
                    $url = site_url() . '/main/complete/token/' . $qstring;
                    $link = '<a href="' . $url . '">' . $url . '</a>'; 
                    $message = '';
                    $message .= '<strong>You have signed up with our website</strong><br>';
                    $message .= '<strong>Please click:</strong> ' . $link;

                    echo $message; //Send this in email.
                    exit;

                };
            }
        }

        public function complete()
        {                                   
            $token = base64_decode($this->uri->segment(4));       
            $cleanToken = $this->security->xss_clean($token);
            
            $user_info = $this->user_model->isTokenValid($cleanToken); //either false or array();           
            
            if(!$user_info){
                $this->session->set_flashdata('flash_message', 'Token is invalid or expired');
                redirect('main/login');
            }            
            $data = array(
                'firstName'=> $user_info->first_name, 
                'email'=>$user_info->email, 
                'user_id'=>$user_info->id, 
                'token'=>base64_encode($token),
                'blog_text' => 'Pagina principal y asi',
            );

           
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
            
            if ($this->form_validation->run() == FALSE) {   
                $this->load->view('headertologin');
                $this->load->view('complete', $data);
                $this->load->view('footer');
            }else{
                
                $this->load->library('Password');                 
                $post = $this->input->post(NULL, TRUE);
                
                $cleanPost = $this->security->xss_clean($post);
                
                $hashed = $this->password->create_hash($cleanPost['password']);                
                $cleanPost['password'] = $hashed;
                unset($cleanPost['passconf']);
                $userInfo = $this->user_model->updateUserInfo($cleanPost);
                
                if(!$userInfo){
                    $this->session->set_flashdata('flash_message', 'Ocurrió un problema al actualizar los registros.');
                    redirect('main/login');
                }
                
                unset($userInfo->password);
                
                foreach($userInfo as $key=>$val){
                    $this->session->set_userdata($key, $val);
                }
                redirect('main/');
                
            }
        }

        protected function _islocal(){
            return strpos($_SERVER['HTTP_HOST'], 'local');
        }

        public function login()
                {
                    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');    
                    $this->form_validation->set_rules('password', 'Password', 'required'); 
                    
                    if($this->form_validation->run() == FALSE) {
                        $this->load->view('headertologin');
                        $this->load->view('login');
                        $this->load->view('footer');
                    }else{
                        
                        $post = $this->input->post();  
                        $clean = $this->security->xss_clean($post);
                        
                        $userInfo = $this->user_model->checkLogin($clean);
                        
                        if(!$userInfo){
                            $this->session->set_flashdata('flash_message', 'The login was unsucessful');
                            redirect('main/login');
                        }                
                        foreach($userInfo as $key=>$val){
                            $this->session->set_userdata($key, $val);
                        }
                        redirect('main/');
                    }
                    
                }

        public function logout()
        {
            $this->session->sess_destroy();
            redirect('main/login/');
        }

        public function bk(){
            echo base_url('application/');
        }
        
        public function forgot()
        {
            
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
            
            if($this->form_validation->run() == FALSE) {
                $this->load->view('headertologin');
                $this->load->view('forgot');
                $this->load->view('footer');
            }else{
                $email = $this->input->post('email');  
                $clean = $this->security->xss_clean($email);
                $userInfo = $this->user_model->getUserInfoByEmail($clean);
                
                if(!$userInfo){
                    $this->session->set_flashdata('flash_message', 'No podemos encontrar esa dirección de correo.');
                    redirect('main/login');
                }   
                
                if($userInfo->status != $this->status[1]){ //if status is not approved
                    $this->session->set_flashdata('flash_message', 'La cuenta aún no se a confirmado');
                    redirect('main/login');
                }
                
                //build token 
                
                $token = $this->user_model->insertToken($userInfo->id);                    
                $qstring = base64_encode($token);                    
                $url = site_url() . '/main/reset_password/token/' . $qstring;
                $link = '<a href="' . $url . '">' . $url . '</a>'; 
                
                $message = '';                     
                $message .= '<strong>Se ha enviado un enlace de restablecimiento de contraseña</strong><br>';
                $message .= '<strong>Haga click aquí:</strong> ' . $link;             
                echo $message; //send this through mail
                exit;
                
            }
            
        }

        public function reset_password()
        {
            $token = base64_decode($this->uri->segment(4));       
            $cleanToken = $this->security->xss_clean($token);
            
            $user_info = $this->user_model->isTokenValid($cleanToken); //either false or array();               
            
            if(!$user_info){
                $this->session->set_flashdata('flash_message', 'Token inválido o expirado.');
                redirect('main/login');
            }            
            $data = array(
                'firstName'=> $user_info->first_name, 
                'email'=>$user_info->email, 
                'user_id'=>$user_info->id, 
                'token'=>base64_encode($token)
            );
           
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
            
            if ($this->form_validation->run() == FALSE) {   
                $this->load->view('headertologin');
                $this->load->view('reset_password', $data);
                $this->load->view('footer');
            }else{
                                
                $this->load->library('Password');                 
                $post = $this->input->post(NULL, TRUE);                
                $cleanPost = $this->security->xss_clean($post);                
                $hashed = $this->password->create_hash($cleanPost['password']);                
                $cleanPost['password'] = $hashed;
                unset($cleanPost['passconf']);                
                if(!$this->user_model->updatePassword($cleanPost)){
                    $this->session->set_flashdata('flash_message', 'Hubo un problema al actualizar la contraseña');
                }else{
                    $this->session->set_flashdata('flash_message', 'Tu contraseña ha sido restablecida');
                }
                redirect('main/login');                
            }
        }

        function php() {

            $data = $this->session->userdata;

            $this->load->view('header', $data);
            $this->load->view('page_php');
            $this->load->view('page_menu');
            $this->load->view('footer');
        }
        function css() {

            $data = $this->session->userdata;

            $this->load->view('header', $data);
            $this->load->view('page_css');
            $this->load->view('page_menu');
            $this->load->view('footer');
        } 
        function javascript() {

            $data = $this->session->userdata;

            $this->load->view('header', $data);
            $this->load->view('page_javascript');
            $this->load->view('page_menu');
            $this->load->view('footer');
        } 
        function codeigniter() {

            $data = $this->session->userdata;

            $this->load->view('header', $data);
            $this->load->view('page_codeigniter');
            $this->load->view('page_menu');
            $this->load->view('footer');
        } 
        function html5() {

            $data = $this->session->userdata;

            $this->load->view('header', $data);
            $this->load->view('page_html5');
            $this->load->view('page_menu');
            $this->load->view('footer');
        } 
        function mysql() {

            $data = $this->session->userdata;

            $this->load->view('header', $data);
            $this->load->view('page_mysql');
            $this->load->view('page_menu');
            $this->load->view('footer');
        }  
        function rails() {

            $data = $this->session->userdata;

            $this->load->view('header', $data);
            $this->load->view('page_rails');
            $this->load->view('page_menu');
            $this->load->view('footer');
        } 


        function reporte(){
            // Se carga el modelo alumno
            $this->load->model('User_model', 'user_model', TRUE);
            // Se carga la libreria fpdf
            $this->load->library('pdf');
         
            // Se obtienen los alumnos de la base de datos
            $usuarios = $this->user_model->getUsersList();
         
            // Creacion del PDF
         
            /*
             * Se crea un objeto de la clase Pdf, recuerda que la clase Pdf
             * heredó todos las variables y métodos de fpdf
             */
            $this->pdf = new Pdf();
            // Agregamos una página
            $this->pdf->AddPage();
            // Define el alias para el número de página que se imprimirá en el pie
            $this->pdf->AliasNbPages();
         
            /* Se define el titulo, márgenes izquierdo, derecho y
             * el color de relleno predeterminado
             */
            $this->pdf->SetTitle("Lista de usuarios registrados");
            $this->pdf->SetLeftMargin(35);
            $this->pdf->SetRightMargin(35);
            $this->pdf->SetFillColor(200,200,200);
         
            // Se define el formato de fuente: Arial, negritas, tamaño 9
            $this->pdf->SetFont('Arial', 'B', 9);
            /*
             * TITULOS DE COLUMNAS
             *
             * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
             */
         
            $this->pdf->Cell(15,7,'ID','TBL',0,'C','1');
            $this->pdf->Cell(35,7,'APELLIDO','TB',0,'L','1');
            $this->pdf->Cell(35,7,'NOMBRE','TB',0,'L','1');
            $this->pdf->Cell(40,7,'EMAIL','TB',0,'L','1');
            $this->pdf->Ln(7);
            // La variable $x se utiliza para mostrar un número consecutivo
            $x = 1;
            foreach ($usuarios as $users) {
              // se imprime el numero actual y despues se incrementa el valor de $x en uno
              $this->pdf->Cell(15,5,$x++,'BL',0,'C',0);
              // Se imprimen los datos de cada alumno
              //$this->pdf->Cell(25,5,$users->id,'B',0,'L',0);
              $this->pdf->Cell(35,5,$users->last_name,'B',0,'L',0);
              $this->pdf->Cell(35,5,$users->first_name,'B',0,'L',0);
              $this->pdf->Cell(40,5,$users->email,'B',0,'L',0);
              //Se agrega un salto de linea
              $this->pdf->Ln(5);
            }
            /*
             * Se manda el pdf al navegador
             *
             * $this->pdf->Output(nombredelarchivo, destino);
             *
             * I = Muestra el pdf en el navegador
             * D = Envia el pdf para descarga
             *
             */
            $this->pdf->Output("Lista de usuarios.pdf", 'I');
        }   

        function insert_ctrl(){
            $data = array(
                'idusuario' => $this->session->userdata['id'],
                'idcurso' => $this->input->post('idcurso')
                );
                //Transfering data to Model
                $check = $this->user_model->form_insert($data);
                if(empty($check)){
                    
                    $data = $this->session->userdata;
                    $this->session->set_flashdata('message', 'Ya estabas inscrito a este curso.');

                    $this->load->view('header', $data);
                    $this->load->view('page_php');
                    $this->load->view('page_menu');
                    $this->load->view('footer');
                
                 }else{
                    $data = $this->session->userdata;
                    $data['cpu'] = $this->user_model->getUserCourses($this->session->userdata['email']);
                    $this->load->view('header', $data);     
                    $this->load->view('home_view');     
                    $this->load->view('page_menu', $data); 
                    $this->load->view('footer');
                 }
        }

}