<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * [record_counts description]
	 * @param  [type] $user_id [users id]
	 * @return [INT]   user's id [description]
	 * @author Ganesh Ananthan
	 */

	public function record_counts($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$num_results = $this->db->count_all_results();
		return $num_results;
	}

	public function specific_record_counts($table,$constraint_array)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($constraint_array);
		$num_results = $this->db->count_all_results();
		return $num_results;
	}

	public function specific_record_counts_other($table,$constraint_array)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($constraint_array);
		$num_results = $this->db->count_all_results();
		return $num_results;
	}

	public function specific_row($table,$constraint_array='')
	{
		$this->db->select('*');
		$this->db->from($table);
		if(!empty($constraint_array))
		{
			$this->db->where($constraint_array);
		}
		$result= $this->db->get()->row_array();
		return $result;
	}

	public function specific_row_value($table,$constraint_array='',$get_field)
	{
		$this->db->select($get_field);
		$this->db->from($table);
		if(!empty($constraint_array))
		{
			$this->db->where($constraint_array);
		}
		$result= $this->db->get()->row_array();
		return $result[$get_field];
	}

	public function records_all($table, $constraint_array='', $order_by='')
	{
		$this->db->select('*');
		$this->db->from($table);
		if(!empty($constraint_array))
		{
			$this->db->where($constraint_array);
		}
		if(!empty($order_by))
		{
			$this->db->order_by($order_by);
		}
		$results= $this->db->get()->result();
		return $results;
	}

	public function specific_fields_records_all($table, $constraint_array='',$get_field_array='')
	{
		if(!empty($get_field_array))
		{
			$this->db->select($get_field_array);
		}
		else
		{
			$this->db->select('*');
		}
		$this->db->from($table);
		if(!empty($constraint_array))
		{
			$this->db->where($constraint_array);
		}
		$results= $this->db->get()->result_array();
		return $results;
	}

	public function common_insert($table,$data)
	{
	    $this->db->insert($table, $data);
		$result = $this->db->insert_id();
		return $result;
	}

	public function common_edit($table,$data,$where_array)
	{
		$this->db->trans_start();
		$this->db->update($table , $data , $where_array);
		$this->db->trans_complete();
		if ($this->db->affected_rows() == '1') {
		    return TRUE;
		} else {
		    if ($this->db->trans_status() === FALSE) {
		        return false;
		    }
		    return true;
		}
	}

	public function common_delete($table,$where_array)
	{
	   $this->db->delete($table, $where_array);
	   if ($this->db->affected_rows() == '1') {
		    return TRUE;
		} else {
		    return FALSE;
		}
	}
	
	public function in_array_rec($needle, $haystack, $strict = false) 
	{
	    foreach ($haystack as $item) {
	        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && $this->in_array_rec($needle, $item, $strict))) {
	            return true;
	        }
	    }
	    return 0;
	}
	
	public function last_record($table,$pm_key,$date_column)
	{ 
			$query = $this->db->query("SELECT * FROM $table ORDER BY $pm_key DESC LIMIT 1");
			$result = $query->result_array();
				return $result;
	}

	public function common_table_last_updated($table,$pm_key,$date_column)
	{
		$this->db->select($date_column);
		$this->db->from($table);
		$this->db->order_by($pm_key,'desc');
		$this->db->limit('1');
		$result= $this->db->get()->row_array();
		return $this->time_elapsed_string($result[$date_column]);
	}

	public function time_elapsed_string($datetime, $full = false) 
	{
	    $now = new DateTime;
	    $ago = new DateTime($datetime);
	    $diff = $now->diff($ago);

	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;

	    $string = array(
	        'y' => 'year',
	        'm' => 'month',
	        'w' => 'week',
	        'd' => 'day',
	        'h' => 'hour',
	        'i' => 'minute',
	        's' => 'second',
	    );
	    foreach ($string as $k => &$v) {
	        if ($diff->$k) {
	            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
	        } else {
	            unset($string[$k]);
	        }
	    }

	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? implode(', ', $string) . ' ago' : 'just now';
	}

	function clean_url($string)
	{
	    $url=strtolower($string);
	    $url=str_replace(array("'",'"'), '', $url);
	    $url=str_replace(array(' ','+', '!', '&','-','/','.'), '-', $url);
	    $url=str_replace("?", "", $url);
	    $url=str_replace("---", "-", $url);
	    $url=str_replace("--", "-", $url);
	    return $url;
	}

	public function sendEmailWithTemplate($email_array)
	{
		$this->load->library('email');
		$this->email->set_newline("\r\n");

		$from_email_address=$this->dbvars->app_email;
		$from_email_name=$this->dbvars->app_name;
		$to_email_address=$email_array['to_email'];
		$email_subject=$email_array['subject'];
		$email_message=$email_array['message'];

		// Set to, from, message, etc.
		$this->email->from($from_email_address, $from_email_name);
	    $this->email->to($to_email_address);
	    $this->email->subject($email_subject);
	    $this->email->message($email_message);
	    $this->email->send();

		if(isset($email_array['cc']))
		{
			$email_cc=$email_array['cc'];
			$this->email->cc($email_cc);
		}
		if(isset($email_array['bcc']))
		{
			$email_bcc=$email_array['bcc'];
			$this->email->cc($email_bcc);
		}

    	echo $this->email->print_debugger();
		$result = $this->email->send();
	}
  	//  Dropdown Menu Simple
	/**
	* @param $get_field - mention only two params like KEY & VALUE
	- If you want CONCAT two or more fields in the Key OR Value section. pass like that
	- array( CONCAT(user_firstname, '.', user_surname) AS Key, fieldName as Value)
	*/
	public function Dropdown($table, $get_field, $constraint_array='', $groupBy='', $orderby='', $limit='', $optionType='', $joinArr='')
	{

		$this->db->select($get_field);

		$this->db->from($table);
		if(!empty($constraint_array))
		{
			$this->db->where($constraint_array);
		}

		if($groupBy != '')
		{
			$this->db->group_by($groupBy);
		}

		if(!empty($orderby))
		{
			$this->db->order_by($orderby);
		}

		if($limit != '')
		{
			$this->db->limit($limit);
		}
		if(!empty($constraint_array))
		{
			foreach ($joinArr as $tableName => $condition)
			{
			$this->db->join($tableName, $condition, '=');
			}
		}

		$results = $this->db->get()->result();

		$options = array();

		if($optionType == '')
		{
			$options[''] = "-- Select --";
		}
		
		foreach($results as $item)
		{
			$options[$item->Key] = $item->Value;

		}	
		return $options;
	} 

	public function dataUpdate($table, $field, $where, $trans_set='')
	{
		$this->db->set("$field", "$field+1", FALSE);
		if($where!='')
		{
			$this->db->where($where);
		}
		if($trans_set!='')
		{
			foreach($trans_set as $row => $val)
			{
				$val_array[] = $val;
				
			}
			$this->db->where_in('naming_series_id', $val_array);
		}
		$this->db->update($table);
		return $result = $this->db->affected_rows();
	}

	public function validate_vendor($table,$vendor_id)
	{
		$this->db->where('vendor_id',$vendor_id);
    	$query = $this->db->get($table);
    	if ($query->num_rows() > 0)
    	{
    		$result=1;
			return $result;
	    }
	    else
	    {	    	
			$result=2;
			return $result;
	    }
    }

	// Generate Naming Series
	public function generateSeries($naming, $transaction_id)
	{
		//This can be deleted after changing naming series to array form
		$naming_avoid = $naming;
		if(!is_array($naming))
		{
			$naming = array('0' => $naming);
		}
		//End of delete
	    foreach ($naming as $key) 
	    {
	    	$naminglist[$key]      		= 	explode('_', $key);	
	    }
	    foreach ($naminglist as $row  => $val )
	    {
	    	$namingtest1[$row]              =	$val[0];   
	    	$namingtest2[$row]              =	$val[1];   
	    }
	    foreach ($namingtest1 as $row   =>  $val)
	    {
	    	$const_array        =	array(
							    		'naming_series_id'	=> $val,
							    		'transaction_id'    => $transaction_id
						            );
	    	$currentValue       =   $this->specific_row_value('set_naming_series', $const_array, 'current_value');
		    $prefixLength       =   $this->specific_row_value('set_naming_series', $const_array, 'prefix_id');
		    $result[$row]       =   $namingtest2[$row].'/'.str_pad($currentValue, $prefixLength, 0, STR_PAD_LEFT); 
	        
	    }
	    //This can be deleted after changing naming series to array form
	    if(!is_array($naming_avoid))
		{
			foreach ($result as $key => $value) 
			{
				$inter = $value;
			}
			return $inter;
		}
		//End of delete
	    return $result;
	}

	public function join_records_all($fields, $table, $joinArr, $constraint_array = '', $groupBy = '', $orderby='', $limitValue='', $distinct='')
	{
		$this->db->select(implode(',', $fields), FALSE);
		$this->db->from($table);
		foreach ($joinArr as $tableName => $condition)
		{
		$this->db->join($tableName, $condition, 'left');
		}
		if (!empty($constraint_array))
		{
		$this->db->where($constraint_array);
		}

		if(!empty($orderby))
		{
		$this->db->order_by($orderby);
		}

		if($groupBy != '')
		{
		$this->db->group_by($groupBy);
		}

		if($limitValue!='')
		{
		$this->db->limit($limitValue);
		}
		if($distinct!='')
		{
		$this->db->limit($limitValue);
		}

		$results = $this->db->get();
		return $results;
	}

	public function validate_insert($table,$qr_code,$data)
	{
		$this->db->where('qr_code',$qr_code);
    	$query = $this->db->get($table);
    	if ($query->num_rows() > 0)
    	{
    		$result=1;
			return $result;
	    }
	    else
	    {	    	
			$this->db->insert($table,$data);
	    }
    }

    function get_domain($url)
	{
  		$pieces = parse_url($url);
  		$domain = isset($pieces['host']) ? $pieces['host'] : $pieces['path'];
  		if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
    	return $regs['domain'];
  		}
  		return false;
	}
	function region($id)
	{
		$this->db->select('r.*,c.country_name');
		$this->db->from('m_regions as r');
		$this->db->join('m_countries as c','c.c_id = r.country');
		$this->db->where('r.r_id', $id);
        $this->db->order_by("r.r_id", "asc");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}

	function blogs_detail($id)
	{
		$this->db->select('b.*,i.blog_image');
		$this->db->from('blogs as b');
		$this->db->join('blog_images as i','i.blog_id = b.b_id');
		$this->db->where('b.b_id', $id);
        $this->db->order_by("b.b_id", "asc");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
	public function view_transdata($id)
	{
			$this->db->select('c.transid as id,c.transname,co.companyname,d.deptname,ca.categoryname,t1.type1name,t2.type2name,t3.type3name,t.transname as transdata_name,c.sla,c.serviceid,c.amount')
            ->from('transdata as c')
            ->join('transdata_translation as t','c.transid=t.transid')
            ->join('company as co','c.companyid=co.companyid')
            ->join('department as d','d.deptid=c.deptid')
            ->join('category as ca','ca.categoryid=c.categoryid')
            ->join('transtype1 as t1','t1.type1id=c.type1id')
            ->join('transtype2 as t2','t2.type2id=c.type2id')
            ->join('transtype3 as t3','t3.type3id=c.type3id')
            
            ->where('t.language_id','302')
            ->where('c.transid',$id);
            $this->db->order_by("c.transid","desc");
        
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
	public function view_order($id)
	{
			 $this->db->select('*,c.orderid as id,c.orderno,CONCAT((cu.firstname),(" "),(cu.lastname)) AS name')
            ->from('ordermain as c')
            ->join('orderdetails as t','c.orderid=t.orderid')
            
            ->join('order_ratings as o','o.order_id=c.orderid')
            ->join('rating_type as r','r.id=o.rating_type')
            ->join('payment_transactions as p','p.transaction_id=c.payment_transaction_id')
            ->join('customer as cu','cu.customerid=c.customerid')
            ->where('c.orderid',$id);
            
            
            
            $this->db->order_by("c.orderid","desc");
           
        
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
	public function payment_details($id)
	{
			 $this->db->select('*')
            ->from('ordermain as c')
            ->join('payment_transactions as p','p.order_number=c.orderno');
            
            
            
            
            $this->db->order_by("c.orderid","desc");
            //$this->db->group_by("c.orderid");
        
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
	public function view_order_details($id)
	{
			 $this->db->select('*,c.orderid as id,c.orderno,CONCAT((cu.firstname),(" "),(cu.lastname)) AS name')
            ->from('ordermain as c')
            ->join('orderdetails as t','c.orderid=t.orderid')
            ->join('orderdocument as r','r.orderdetailsid=t.orderdetailsid')
            ->join('documents as d','r.documentid=d.docid')
          
            ->join('customer as cu','cu.customerid=c.customerid')
            ->where('c.orderid',$id);
            
            
            
            $this->db->order_by("c.orderid","desc");
           
        
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
	public function total_user()
	{
		$this->db->select("*");
        $this->db->from("customer");
       
      $num_results = $this->db->count_all_results();
		return $num_results;
	}
	public function total_orders()
	{
		$this->db->select("*");
        $this->db->from("ordermain");
       
      $num_results = $this->db->count_all_results();
		return $num_results;
	}
	public function total_transdata()
	{
		$this->db->select("*");
        $this->db->from("transdata");
       
      $num_results = $this->db->count_all_results();
		return $num_results;
	}
	public function today_orders()
	{
		$this->db->select("*");
        $this->db->from("ordermain");
        $this->db->where('orderdate',date('Y-m-d'));
       
      $num_results = $this->db->count_all_results();
		return $num_results;
	}
	public function document_details()
	{
			 $this->db->select('*,dc.docname as doname,d.docname as docname')
            ->from('documents as d')
            ->join('documents_translation as dc','d.docid=dc.docid');
         
            $this->db->where("dc.language_id","302");
            //$this->db->group_by("c.orderid");
        
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
	public function transdatadocument($id)
	{
			 $this->db->select('*,dc.docname as doname,d.docname as docname')
            ->from('transdatadocument as t')
            ->join('documents as d','d.docid=t.docid')
            
            ->join('documents_translation as dc','d.docid=dc.docid');
         
            $this->db->where("t.transid",$id);
            $this->db->where("dc.language_id","302");
            $this->db->order_by("t.transdocid","desc");
        
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
	public function m_faq($id)
	{
			 $this->db->select('*,t.question as question,d.question as a_question,t.answer as answer,t.answer as a_answer')
            ->from('m_faq as t')
            ->join('m_faq_translation as d','t.id=d.faq_id');
            
           
         
            $this->db->where("t.trans_id",$id);
            $this->db->where("d.language_id","302");
            $this->db->order_by("t.id","desc");
        
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}

}
