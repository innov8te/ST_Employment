<?php 

$CI =& get_instance();
$CI->load->model('pages_model');
$data['favicon'] = $CI->pages_model->getFavicon();

$data['sitename'] = $CI->pages_model->getSitename();

$data['sitelogo'] = $CI->pages_model->getSitelogo();


$this->load->model('slider_model');
$data['sliderData'] = $CI->slider_model->getSliderList();


$this->load->view('layouts/header', $data);

?>
<div class="content">
<?php $this->load->view($main_content); ?>
</div><!-- .content -->



<?php 

$data['contactusData'] = $CI->pages_model->getContactusData();

$data['ftTtestimonialData'] = $CI->pages_model->getFtTestimonialData();

$this->load->view('layouts/footer', $data); 

?>

