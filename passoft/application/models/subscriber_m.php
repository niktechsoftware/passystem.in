<?php 
class Subscriber_m extends CI_Model
{
    public function subscriber_profile($username)
    {
        $this->db->where('username',$username);
        $sb_data=$this->db->get('customers');
        return $sb_data;
    } 
    public function update($up_data,$username)
    {
        $this->db->where('username',$username);
        return $this->db->update('customers',$up_data);   
    }
    
   
    
     public function cash_back($id)
    {
        $this->db->where('cid',$id);
        $cash_dt=$this->db->get('pv')->row();
        return $cash_dt;
    } 
    
     public function cashback_approve($row_id,$sb_id)
    {
        $this->db->where('id',$row_id);
        $cb_dt = $this->db->get('cashback_req')->row();
        
        $this->db->where('cid',$sb_id);
        $pv_dt = $this->db->get('pv')->row();
        $remain = $pv_dt->rupee - $cb_dt->amount;
        $vval = array('rupee'=>$remain);
        $this->db->where('cid',$sb_id);
        $uup= $this->db->update('pv',$vval);
        if($uup)
        {
        $this->db->where('id',$row_id);
        $date=date('Y-m-d');
        $val= array('status'=>1,
                    'approve_date'=>$date);
        $upd=$this->db->update('cashback_req',$val);
        
         return $upd;
        }
        
        
        
    } 
    
     public function cashback_request($username,$req_cb)
    {
        $date= date('Y-m-d');
        $val= array('username'=>$username,
                    'amount'=>$req_cb,
                    'date'=>$date,
                    'status'=>0);
         
        return $this->db->insert('cashback_req',$val);
         
    }
    public function change_status($id)
    {

        $this->db->where('id',$id);
        $sub= $this->db->get('customers')->row();
        if($sub->tstatus==1)
        {
            $v=array('tstatus'=>'0',
                    'pstatus'=>'1');
            $this->db->where('id',$id);
            $s= $this->db->update('customers',$v);
            if($s){
            $this->db->where('cust_id',$id);
            $c= $this->db->delete('register_pv');
            return $c;
            }
        }
    }
    
    public function create_fvlist()
    {
        return $this->db->get('stock_products');   
    } 
    
     public function add_demand_product($in_data,$username,$id,$img_pd)
    {
        
        
        //print_r($in_data); exit;
        
        $this->load->library('upload');
        //$image_path = realpath(APPPATH . '../assets/productimg/');
        $asset_name=$this->db->get("upload_asset")->row()->asset_name;
        $image_path=$asset_name.'/productimg';

        $config['upload_path'] = $image_path;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '5120';

        if (!empty($_FILES['Image']['name'])) {
        $config['file_name'] = $img_pd;
        $this->upload->initialize($config);
        $f1= $this->upload->do_upload('Image');
        $value['file_1']=$img_pd;
        }
        $in= $this->db->insert('demand_list',$in_data);   
        return $in;
        
    }

    
    public function check_fvlist($id)
    {
        $this->db->where('customer_id',$id);
        $fv=$this->db->get('favourite_list');

        return $fv;
    } 
    public function my_Fvlist($id)
    {
        $this->db->where('customer_id',$id);
        $fv= $this->db->get('favourite_list');  
        // $this->db->select('*');
        // $this->db->from('stock_products');
        // $fv= $this->db->join('favourite_list', 'favourite_list.product_code = stock_products.id','right');
        return $fv;
    } 
    
    public function my_Phlist($id)
    {
        $this->db->where('customer_id',$id);
        $fv= $this->db->get('favourite_list');
        return $fv;
    }
    public function addtocart_data($id,$p_id){
        $date= date('Y-m-d');
        $value = array('cust_usr'=>$id, 'pt_code'=>$p_id, 'date'=> $date);
        //  $value1 = array();
        //$wh = array()
        $this->db->where($value);
        $ph_data=$this->db->get('purchase_list')->num_rows();
        if($ph_data>0)
        {
            $this->db->where($value); 
            $dn = $this->db->update('purchase_list',$value);
            $this->db->where('cust_usr',$id);
            $count= $this->db->get('purchase_list')->num_rows();
            
            return $count;
        }
        else
        {
            $dn = $this->db->insert('purchase_list',$value);
            $this->db->where('cust_usr',$id);
            $count=$this->db->get('purchase_list')->num_rows();
            
            return $count;
        }    
    } 
    public function my_bill($customer_id)
    {
        $this->db->where('cust_usr',$customer_id);
        $ph= $this->db->get('purchase_list');
        
        return $ph;
    }

    public function check_product_wallet($id)
    {
        $this->db->where('id',$id);
        $sb_data=$this->db->get('customers')->row();
        
        $this->db->where('subbranch_id',$sb_data->sub_branchid);
        $fv= $this->db->get('subbranch_wallet');
        // print_r($fv);
        // exit;
        return $fv;
    }   
    public function lastfeedback($username)
    {
        $this->db->where('cus_username',$username);
        return $this->db->get('viewmessage');   
        // $x=$this->db->get('viewmessage');  
        // print_r($x);
        // exit;
    } 
    public function insertfeedback($username,$usermsg)
    {
        $this->db->where('cus_username',$username);
		$sbmsg_data=$this->db->get('viewmessage');
		if($sbmsg_data->num_rows()>0){
            $this->db->where('cus_username',$username);
            return $this->db->update('viewmessage',$usermsg);
             
		}
        else{
            $this->db->where('cus_username',$username);
            return $this->db->insert('viewmessage',$usermsg);
        }
    } 

    public function subscriber_wallet($username)
    {
        $this->db->where("username",$username);
        $sb_data= $this->db->get("customers")->row();
        $id=$sb_data->id;
        $this->db->where("cid",$id);
        $pv_data= $this->db->get("pv");
        if($pv_data->num_rows()>0){
            $dt= $pv_data->row();
            $pv2= $dt->pv;
            $this->db->where("cust_id",$username);
            $rpv= $this->db->get("register_pv"); 
            if($rpv->num_rows>0){
                $rpv1= $rpv->row();
                $regpv=$rpv1->pv;
                $totpv=$regpv+$pv2;
                return array('total_pv'=>$totpv,'cashback'=>$dt->rupee);
            }
            else{
                return array('total_pv'=>$pv2,'cashback'=>$dt->rupee);
            }   
        }
        else{
                return array('total_pv'=>'0','cashback'=>$dt->rupee);
        }          
    } 
    
    public function upload_img($img_ad1,$img_ad2,$img_pan,$username)
    {
        $this->load->library('upload');
        //$image_path = realpath(APPPATH . '../assets/productimg/');
        $asset_name=$this->db->get("upload_asset")->row()->asset_name;
        $image_path=$asset_name.'/images/subscriber';

        $config['upload_path'] = $image_path;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '50';
           // $value[];
        if (!empty($_FILES['ad1']['name'])) {
                $config['file_name'] = $img_ad1;
                $this->upload->initialize($config);
            $f1= $this->upload->do_upload('ad1');
                $value['front_adhar']=$img_ad1;
                }
        if (!empty($_FILES['ad2']['name'])) {
                $config['file_name'] = $img_ad2;
                $this->upload->initialize($config);
                $f2=  $this->upload->do_upload('ad2');
            $value['back_adhar']=$img_ad2;

        }
        if (!empty($_FILES['pan']['name'])) {
            $config['file_name'] = $img_pan;
                $this->upload->initialize($config);
                $f3=  $this->upload->do_upload('pan');
                $value['front_pan']=$img_pan;
        }
        
        $this->db->where('username',$username);
        $check=$this->db->update('customers',$value);
        if($check){
            redirect('subscriberController/kyc/5');
        }
        else {
            redirect('subscriberController/kyc/6');
        }
    }
    public function uploadProfile_img($image,$username)
    {
        $this->load->library('upload');
        //$image_path = realpath(APPPATH . '../assets/productimg/');
        $asset_name=$this->db->get("upload_asset")->row()->asset_name;
        $image_path=$asset_name.'/images/subscriber';

        $config['upload_path'] = $image_path;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '5120';

        if (!empty($_FILES['upload_img']['name'])) {
        $config['file_name'] = $image;
        $this->upload->initialize($config);
        $f1= $this->upload->do_upload('upload_img');
        $value['image']=$image;
        }
        $this->db->where('username',$username);
        $sb_data=$this->db->get('customers');
        // print_r($sb_data);
        // // exit;
        // if($sb_data->num_rows()>0){
        //     if(strlen($sb_data->row()->image)>0)
        //     {
                // echo "mil gya";
                // exit;
                $this->db->where('username',$username);
                $check=$this->db->update('customers',$value);
                return $check;
        //     }
        //     else
        //     {
        //         //  echo " ni mila";
        //         // exit;
        //         $this->db->where('username',$username);
        //         $check=$this->db->insert('customers',$value);
        //         return $check;
        //     }
        // }
        // else{
        //     echo "no data fouund";
        // }     
    }
    public function insert_in_fvlist($prow_id,$customer_id)  {
        $this->db->where('id',$customer_id);
        $sb_data=$this->db->get('customers');
        
        if($sb_data->num_rows()>0){
            if($sb_data->row()->sub_branchid!=null){
                $sub_branchid= $sb_data->row()->sub_branchid;
                $value= array(
                    'product_code'=>$prow_id,
                    'customer_id'=>$customer_id,
                    'sub_branchid'=>$sub_branchid,
                    'date'=>date('Y-m-d')
                    );

                $this->db->where("product_code",$prow_id);
                $this->db->where("customer_id",$customer_id);
                $this->db->where("sub_branchid",$sub_branchid);
                $this->db->delete("favourite_list");
                
                $this->db->insert("favourite_list",$value);
                $this->db->where('customer_id',$this->session->userdata('id')); 
                $list=$this->db->get('favourite_list');
                $dc= $list->num_rows();
               
                 return $dc;
            }
        }
    }  
    public function delete_in_fvlist($prow_id,$customer_id)  {
        $value= array(
        'product_code'=>$prow_id,
        'customer_id'=>$customer_id);                   
        $this->db->where($value);
        $this->db->delete("favourite_list");

        $this->db->where('customer_id',$this->session->userdata('id')); 
        $list=$this->db->get('favourite_list');
        $dc= $list->num_rows();
       
        return $dc;
    }
}

?>