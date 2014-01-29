<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function save()
    {
        // $result=array();
        $contact = new Contact_model();
        $contact->name = $this->input->post('name');
        $contact->email = $this->input->post('email');
        $contact->message = $this->input->post('message');
        $contact->save($contact);
        redirect(base_url());

        
        //load email library and set the configuration
        /*$this->load->library('email');
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = '';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = '';
        $config['smtp_pass']    = '';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html';*/
        
        //send email to support
        /*$emailcontent = "Pesan dari ".$contact->email.". Silahkan cek website devnila.com";
        $this->email->initialize($config);
        $this->email->to('support@devnila.com');
        $this->email->from('support@devnila.com', 'Devnila Support');
        $this->email->subject("Devnila notice");
        $this->email->message($emailcontent);
        $this->email->send();*/

        //send email to the client
        /*$emailcontent = "Dear ".$contact->name.".<br/>Thanks for contacting us. We will response your message soon. Please wait for the reply from us.<br/> <br/>Best regards,<br/>Devnila <br/>http://devnila.com";
        $this->email->initialize($config);

        $this->email->to($contact->email);
        $this->email->from('support@devnila.com', 'Devnila Support');
        $this->email->subject("Devnila notice");
        $this->email->message($emailcontent);
        
        if($this->email->send()){
            $contact->save($contact);
            $result['hasil'] = "success";
            echo json_encode($result);
        }else{
            $result['hasil'] = "failed";
            echo json_encode($result);
        }*/
    }
}
