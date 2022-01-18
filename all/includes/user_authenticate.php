<?php
if($this->session->userdata('infl_sess')!=''){
    $user_id=$this->session->userdata('infl_sess')['userid'];
    $user_name=$this->session->userdata('infl_sess')['name'];
	
}else{
    $user_id='0';
}
?>