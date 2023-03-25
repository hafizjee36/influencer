<?php
/* 
 * Developed by Hafiz Hassan 
 * Phon# +92303 7859398
 * Date: 2/7/2020
 */
 
class Dashboard_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get payment by id
     */
    function get_payment($id)
    {
        return $this->db->get_where('payments',array('user_id'=>$id))->row_array();
    }
    
    /*
     * Get all payment count
     */
    function get_all_payments_count()
    {
        $this->db->from('payments');
        return $this->db->count_all_results();
    }  

    function get_report($start_date=null)
    {
        $this->db->select('SUM(amount) as price');
        if ($start_date) {
            $this->db->where('DATE(date_created) >=', $start_date);
            $this->db->where('DATE(date_created) <=', date('Y-m-d'));
        }else{
            $this->db->where('DATE(date_created)',date('Y-m-d'));
        }
        $this->db->limit(1);
        return $this->db->get('payments')->row_array();
        // return $query->row('weekly_total');
    }
    /*
     * Get all payments
     */
    function get_all_payments($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('payments')->result_array();
    }

    function get_all_platforms()
    {
        $this->db->order_by('id', 'desc');
        $this->db->select('hashtags.*,influencer.title');
        $this->db->join('influencer', 'influencer.id=hashtags.influencer_id','left outer');
        return $this->db->get('hashtags')->result_array();
    }
    /*
     * function to add new payment
     */
    function add_payment($params)
    {
        $this->db->insert('payments',$params);
        return $this->db->insert_id();
    }
    
}
