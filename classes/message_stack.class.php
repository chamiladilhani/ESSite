<?php
class MessageStack{
	
	var $data = array();
	
	
	function MessageStack(){
		
		if(!isset($_SESSION['msgstack']))
		{
			$_SESSION['msgstack'] = array();
		}
		
		$this->data = $_SESSION['msgstack'];
		
	}
	
	
	function add($group, $msg, $type){
			
		if($msg != ''){
			
			$_SESSION['msgstack'][$group][] = array('text' => $msg, 'type' => $type);			
			
		}
	}
	
	
	function getMessages($group){
		
		if(isset($_SESSION['msgstack'])){
		
			if(count($_SESSION['msgstack'])!=0){
				
				if(array_key_exists($group,$_SESSION['msgstack'])){

					if($_SESSION['msgstack'][$group] != null){
						
						$data = '';

						
						foreach($_SESSION['msgstack'][$group] as $k => $m){
							if($m['text']!=""){
								$data .= '<div class="'. $m['type'] .' alert alert_p">'. $m['text'] .'<a class="toggle-alert" href="#">Toggle</a></div>';
							}
							unset($_SESSION['msgstack'][$group][$k]);
							if(count($_SESSION['msgstack'][$group] == 0)){
								
							}
						}

						echo $data;
						return true;
					}
				}
			}
		}
		
	}
}


?> 