<?php
class login extends Controller {
	function index() {
		parent::Controller();
		$this->load->helper(array('form', 'url'));
		$this->load->model('Ldap_model');
		$this->load->library('form_validation','session');
		/*

		$this->form_validation->set_rules('uid','帳號','trim|required|xss_clean|callback__userCheck');
		$this->form_validation->set_rules('passwd','密碼','trim|required|callback__passwdCheck');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login');
		}
		else
		{
			$datas['content'] = $this->load->view('readme',null,true);
            $datas['menu'] = $this->load->view('menu-tem',null,true);            
            $this->load->view('template',$datas);
		}
		*/
		session_start();
		if(!isset($_SESSION[session_id()])) // 判斷有沒有登入,沒有登入的話把目前認證的網頁丟到csas上查詢(固定此寫法即可)
			header("Location: https://" . $_SERVER["HTTP_HOST"] . "/csas/?URL=https://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]);
		else { // 有登入的話就導到正確的網頁
			$datas['content'] = $this->load->view('readme',null,true);
            $datas['menu'] = $this->load->view('menu-tem',null,true);            
			$this->Ldap_model->validation($_SESSION[session_id()]["cs_user"]);
            $this->load->view('template',$datas);
		}
		/*
		// use cs auth instead of zend-auth
		if(!isset($_SESSION[session_id()]))
			header("Location: https://" . $_SERVER["HTTP_HOST"] . "/csas/?URL=https://www.cs.nctu.edu.tw/libman2/");
		else
			// don't redirect to print/index.php, the action routing will restart
			// return print/, and let zend do action routing itself
			header("Location: https://www.cs.nctu.edu.tw/libman2/");*/
	}

	function _passwdCheck() {
		$data['uid'] = $this->input->post('uid',TRUE);
		$data['passwd'] = $this->input->post('passwd');
		$this->load->model('Ldap_model');
			if( $this->Ldap_model->validation($data) ) {
				return TRUE;
			}
			else {
				$this->form_validation->set_message('_passwdCheck', '抱歉, 你密碼錯了喔.');
				return FALSE;
			}
	
	}
	function _userCheck() {
		$data['uid'] = $this->input->post('uid',TRUE);
		$this->load->model('Ldap_model');
			if( $this->Ldap_model->isUserExisted($data) ) {
				return TRUE;
			}
			else {
				$this->form_validation->set_message('_userCheck', '抱歉, 沒有這個使用者.');
				return FALSE;
			}
	
	}
	function ldap() {
		$this->load->model('Ldap_model');
		$data = $this->Ldap_model->listFaculty();
	
	}
	function logout() {
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('Ldap_model');
		$this->Ldap_model->terminate();
		header("Location: http://" . $_SERVER["HTTP_HOST"] . "/csas/do_logout.php");
		//redirect('/', 'refresh');	
	}
}
?>
