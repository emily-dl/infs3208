<?php



include_once $_SERVER['DOCUMENT_ROOT'].'/project/application/libraries/PHPMailer/src/PHPMailer.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/project/application/libraries/PHPMailer/src/SMTP.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/project/application/libraries/PHPMailer/src/Exception.php';
// htdocs/application/libraries/PHPMailer/src/PHPMailer.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Account extends CI_Controller
{
    public function __construct(){
        parent ::__construct();
        $this->load->helper('url');
        $this->load->library('email');
        $this->load->model('register_model');
        $this->load->model('account_model');
    }

    public function logout()
    {   //remove session
        unset($_SESSION);
        session_destroy();
        
        //remove cookie
        setcookie('username','',0);
       
        redirect(base_url('account/login'),'refresh');
    }

    //forget passsword 
    public function username_check(){
        
        $email = $this->input->post('email');
        
        $user_exist = $this->account_model->uname_check($email);
        if ($user_exist == true){
            // $id = $this->account_model->get_id_by_email($email);
            $token = bin2hex($email);
            $user_exist = $this->account_model->token($email,$token);
            

            $message = 
                    "<p> Dear user,</p>
                    <p> To reset your password please click the
                    <a href = '".base_url()."account/reset_password/".$token."'>link</a></p>
                   <p>Online video sharing platform team</p>";

            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'mailhub.eait.uq.edu.au',
                'smtp_port' => 25,
                'mailtype' => 'html',
                'charset' => 'iso-9959-1',
                'wordwrap' => TRUE
            );

            $mail = new PHPMailer(); 
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = 'mailhub.eait.uq.edu.au'; //Set the SMTP server to send through
            $mail->SMTPAuth = FALSE;  
            $mail->Port = 25;         
            $mail->setFrom('noreply@infs3202-87bc0c7f.uqcloud.net'); //Set the From address

            // $mail->SMTPDebug  = 1;  
            // $mail->SMTPAuth   = TRUE;
            // $mail->SMTPSecure = "tls";
            // $mail->Port       = 587;
            // $mail->Host       = "smtp.gmail.com";
            // $mail->Username   = "emilyvarlese@gmail.com";
            // $mail->Password   = "Leng.622";

            $mail->IsHTML(true);
            $mail->AddAddress($email, "recipient-name");
            // $mail->SetFrom("emilyvarlese@gmail.com", "from-name");
            // $mail->AddReplyTo("emilyvarlese@gmail.com", "reply-to-name");
            
            $mail->Subject = "Reset password";

            $mail->MsgHTML($message); 
            if(!$mail->Send()) {
                echo "Error while sending Email.";
                // $this->form_validation->set_message('success','ok');

            } else {
                echo "Email sent successfully";
            }
        }
        else{
            // $this->form_validation->set_message('error','Wrong user account. Please check your login details agian.');
        }

        $this->load->view('head');
        $this->load->view('forget');
        
    }

    public function reset_password($token){

        // $this->form_validation->set_rules('password','Password','required|min_length[8]');
        // $this->form_validation->set_rules('password2','Re-enter Password','required|min_length[8]|matches[password]');
        
        // if ($this->form_validation->run() == TRUE){
        //     redirect(base_url('account/login'),'refresh');
        // } else {

        // }
        // get user id
        $user_id = $this->account_model->get_id($token);
        $data = [
            'user_id' => $user_id,
        ];
        $this->load->view('head');
        $this->load->view('reset_password',$data);

    }

    public function new_password(){
        $this->form_validation->set_rules('password','Password','required|min_length[8]');
        $this->form_validation->set_rules('password2','Re-enter Password','required|min_length[8]|matches[password]');

        if ($this->form_validation->run() == TRUE){
        $u_id = $this->input->post('id');
        $hash=password_hash($this->input->post('password'),PASSWORD_DEFAULT);
        $data = array(
            'id' =>  $u_id,
            'password'=>$hash
        );

        $update_password = $this->account_model->password_update($data);
         if ($update_password ==true){
            $this->load->view('head');
             $this->load->view('password_success');
         }
         
        }
        else {
            $this->load->view('head');
            $this->load->view('password_fail');
        }

    }




    public function login()
    {   
        $this->load->helper('cookie');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required|min_length[8]');
    
        if ($this->form_validation->run() == TRUE){
            $username = $_POST['username'];
         
            //hash password
            $password = $_POST['password'];
            $true_password = $this->account_model->password($username,$password);

            //user input correct
            if ($true_password == true){

                //set cookie
                if (isset($_POST['remember'])){
                    $cookie = array(
                        'name' => 'username',
                        'value' => $username,
                        'expire' => '86500'

                    );
                    $passcookie = array(
                        'name' => 'password',
                        'value' => $true_password,
                        'expire' => '86500'
                    );
                    $this->input->set_cookie($cookie);
                    $this->input->set_cookie($passcookie);
                   
                   
                    
                    
                }
                //login success message
                $this->session->set_flashdata('success','You are logged in.');

                //session variables setup
                $_SESSION['user_logged']= TRUE;
                $_SESSION['username']= $username;
                
              


                //direct to user profile page
                redirect(base_url('user/profile'),'refresh'); 

            }
            else {
                //wrong user input, direct to login page again

                $this->session->set_flashdata('error','Wrong user account. Please check your login details agian.');
            }


        }
        $this->load->view('head');
        $this->load->view('login');

    }

    public function register()
    {   
        
        //set the optimized form rule 
            $this->form_validation->set_rules('username','Username', 'required|is_unique[users.username]');
            $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password','Password','required|min_length[8]');
            $this->form_validation->set_rules('password2','Re-enter Password','required|min_length[8]|matches[password]');
            //
            if ($this->form_validation->run() == TRUE){
                echo "form validated";
                $verification_key = rand();
                //add user data to database
                $hash=password_hash($this->input->post('password'),PASSWORD_DEFAULT);
                $data = array(
                    'username'=>$_POST['username'],
                    'email'=>$_POST['email'],
                    'password'=>$hash,
                    'created_date'=> date('Y-m-d'),
                    'verification_key'=>$verification_key,
                    'is_email_verified' => 'no'
                );
                $id = $this->register_model->insert($data);

                //send verification email
            
                if($id>0){
                    $message = 
                    "<p> Welcome to Online video sharing platform. To activate your account
                    for log in, please verify your email by click this 
                    <a href = '".base_url()."account/email_verify/".$verification_key."'>link</a>.</p>
                    <p>Enjoy your journey!</p>
                    <p>Online video sharing platform team</p>";

                    $config = array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'mailhub.eait.uq.edu.au',
                        'smtp_port' => 25,
                        'mailtype' => 'html',
                        'charset' => 'iso-9959-1',
                        'wordwrap' => TRUE
                    );

                    // $this->email->initialize($config);
                    // $this->email->set_mailtype("html");
                    // $this->email->set_newline("\r\n");
                    // $this->email->from('emilyvarlese@gmail.com', "Admin Team");
                    // $this->email->to($this->input->post('email'));  
                    // $this->email->subject("Email Verification");
                    // $this->email->message($message);
                    // if($this->email->send()){
                    //     $this->session->set_flashdata('message','Check your email to activate your account');
                    //     redirect(base_url('account/register'));
                    // }

                    $mail = new PHPMailer(); 
                    $mail->isSMTP(); //Send using SMTP
                    $mail->Host = 'mailhub.eait.uq.edu.au'; //Set the SMTP server to send through
                    $mail->SMTPAuth = FALSE;  
                    $mail->Port = 25;         
                    $mail->setFrom('noreply@infs3202-87bc0c7f.uqcloud.net'); //Set the From address

                    // $mail->SMTPDebug  = 1;  
                    // $mail->SMTPAuth   = TRUE;
                    // $mail->SMTPSecure = "tls";
                    // $mail->Port       = 587;
                    // $mail->Host       = "smtp.gmail.com";
                    // $mail->Username   = "emilyvarlese@gmail.com";
                    // $mail->Password   = "Leng.622";

                    $mail->IsHTML(true);
                    $mail->AddAddress($_POST['email'], "recipient-name");
                    // $mail->SetFrom("emilyvarlese@gmail.com", "from-name");
                    // $mail->AddReplyTo("emilyvarlese@gmail.com", "reply-to-name");
                   
                    $mail->Subject = "Email Verification";

                    $mail->MsgHTML($message); 
                    if(!$mail->Send()) {
                        echo"fail to send email";
                        
                    } else {
                        echo 'email sent successfully';
                    }
                } else {
                    echo "fail to insesrt user";
                }

                redirect(base_url('account/register'));
                

        }
        //load register view
        $this->load->view('head');
        $this->load->view('register');
    }

    public function email_verify(){
        if ($this->uri->segment(3)){
            $verification_key = $this->uri->segment(3);
            if ($this->register_model->email_verify($verification_key)){
                $data['message'] = '<h1> Your account has been activated. Now you can login!</h1>';
            }
            else{
                $data['message'] = '<h1>Error</h1>';
            }
            $this->load->view('head');
            $this->load->view('email_message',$data);

        }
    }



}

?>