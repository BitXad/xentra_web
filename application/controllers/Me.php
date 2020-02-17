<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Me extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Me_model');
    } 

    /*
     * Listing of mes
     */
    function index()
    {
        $data['mes'] = $this->Me_model->get_all_mes();
        
        $data['_view'] = 'me/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new me
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'mes_lec' => $this->input->post('mes_lec'),
            );
            
            $me_id = $this->Me_model->add_me($params);
            redirect('me/index');
        }
        else
        {            
            $data['_view'] = 'me/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a me
     */
    function edit($id_mes)
    {   
        // check if the me exists before trying to edit it
        $data['me'] = $this->Me_model->get_me($id_mes);
        
        if(isset($data['me']['id_mes']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'mes_lec' => $this->input->post('mes_lec'),
                );

                $this->Me_model->update_me($id_mes,$params);            
                redirect('me/index');
            }
            else
            {
                $data['_view'] = 'me/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The me you are trying to edit does not exist.');
    } 

    /*
     * Deleting me
     */
    function remove($id_mes)
    {
        $me = $this->Me_model->get_me($id_mes);

        // check if the me exists before trying to delete it
        if(isset($me['id_mes']))
        {
            $this->Me_model->delete_me($id_mes);
            redirect('me/index');
        }
        else
            show_error('The me you are trying to delete does not exist.');
    }
    
}
