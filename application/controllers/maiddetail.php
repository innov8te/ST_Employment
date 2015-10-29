<?php
	/**
	* 
	*/
	class Maiddetail extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}


		function maidDetail($id=0)
		{
			
	        $this->load->model('searchmaids_model');
		    $data['maidDetailData'] = $this->searchmaids_model->getMaidDetailData($id);
		    $data['maidInfoDetailData'] = $this->searchmaids_model->getMaidInfoDetailData($id);

		    $this->load->model('agegroup_model');
		    $data['ageList'] = $this->agegroup_model->getAgeList();
		    

		    $this->load->model('maids_model');
		    $data['countriesList'] = $this->maids_model->getCountriesData();
		    $data['experienceList'] = $this->maids_model->getExperienceList();
		    $data['otherinfoList'] = $this->maids_model->getOtherinfoList();

		    $data['maidExpDataList'] = $this->maids_model->getMiadExpData();
		    $data['maidOthDataList'] = $this->maids_model->getMiadOthData();


			$data['main_content'] = 'maiddetail';
			$this->load->view('layouts/template', $data);
		}


	}// End Class


?>