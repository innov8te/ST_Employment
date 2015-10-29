<?php 
	if (!defined('BASEPATH')) exit ('No direct script access allowed');

	/**
	* 
	*/
	class Pages_Model extends CI_Model
	{
		
		function __construct()
		{
			# code...
		}

		function getSitelogo()
		{
			$query = $this->db->where('page_parent','site_logo')
					 ->get('st_pages')->first_row('array');		

			return $query;
		}

		function getFavicon()
		{
			$query = $this->db->where('page_parent','favicon')
					 ->get('st_pages')->first_row('array');		

			return $query;
		}

		function getSitename()
		{
			$query = $this->db->where('page_parent','site_name')
					 ->get('st_pages')->first_row('array');		

			return $query;
		}


		function getHomeWelcomeData()
		{
			$query = $this->db->where('page_parent','welcome_heading')
					 ->get('st_pages')->first_row('array');		

			return $query;
		}


		function getFeatureMaidsList()
		{
			$this->db->where('maid_feature', "1");
			$this->db->limit(4, 0);
			$this->db->order_by("maid_id","desc");
	        $query = $this->db->get('st_maids');

			/*$limit = 1;
			$start = 1;

	        $this->db->select('*');
			$this->db->from('st_maids');
			$this->db->limit($limit, $start);			
			$query = $this->db->get();*/


			$featureMaidsList = array();

			foreach ($query->result() as $row) {
	            $featureMaidsList[] = array(
	            	'maid_id' => $row->maid_id,
	  				'maid_name' => $row->maid_name,
	  				'maid_image' => $row->maid_image,
	  				'maid_age' => $row->maid_age,
	  				'maid_from' => $row->maid_from,
	  				'maid_type' => $row->maid_type,
	  				'maid_salary' => $row->maid_salary,
	  				'maid_day_off' => $row->maid_day_off
	            );
			}
			return $featureMaidsList;
		}


		function getAboutusData()
		{
			$query = $this->db->where('page_parent','aboutus')
					 ->get('st_pages')->first_row('array');		

			return $query;
		}


		function getTestimonialList($param = array())
		{	
			$this->db->order_by("testi_id","desc");
			
			if(array_key_exists("limit", $param) && array_key_exists("start", $param)) {				
	            $this->db->limit($param['limit'], $param['start']);
	            $query = $this->db->get('st_testimonials');
	        }else{
	        	$query = $this->db->get('st_testimonials');
	        }


			$testimonialList = array();

			foreach ($query->result() as $row) {
	            $testimonialList[] = array(
	            	'testi_id' => $row->testi_id,
	  				'testi_name' => $row->testi_name,
	  				'testi_content' => $row->testi_content,
	  				'testi_image' => $row->testi_image
	            );
			}
			return $testimonialList;
		}

		function testimonials_record_count()
		{
			return $this->db->count_all("st_testimonials");
		}


		function getContactusData()
		{
			$query['contactus_address'] = $this->db->where('page_parent','contactus_address')
					 ->get('st_pages')->first_row('array');		

			$query['contactus_tel'] = $this->db->where('page_parent','contactus_tel')
					 ->get('st_pages')->first_row('array');		


			$query['contactus_fax'] = $this->db->where('page_parent','contactus_fax')
					 ->get('st_pages')->first_row('array');	


			$query['contactus_email'] = $this->db->where('page_parent','contactus_email')
					 ->get('st_pages')->first_row('array');			



			return $query;
		}


		function contactusFormEmailSend()
		{
			$this->input->post('cnt_name');

			//configure email settings
            // $config['protocol'] = 'smtp';
            // $config['smtp_host'] = 'ssl://smtp.gmail.com';
            // $config['smtp_port'] = '465';
            // $config['smtp_user'] = 'user@gmail.com';
            // $config['smtp_pass'] = 'password';
            // $config['mailtype'] = 'html';
            // $config['charset'] = 'iso-8859-1';
            // $config['wordwrap'] = TRUE;
            // $config['newline'] = "\r\n"; //use double quotes
            // //$this->load->library('email', $config);
            // $this->email->initialize($config);                        

			$name = $this->input->post('cnt_name');
			$from_email = $this->input->post('cnt_email');
			$cnt_phone = $this->input->post('cnt_phone');
			$cnt_message = $this->input->post('cnt_message');

			$subject = "ST Employment Contact Form Email";
			$to_email = "nan.kalayar@innov8te.com.sg";

			$message = '<p>Name : '.$name.'</p>
						<p>Phone : '.$cnt_phone.'</p>
						<p>Message : '.$cnt_message.'</p>';


			//send mail
            $this->load->library('email');
            $this->email->set_newline("\r\n");
            $this->email->from($from_email, $name);
            $this->email->to($to_email);
            //$this->email->bcc($cc_email);
            $this->email->subject($subject);
            $this->email->message($message);

            if ($this->email->send())
            {
                // mail sent
                $this->session->set_flashdata('alert_text_success','Your mail has been sent successfully!');
                redirect('contactus');
            }
            else
            {
                //error
                $this->session->set_flashdata('alert_text_err','There is error in sending mail! Please try again later');
                redirect('contactus');
            }



		}



		function getFtTestimonialData()
		{
			$this->db->limit(1, 0);
			$this->db->order_by("testi_id","desc");
	        $query = $this->db->get('st_testimonials');

			$ftTestiData = array();

			foreach ($query->result() as $row) {
	            $ftTestiData[] = array(
	            	'testi_name' => $row->testi_name,
	  				'testi_content' => $row->testi_content,
	  				'testi_image' => $row->testi_image
	            );
			}
			return $ftTestiData;
		}




	}//End Class



?>