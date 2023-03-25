<?php
/* 
 * Developed by Hafiz Hassan 
 * Phon# +92303 7859398
 * Date: 26/7/2022
 */
 
class Modules extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['results'] = $this->admin->get_all_records('influencer');
        $data['_view'] = 'modules/index';
        $this->load->view('layouts/main',$data);
    }

    function influencer()
    {
        $data['page_title']     = 'Influencer';
        $data['id']      = '';
        $data['title']   = '';
        $data['desc']    = '';
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title','Title','required');
        
        if($this->form_validation->run())     
        {   

            $params = array(
                'title'         => $this->input->post('title'),
                'description'   => $this->input->post('desc'),
            );
            if ($this->input->post('id')):
                $id = $this->input->post('id');
                $record_id = $this->admin->update_record('influencer',$id,$params);
                $this->session->set_flashdata('success','Influencer has been updated successfully');
            else:
                $record_id = $this->admin->add_record('influencer',$params);
                $this->session->set_flashdata('success','New Influencer has been added successfully');
            endif;
            redirect('influencer.html');
        }
        else
        {  
            if ($this->input->get('id')):
                $id = $this->input->get('id');
                if ($this->input->get('mode') == 'edit'):
                    $record = $this->admin->get_record('influencer',$id);
                    
                    $data['id']     = $record['id'];
                    $data['title']  = $record['title'];
                    $data['desc']   = $record['description'];
                else:
                    $record_id = $this->admin->delete_record('influencer',$id);
                    $this->session->set_flashdata('success','Influencer has been deleted successfully');
                    redirect('influencer.html');
                endif;
            endif;
            $data['results'] = $this->admin->get_all_records('influencer');
        
            $data['_view'] = 'modules/influencer';
            $this->load->view('layouts/main',$data);
        }
    }

    function hashtag()
    {
        $data['page_title']     = 'Hashtag';
        $data['id']         = '';
        $data['influencer_id']   = '';
        $data['tags']       = '';
        $data['time_frame']       = '';
        $this->load->library('form_validation');

        $this->form_validation->set_rules('influencer_id','Platform','required');
        
        if($this->form_validation->run())     
        {   

            $params = array(
                'influencer_id'  => $this->input->post('influencer_id'),
                'tags'           => $this->input->post('tags'),
                'time_frame'     => $this->input->post('time_frame'),
            );
            if ($this->input->post('id')):
                $id = $this->input->post('id');
                $record_id = $this->admin->update_record('hashtags',$id,$params);
                $this->session->set_flashdata('success','Influencer has been updated successfully');
            else:
                $record_id = $this->admin->add_record('hashtags',$params);
                $this->session->set_flashdata('success','New Influencer has been added successfully');
            endif;
            redirect('hashtag.html');
        }
        else
        {  
            if ($this->input->get('id')):
                $id = $this->input->get('id');
                if ($this->input->get('mode') == 'edit'):
                    $record = $this->admin->get_record('hashtags',$id);
                    // pre($record);
                    $data['id']             = $record['id'];
                    $data['influencer_id']  = $record['influencer_id'];
                    $data['tags']           = $record['tags'];
                    $data['time_frame']     = $record['time_frame'];
                else:
                    $record_id = $this->admin->delete_record('hashtags',$id);
                    $this->session->set_flashdata('success','Influencer has been deleted successfully');
                    redirect('hashtag.html');
                endif;
            endif;
            $data['results'] = $this->dashboard->get_all_platforms();
        
            $data['_view'] = 'modules/hashtag';
            $this->load->view('layouts/main',$data);
        }
    }



    public function get_match_players()
    {
        $id = $this->input->post('match_id');
        $match =  $this->admin->get_record('matches',$id);
        $arr = explode(',', $match['player_played']);
        echo'<option value="">Select Player</option>';
        for ($i=0; $i < sizeof($arr); $i++) { 
            $player = $this->admin->get_record('players',$arr[$i]);
            if ($player):
                $selected = ($player['id'] == $this->input->post('player_id')) ? 'selected="selected"': '';
                echo'<option value="'.$player['id'].'" '.$selected.'>'.$player['name'].' ('.$player['shirt_number'].')'.'</option>';
            else:
                echo'<option value="">No Player found</option>';
            endif;
        }
            
    }


    function sendEmail($data,$type)
    {
        // pre($data); 
        $html = '';
        if ($type == 1) {
            $html = '<tr> 
                        <th>Amount:</th><td>'.$data['indoor'].'-'.$data['outdoor'].'</td> 
                    </tr>
                    <tr> 
                        <th>Performance Date:</th><td>'.$data['pdate'].'</td> 
                    </tr>';
        } elseif ($type==3) 
        {
            $html = '<tr> 
                        <th>Reservation Date:</th><td>'.$data['rdate'].'</td> 
                    </tr><tr> 
                        <th>Number of Guests:</th><td>'.$data['guest'].'</td> 
                    </tr>
                    ';
        }
        if ($html):
            $from   ='mbginvoicing@gmail.com';  // Mail Created  from your Server
            
            $to     = $data['email']; // Receiver Email Address
            $subject= $type.' Information';    // Mail Subject
            $headers= "MIME-Version: 1.0\n";
            $headers.="Content-type: text/html; charset=iso-8859-1\n";
            $headers.="From:".$from;
            $message = ' 
            <html> 
            <head> 
                <title>Welcome to joeysantosclientportal.com</title> 
            </head> 
            <body> 
                <h1>Kindly find your login credential!</h1> 
                <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
                    <tr> 
                        <th>Name:</th><td>'.$data['name'].'</td> 
                    </tr> 
                    '.$html.'
                </table> 
            </body> 
            </html>'; // Message Body
            mail($to,$subject,$message,$headers);
            mail('mbginvoicing@gmail.com',$subject,$message,$headers);
        endif;   
    }
}
