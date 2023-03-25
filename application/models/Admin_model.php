<?php
/* 
 * Developed by Hafiz Hassan 
 * Phon# +92303 7859398
 * Date: 26/7/2022
 */
 
class Admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get forms by id
     */
    function get_record($tbl,$id)
    {
        return $this->db->get_where($tbl,array('id'=>$id))->row_array();
    }
    
    /*
     * Get all forms count
     */
    function get_record_count($tbl,$status=null)
    {
        $this->db->from($tbl);
        if ($status) {
           $this->db->where('status',$status);
        }
        return $this->db->count_all_results();
    }
        
    /*
     * Get all forms
     */
    function get_all_records($tbl,$status=null)
    {
        $this->db->order_by('id', 'desc');
        if ($status):
            $this->db->where('status', $status);
        endif;
        return $this->db->get($tbl)->result_array();
    }
        
    /*
     * function to add new forms
     */
    function add_record($tbl,$params)
    {
        $this->db->insert($tbl,$params);
        return $this->db->insert_id();
    }
    /*
     * function to update forms
     */
    function update_record($tbl,$id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update($tbl,$params);
    }
    
    /*
     * function to delete forms
     */
    function delete_record($tbl,$id)
    {
        return $this->db->delete($tbl,array('id'=>$id));
    }

    function delete_special_record($tbl,$fg_key,$id)
    {
        return $this->db->delete($tbl,array($fg_key=>$id));
    }

}
