<?php
    class Employee extends CI_Model{
        function getMax(){
            $this->db->select_max('id');
            $this->db->from('employee');
            $maxid=$this->db->get();
            if($maxid->num_rows()>0){
                return $maxid->row()->id;
            }else{
                return 0;
            }
        }
        function empType(){
         $query = $this->db->get('emp_type');
            return $query;
        }
        function empSubType($emptype){
            $query=$this->db->query("SELECT DISTINCT * FROM emp_sub_type WHERE emp_type = '$emptype' order by id");

                if($query->num_rows() > 0){ ?>
                <option value="" disable >Employee Sub Type</option>
                <?php
                foreach ($query->result() as $row)
                {?>
                <option value="<?php echo $row->id;?>"><?php echo $row->sub_type;?></option>
                <?php } }
                else
                { ?>
                <option value="0">None</option>
            <?php  }
                return $query;

        }
       function saveEmp($value){
          $query= $this->db->insert('employee',$value);
          if($query){
         $this->db->select_max('id');
         $this->db->from('employee');
         $maxid1=$this->db->get()->row()->id;
         $this->db->where("id" ,$maxid1);
        $emptype= $this->db->get("employee")->row()->emp_type;
        if($emptype==7){
         
         $emp=array(
             'emp_id' => $maxid1
             );
          $this->db->insert("emp_pv",$emp);
          return $query;
        }
        else{
            return $query;
        }
       }
       }
       function empSubbranch($subbranch){
           $this->db->where('status',1);
           $this->db->where('sub_branchid',$subbranch);
          $query =  $this->db->get('employee');
            return $query;
       }
        function empSubbranch1($subbranch){
          $this->db->where('emp_type',5);
           $this->db->where('status',1);
           $this->db->where('sub_branchid',$subbranch);
          $query =  $this->db->get('employee');
            return $query;
       }

       function empInactiveList($subbranch){
        $this->db->where('status',0);
           $this->db->where('sub_branchid',$subbranch);
          $query =  $this->db->get('employee');
            return $query;
       }
       function employeeDetail($id){
        $this->db->where('id',$id);
       $query= $this->db->get('employee');
       return $query;
       }

    function empSubbranchInactive($subbranch){
        $this->db->where('status',0);
        $this->db->where('sub_branchid',$subbranch);
        $query =  $this->db->get('employee');
        return $query;
    }
    public function top10Employee()
    {
        $d = $this->db->query('SELECT * from employee');
        return $d->result();
    }
    public function changeRank($rank,$user ,$desc)
    {
        $data = array('rank'=>$rank,'description'=>$desc);
         $this->db->where('emp_username',$user);
        $feedb =  $this->db->get("emp_feedback");
        if($feedb->num_rows()>0){
        $this->db->where('emp_username',$user);
        $d = $this->db->update('emp_feedback',$data);
        }else{
             $data = array('rank'=>$rank,'description'=>$desc,'emp_username' =>$user);
          $d = $this->db->insert('emp_feedback',$data);  
        }
        return $d;
    }
    function deliveryOrder($id){
         $this->db->where('del_boy_id',$id);
          $dt= $this->db->get("order_serial");
          return $dt;
    }
    function deleteemp($id){
       
        $this->db->where('id',$id);
      $emp=   $this->db->delete('emp_feedback');
     // print_r($emp);exit();
      return $emp;
    }
}
?>