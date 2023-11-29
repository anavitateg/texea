<?php

function getRealIP(){

	//$localIP = getHostByName(getHostName()); 
	
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
			$ip = $_SERVER['REMOTE_ADDR'];
	}

	return $ip;

}//getRealIP

function caracteresRaros($fileName){
	
	$a = array(' ','�','�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '?', '�', '�', '�', '�', '�', '�', '�', '�'); 
    $b = array('_','n','A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'D', 'J', 'OE', 'oe', 'S', 's', 'Y', 'Z', 'z', 'f'); 
    
    $cuantos_a = count($a);
    $cuantos_b = count($b);
    
    //echo "cuantos a: ".$cuantos_a." cuantos b: ".$cuantos_b."<br>";
    $s = $fileName;
    $nueva_cadena = "";
    for($cont=0;$cont<=$cuantos_a;$cont++){
       $partes = array();
       $caracter = $a[$cont];
       $caracter_reemplazo = $b[$cont];
       if($caracter!=""){ 
           $partes = explode($caracter, $s);
           $cuantos_partes = count($partes);
           
           if($cuantos_partes>1){
               //echo "cuantas partes caracter: ".$caracter." reemplazo: ".$caracter_reemplazo." pos: ".$cont." : ".$cuantos_partes."<br><br>";
              
               for($cont1=0;$cont1<=$cuantos_partes;$cont1++){
                 $parte_unida = $partes[$cont1];
                 //echo "parte unida: ".$parte_unida."<br>";
                 if(($parte_unida!="") and ($parte_unida!=" ")){
                     $nueva_cadena .=  $parte_unida.$b[$cont];
                 }
               }//for unir partes
               
               $s = $nueva_cadena;
               $nueva_cadena = "";
               $s = substr($s, 0, -1);
               //echo "s: ".$s."<br><br>";
              
           }//if encontro algo 
       }//el caracter buscado no esta vacio
    }//for caracteres
   
   return $s;
}//funcion



function injectionCode($cadena, $archivo, $campo){

   require("conexionsql.php");

   $cadena_completa_minuscula = strtolower($cadena);     
   $partes = explode(" ", $cadena);
   $cuantas_partes = count($partes);
   $conteo = 0;
    
   for($a=0;$a<=$cuantas_partes;$a++){
	 //isset($_POST)
	 if (isset($partes[$a])) {
		$partes_minuscula = strtolower($partes[$a]);
	 }
     
     switch($partes_minuscula){
  		case "select":
  			$conteo++;
  			$a = $cuantas_partes + 1;
  			break;
  		case "delete":
  			$conteo++;
  			$a = $cuantas_partes + 1;
  			break;
  		case "erase":
    		$conteo++;
    	  $a = $cuantas_partes + 1;
    		break;
    	case "shutdown":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "drop":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "database":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "table":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "create":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "rename":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "copy":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "format":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "alter":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
  		case "update":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "kill":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "killall":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
      case "ps":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "print":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "printf":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "echo":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "atop":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "xkill":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "renice":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "pkill":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "pgrep":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "pstree":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "htop":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "top":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "user":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "users":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "tasklist":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "taskkill":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "cmd":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "phpinfo()":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "apache_request_headers()":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "apache_response_headers()":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "remote_addr":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "remote_host":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "remote_port":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "http_referer":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "request_uri":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "http_user_agent":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
      case "https":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "server_addr":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "server_name":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "document_root":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "server_software":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "server_protocol":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "server_admin":
    		$conteo++;
        $a = $cuantas_partes + 1;
    		break;
    	case "request_method":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "get":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "head":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "post":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "put":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "request_time":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "query_string":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "http_accept":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "http_accept_charset":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "http_accept_encoding":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "http_accept_language":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "http_connection":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "http_host":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "script_filename":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "server_port":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "server_signature":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "script_name":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "php_auth_digest":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "php_auth_user":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "php_auth_pw":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "auth_type":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "path_info":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "orig_path_info":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "chmod":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "ls":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "arp":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "assoc":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "at":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "attrib":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "auditpol":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "bitsadmin":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "break":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "bcdboot":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "bcdedit":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "bootcfg":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "cacls":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "call":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "cd":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "chcp":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "chdir":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "chkdsk":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "chkntfs":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "choice":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
      case "cipher":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "cleanmgr":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "clip":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "cls":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "cmdkey":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	/*
      case "color":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	*/
    	case "comp":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "compact":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "convert":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "cscript":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "date":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	/*
      case "del":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	*/
    	case "defrag":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "dir":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "dism":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "diskcomp":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "diskcopy":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "diskpart":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "doskey":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "driverquery":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "endlocal":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "expand":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "exit":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "fc":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "find":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "findstr":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "for":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "forfiles":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "fsutil":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "ftype":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "getmac":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "goto":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "gpresult":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "gpupdate":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "graftabl":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "help":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "icacls":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "if":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "ipconfig":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "label":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "logman":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "mem":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "md":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "mkdir":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "mklink":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "mode":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "more":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "move":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "msinfo32":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
     	case "mstsc":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "nbtstat":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "net":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "netcfg":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "netsh":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
     	case "netstat":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "nlsfunc":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "nltest":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "nslookup":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "ocsetup":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "openfiles":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "path":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "pause":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "ping":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "popd":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "powershell":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "prompt":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "pushd":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
      case "qappsrv":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "qprocess":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
     	case "query":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "quser":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "qwinsta":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "rasdial":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "rd":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "recover":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "reg":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "regedit":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "regsvr32":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "relog":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "rem":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "ren":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "replace":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "rmdir":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "robocopy":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "reset":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "session":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "route":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "rpcping":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "rundll32":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "runas":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "secedit":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "set":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "setlocal":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "setver":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "setx":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "sc":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "schtasks":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "sfc":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "shadow":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "share":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "sxstrace":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "shift":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "sort":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "start":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "subst":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "systeminfo":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "takeown":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "tcmsetup":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "time":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "timeout":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "title":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "tracerpt":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "tracert":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "tree":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "tsdiscon":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "tskill":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "type":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "typeperf":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "tzutil":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "unlodctr":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	/*
      case "ver":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	*/
    	case "verifier":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "verify":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "vol":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "vssadmin":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "w32tm":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "waitfor":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "wbadmin":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "wevtutil":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "where":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "and":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "or":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "whoami":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "winhlp32":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "winrm":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "winrs":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "winsat":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "wmic":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
    	case "xcopy":
    		$conteo++;
    		$a = $cuantas_partes + 1;
    		break;
  		default :
  		
  		    $palabra_clave   = "select";
      		$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
      		$palabra_clave   = "delete";
      		$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
      		$palabra_clave   = "erase";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "shutdown";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "drop";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "database";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "table";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "create";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "rename";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "copy";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "format";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "alter";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
      		$palabra_clave   = "update";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "kill";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "killall";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
          //$palabra_clave   = "ps";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "print";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "printf";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "echo";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "atop";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "xkill";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "renice";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "pkill";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "pgrep";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "pstree";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "htop";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "top";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "user";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "users";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "tasklist";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "taskkill";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "cmd";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "phpinfo()";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "apache_request_headers()";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "apache_response_headers()";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "remote_addr";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "remote_host";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "remote_port";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "http_referer";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "request_uri";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "http_user_agent";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "https";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "server_addr";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "server_name";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "document_root";
          $encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "server_software";
          $encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "server_protocol";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "server_admin";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "request_method";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "get";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "head";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "post";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "put";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "request_time";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "query_string";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "http_accept";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "http_accept_charset";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "http_accept_encoding";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "http_accept_language";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "http_connection";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "http_host";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "script_filename";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "server_port";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "server_signature";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "script_name";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "php_auth_digest";
          $encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "php_auth_user";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "php_auth_pw";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "auth_type";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "path_info";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "orig_path_info";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "chmod";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "ls";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "arp";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "assoc";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "at";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "attrib";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "auditpol";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "bitsadmin";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "break";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "bcdboot";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "bcdedit";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "bootcfg";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "cacls";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "call";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "cd";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "chcp";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "chdir";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "chkdsk";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "chkntfs";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "choice";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
          $palabra_clave   = "cipher";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "cleanmgr";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "clip";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "cls";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "cmdkey";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "color";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "comp";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "compact";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "convert";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "cscript";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "date";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "del";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "defrag";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "dir";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "dism";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "diskcomp";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "diskcopy";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "diskpart";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "doskey";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "driverquery";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "endlocal";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "expand";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "exit";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "fc";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "find";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "findstr";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "for";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "forfiles";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "fsutil";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "ftype";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "getmac";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "goto";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "gpresult";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "gpupdate";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "graftabl";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "help";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "icacls";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "if";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "ipconfig";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "label";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "logman";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "mem";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "md";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "mkdir";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "mklink";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "mode";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "more";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "move";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "msinfo32";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
         	$palabra_clave   = "mstsc";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "nbtstat";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "net";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "netcfg";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "netsh";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
         	$palabra_clave   = "netstat";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "nlsfunc";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "nltest";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "nslookup";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "ocsetup";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "openfiles";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "path";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "pause";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "ping";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "popd";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "powershell";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "prompt";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "pushd";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
          $palabra_clave   = "qappsrv";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "qprocess";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
         	$palabra_clave   = "query";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "quser";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "qwinsta";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "rasdial";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "rd";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "recover";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "reg";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "regedit";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "regsvr32";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "relog";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "rem";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "ren";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "replace";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "rmdir";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "robocopy";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "reset";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "session";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "route";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "rpcping";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "rundll32";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "runas";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "secedit";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "set";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "setlocal";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "setver";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "setx";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "sc";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "schtasks";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "sfc";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "shadow";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "share";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "sxstrace";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "shift";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "sort";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "start";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "subst";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "systeminfo";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "takeown";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "tcmsetup";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "time";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "timeout";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "title";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "tracerpt";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "tracert";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "tree";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "tsdiscon";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "tskill";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "type";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "typeperf";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "tzutil";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "unlodctr";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "ver";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "verifier";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "verify";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "vol";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "vssadmin";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "w32tm";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "waitfor";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "wbadmin";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "wevtutil";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "where";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "and";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	//$palabra_clave   = "or";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "whoami";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "winhlp32";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "winrm";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "winrs";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "winsat";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "wmic";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
        	$palabra_clave   = "xcopy";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo++;}
  		
  		
  		  break;
  	}//switch
  }//for
  
  if($conteo>0){
    $date = time();
    $fecha = date("Y-m-d" , $date ); 
	$hora = date( "g:i:s A" , $date );
	$hora = date("g:i:s A",strtotime("+5 hour, -0 minute")); 

    $ip = getRealIP();
	if($ip!="::1"){
		$meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
		$latitud = $meta['geoplugin_latitude'];
		$longitud = $meta['geoplugin_longitude'];
		$ciudad = $meta['geoplugin_city'];
		$region = $meta['geoplugin_region'];
		$nombre_pais = $meta['geoplugin_countryName'];
		$codigo_pais = $meta['geoplugin_countryCode'];
	}else{
	    $latitud = 0;
		$longitud = 0;
		$ciudad = 0;
		$region = 0;
		$nombre_pais = 0;
		$codigo_pais = 0;	
	}//if
	$sql = "INSERT INTO login_ip ( 
		ip_case, 
		latitud, 
		longitud, 
		ciudad, 
		region, 
		nombre_pais, 
		codigo_pais, 
		parte_sistema,
		campo,
		dato,
		fecha,
		hora
		) VALUES (
		'".$ip."', 
		'".$latitud."',
		'".$longitud."',
		'".$ciudad."',
		'".$region."',
		'".$nombre_pais."',
		'".$codigo_pais."',
		'".$archivo."',
		'".$campo."',
		'".$cadena."',
		'".$fecha."',
		'".$hora."'
		)";
		$resultado = pg_query($conexion, $sql);
	}
  
 return $conteo;
}// injection code

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function palabraInjectionCode($cadena){
   $cadena_completa_minuscula = strtolower($cadena);
   $partes = explode(" ", $cadena);
   $cuantas_partes = count($partes);
   $conteo = " ";
    
   for($a=0;$a<=$cuantas_partes;$a++){
     $partes_minuscula = strtolower($partes[$a]);
     switch($partes_minuscula){
  		case "select":
  			$conteo.= "select ";
  			$a = $cuantas_partes + 1;
  			break;
  		case "delete":
  			$conteo.= "delete ";
  			$a = $cuantas_partes + 1;
  			break;
  		case "erase":
    		$conteo.= "erase ";
    	  $a = $cuantas_partes + 1;
    		break;
    	case "shutdown":
    		$conteo.= "shutdown ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "drop":
    		$conteo.= "drop ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "database":
    		$conteo.= "database ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "table":
    		$conteo.= "table ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "create":
    		$conteo.= "create ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "rename":
    		$conteo.= "rename ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "copy":
    		$conteo.= "copy ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "format":
    		$conteo.= "format ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "alter":
    		$conteo.= "alter ";
    		$a = $cuantas_partes + 1;
    		break;
  		case "update":
    		$conteo.= "update ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "kill":
    		$conteo.= "kill ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "killall":
    		$conteo.= "killall ";
    		$a = $cuantas_partes + 1;
    		break;
      case "ps":
    		$conteo.= "ps ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "print":
    		$conteo.= "print ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "printf":
    		$conteo.= "printf ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "echo":
    		$conteo.= "echo ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "atop":
    		$conteo.= "atop ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "xkill":
    		$conteo.= "xkill ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "renice":
    		$conteo.= "renice ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "pkill":
    		$conteo.= "pkill ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "pgrep":
    		$conteo.= "pgrep ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "pstree":
    		$conteo.= "pstree ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "htop":
    		$conteo.= "htop ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "top":
    		$conteo.= "top ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "user":
    		$conteo.= "user ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "users":
    		$conteo.= "users ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "tasklist":
    		$conteo.= "tasklist ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "taskkill":
    		$conteo.= "taskkill ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "cmd":
    		$conteo.= "cmd ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "phpinfo()":
    		$conteo.= "phpinfo() ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "apache_request_headers()":
    		$conteo.= "apache_request_headers() ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "apache_response_headers()":
    		$conteo.= "apache_response_headers() ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "remote_addr":
    		$conteo.= "remote_addr ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "remote_host":
    		$conteo.= "remote_host ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "remote_port":
    		$conteo.= "remote_port ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "http_referer":
    		$conteo.= "http_referer ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "request_uri":
    		$conteo.= "request_uri ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "http_user_agent":
    		$conteo.= "http_user_agent ";
    		$a = $cuantas_partes + 1;
    		break;
      case "https":
    		$conteo.= "https ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "server_addr":
    		$conteo.= "server_addr ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "server_name":
    		$conteo.= "server_name ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "document_root":
    		$conteo.= "document_root ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "server_software":
    		$conteo.= "server_software ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "server_protocol":
    		$conteo.= "server_protocol ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "server_admin":
    		$conteo.= "server_admin ";
        $a = $cuantas_partes + 1;
    		break;
    	case "request_method":
    		$conteo.= "request_method ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "get":
    		$conteo.= "get ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "head":
    		$conteo.= "head ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "post":
    		$conteo.= "post ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "put":
    		$conteo.= "put ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "request_time":
    		$conteo.= "request_time ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "query_string":
    		$conteo.= "query_string ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "http_accept":
    		$conteo.= "http_accept ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "http_accept_charset":
    		$conteo.= "http_accept_charset ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "http_accept_encoding":
    		$conteo.= "http_accept_encoding ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "http_accept_language":
    		$conteo.= "http_accept_language ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "http_connection":
    		$conteo.= "http_connection ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "http_host":
    		$conteo.= "http_host ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "script_filename":
    		$conteo.= "script_filename ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "server_port":
    		$conteo.= "server_port ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "server_signature":
    		$conteo.= "server_signature ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "script_name":
    		$conteo.= "script_name ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "php_auth_digest":
    		$conteo.= "php_auth_digest ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "php_auth_user":
    		$conteo.= "php_auth_user ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "php_auth_pw":
    		$conteo.= "php_auth_pw ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "auth_type":
    		$conteo.= "auth_type ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "path_info":
    		$conteo.= "path_info ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "orig_path_info":
    		$conteo.= "orig_path_info ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "chmod":
    		$conteo.= "chmod ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "ls":
    		$conteo.= "ls ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "arp":
    		$conteo.= "arp ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "assoc":
    		$conteo.= "assoc ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "at":
    		$conteo.= "at ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "attrib":
    		$conteo.= "attrib ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "auditpol":
    		$conteo.= "auditpol ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "bitsadmin":
    		$conteo.= "bitsadmin ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "break":
    		$conteo.= "break ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "bcdboot":
    		$conteo.= "bcdboot ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "bcdedit":
    		$conteo.= "bcdedit ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "bootcfg":
    		$conteo.= "bootcfg ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "cacls":
    		$conteo.= "cacls ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "call":
    		$conteo.= "call ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "cd":
    		$conteo.= "cd ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "chcp":
    		$conteo.= "chcp ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "chdir":
    		$conteo.= "pchdirs ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "chkdsk":
    		$conteo.= "chkdsk ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "chkntfs":
    		$conteo.= "chkntfs ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "choice":
    		$conteo.= "choice ";
    		$a = $cuantas_partes + 1;
    		break;
      case "cipher":
    		$conteo.= "cipher ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "cleanmgr":
    		$conteo.= "cleanmgr ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "clip":
    		$conteo.= "clip ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "cls":
    		$conteo.= "cls ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "cmdkey":
    		$conteo.= "cmdkey ";
    		$a = $cuantas_partes + 1;
    		break;
    	/*
      case "color":
    		$conteo.= "color ";
    		$a = $cuantas_partes + 1;
    		break;
    	*/
    	case "comp":
    		$conteo.= "comp ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "compact":
    		$conteo.= "compact ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "convert":
    		$conteo.= "convert ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "cscript":
    		$conteo.= "cscript ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "date":
    		$conteo.= "date ";
    		$a = $cuantas_partes + 1;
    		break;
    	/*
      case "del":
    		$conteo.= "del ";
    		$a = $cuantas_partes + 1;
    		break;
    	*/
    	case "defrag":
    		$conteo.= "defrag ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "dir":
    		$conteo.= "dir ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "dism":
    		$conteo.= "dism ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "diskcomp":
    		$conteo.= "diskcomp ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "diskcopy":
    		$conteo.= "diskcopy ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "diskpart":
    		$conteo.= "diskpart ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "doskey":
    		$conteo.= "doskey ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "driverquery":
    		$conteo.= "driverquery ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "endlocal":
    		$conteo.= "endlocal ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "expand":
    		$conteo.= "expand ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "exit":
    		$conteo.= "exit ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "fc":
    		$conteo.= "fc ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "find":
    		$conteo.= "find ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "findstr":
    		$conteo.= "findstr ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "for":
    		$conteo.= "for ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "forfiles":
    		$conteo.= "forfiles ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "fsutil":
    		$conteo.= "fsutil ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "ftype":
    		$conteo.= "ftype ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "getmac":
    		$conteo.= "getmac ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "goto":
    		$conteo.= "goto ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "gpresult":
    		$conteo.= "gpresult ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "gpupdate":
    		$conteo.= "gpupdate ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "graftabl":
    		$conteo.= "graftabl ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "help":
    		$conteo.= "help ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "icacls":
    		$conteo.= "icacls ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "if":
    		$conteo.= "if ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "ipconfig":
    		$conteo.= "ipconfig ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "label":
    		$conteo.= "label ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "logman":
    		$conteo.= "logman ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "mem":
    		$conteo.= "mem ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "md":
    		$conteo.= "md ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "mkdir":
    		$conteo.= "mkdir ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "mklink":
    		$conteo.= "mklink ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "mode":
    		$conteo.= "mode ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "more":
    		$conteo.= "more ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "move":
    		$conteo.= "move ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "msinfo32":
    		$conteo.= "msinfo32 ";
    		$a = $cuantas_partes + 1;
    		break;
     	case "mstsc":
    		$conteo.= "mstsc ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "nbtstat":
    		$conteo.= "nbtstat ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "net":
    		$conteo.= "net ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "netcfg":
    		$conteo.= "netcfg ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "netsh":
    		$conteo.= "netsh ";
    		$a = $cuantas_partes + 1;
    		break;
     	case "netstat":
    		$conteo.= "netstat ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "nlsfunc":
    		$conteo.= "nlsfunc ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "nltest":
    		$conteo.= "nltest ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "nslookup":
    		$conteo.= "nslookup ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "ocsetup":
    		$conteo.= "ocsetup ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "openfiles":
    		$conteo.= "openfiles ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "path":
    		$conteo.= "path ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "pause":
    		$conteo.= "pause ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "ping":
    		$conteo.= "ping ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "popd":
    		$conteo.= "popd ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "powershell":
    		$conteo.= "powershell ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "prompt":
    		$conteo.= "prompt ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "pushd":
    		$conteo.= "pushd ";
    		$a = $cuantas_partes + 1;
    		break;
      case "qappsrv":
    		$conteo.= "qappsrv ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "qprocess":
    		$conteo.= "qprocess ";
    		$a = $cuantas_partes + 1;
    		break;
     	case "query":
    		$conteo.= "query ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "quser":
    		$conteo.= "quser ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "qwinsta":
    		$conteo.= "qwinsta ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "rasdial":
    		$conteo.= "rasdial ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "rd":
    		$conteo.= "rd ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "recover":
    		$conteo.= "recover ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "reg":
    		$conteo.= "reg ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "regedit":
    		$conteo.= "regedit ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "regsvr32":
    		$conteo.= "regsvr32 ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "relog":
    		$conteo.= "relog ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "rem":
    		$conteo.= "rem ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "ren":
    		$conteo.= "ren ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "replace":
    		$conteo.= "replace ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "rmdir":
    		$conteo.= "rmdir ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "robocopy":
    		$conteo.= "robocopy ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "reset":
    		$conteo.= "reset ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "session":
    		$conteo.= "session ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "route":
    		$conteo.= "route ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "rpcping":
    		$conteo.= "rpcping ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "rundll32":
    		$conteo.= "rundll32 ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "runas":
    		$conteo.= "runas ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "secedit":
    		$conteo.= "secedit ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "set":
    		$conteo.= "set ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "setlocal":
    		$conteo.= "setlocal ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "setver":
    		$conteo.= "setver ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "setx":
    		$conteo.= "setx ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "sc":
    		$conteo.= "sc ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "schtasks":
    		$conteo.= "schtasks ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "sfc":
    		$conteo.= "sfc ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "shadow":
    		$conteo.= "shadow ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "share":
    		$conteo.= "share ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "sxstrace":
    		$conteo.= "sxstrace ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "shift":
    		$conteo.= "shift ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "sort":
    		$conteo.= "sort ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "start":
    		$conteo.= "start ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "subst":
    		$conteo.= "subst ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "systeminfo":
    		$conteo.= "systeminfo ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "takeown":
    		$conteo.= "takeown ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "tcmsetup":
    		$conteo.= "tcmsetup ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "time":
    		$conteo.= "time ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "timeout":
    		$conteo.= "timeout ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "title":
    		$conteo.= "title ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "tracerpt":
    		$conteo.= "tracerpt ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "tracert":
    		$conteo.= "tracert ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "tree":
    		$conteo.= "tree ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "tsdiscon":
    		$conteo.= "tsdiscon ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "tskill":
    		$conteo.= "tskill ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "type":
    		$conteo.= "type ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "typeperf":
    		$conteo.= "typeperf ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "tzutil":
    		$conteo.= "tzutil ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "unlodctr":
    		$conteo.= "unlodctr ";
    		$a = $cuantas_partes + 1;
    		break;
    	/*
      case "ver":
    		$conteo.= "ver ";
    		$a = $cuantas_partes + 1;
    		break;
    	*/
    	case "verifier":
    		$conteo.= "verifier ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "verify":
    		$conteo.= "verify ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "vol":
    		$conteo.= "vol ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "vssadmin":
    		$conteo.= "vssadmin ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "w32tm":
    		$conteo.= "w32tm ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "waitfor":
    		$conteo.= "waitfor ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "wbadmin":
    		$conteo.= "wbadmin ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "wevtutil":
    		$conteo.= "wevtutil ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "where":
    		$conteo.= "where ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "and":
    		$conteo.= "and ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "or":
    		$conteo.= "or ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "whoami":
    		$conteo.= "whoami ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "winhlp32":
    		$conteo.= "winhlp32 ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "winrm":
    		$conteo.= "winrm ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "winrs":
    		$conteo.= "winrs ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "winsat":
    		$conteo.= "winsat ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "wmic":
    		$conteo.= "wmic ";
    		$a = $cuantas_partes + 1;
    		break;
    	case "xcopy":
    		$conteo.= "xcopy ";
    		$a = $cuantas_partes + 1;
    		break;
  		default :
  		
  		    $palabra_clave   = "select";
      		$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "select ";}
      		$palabra_clave   = "delete";
      		$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "delete ";}
      		$palabra_clave   = "erase";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "erase ";}
        	$palabra_clave   = "shutdown";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "shutdown ";}
        	$palabra_clave   = "drop";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "drop ";}
        	$palabra_clave   = "database";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "database ";}
        	//$palabra_clave   = "table";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "table ";}
        	$palabra_clave   = "create";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "create ";}
        	$palabra_clave   = "rename";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "rename ";}
        	$palabra_clave   = "copy";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "copy ";}
        	//$palabra_clave   = "format";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	//$palabra_clave   = "alter";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
      		$palabra_clave   = "update";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "update ";}
        	$palabra_clave   = "kill";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "kill ";}
        	$palabra_clave   = "killall";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "killall ";}
          //$palabra_clave   = "ps";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "print";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "print ";}
        	$palabra_clave   = "printf";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "printf ";}
        	//$palabra_clave   = "echo";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "atop";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "atop ";}
        	$palabra_clave   = "xkill";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "xkill ";}
        	$palabra_clave   = "renice";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "renice ";}
        	$palabra_clave   = "pkill";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "pkill ";}
        	$palabra_clave   = "pgrep";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "pgrep ";}
        	$palabra_clave   = "pstree";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "pstree ";}
        	$palabra_clave   = "htop";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "htop ";}
        	//$palabra_clave   = "top";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "user";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "user ";}
        	$palabra_clave   = "users";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "users ";}
        	$palabra_clave   = "tasklist";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "tasklist ";}
        	$palabra_clave   = "taskkill";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "taskkill ";}
        	$palabra_clave   = "cmd";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "cmd ";}
        	$palabra_clave   = "phpinfo()";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "phpinfo() ";}
        	$palabra_clave   = "apache_request_headers()";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "apache_request_headers() ";}
        	$palabra_clave   = "apache_response_headers()";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "apache_response_headers() ";}
        	$palabra_clave   = "remote_addr";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "remote_addr ";}
        	$palabra_clave   = "remote_host";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "remote_host ";}
        	$palabra_clave   = "remote_port";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "remote_port ";}
        	$palabra_clave   = "http_referer";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "http_referer ";}
        	$palabra_clave   = "request_uri";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "request_uri ";}
        	$palabra_clave   = "http_user_agent";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "http_user_agent ";}
        	//$palabra_clave   = "https";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "server_addr";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "server_addr ";}
        	$palabra_clave   = "server_name";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "server_name ";}
        	$palabra_clave   = "document_root";
          $encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "document_root ";}
        	$palabra_clave   = "server_software";
          $encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "server_software ";}
        	$palabra_clave   = "server_protocol";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "server_protocol ";}
        	$palabra_clave   = "server_admin";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "server_admin ";}
        	$palabra_clave   = "request_method";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "request_method ";}
        	//$palabra_clave   = "get";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "head";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "head ";}
        	//$palabra_clave   = "post";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	//$palabra_clave   = "put";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "request_time";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "request_time ";}
        	$palabra_clave   = "query_string";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "query_string ";}
        	$palabra_clave   = "http_accept";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "http_accept ";}
        	$palabra_clave   = "http_accept_charset";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "http_accept_charset ";}
        	$palabra_clave   = "http_accept_encoding";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "http_accept_encoding ";}
        	$palabra_clave   = "http_accept_language";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "http_accept_language ";}
        	$palabra_clave   = "http_connection";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "http_connection ";}
        	$palabra_clave   = "http_host";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "http_host ";}
        	$palabra_clave   = "script_filename";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "script_filename ";}
        	$palabra_clave   = "server_port";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "server_port ";}
        	$palabra_clave   = "server_signature";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "server_signature ";}
        	$palabra_clave   = "script_name";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "script_name ";}
        	$palabra_clave   = "php_auth_digest";
          $encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "php_auth_digest ";}
        	$palabra_clave   = "php_auth_user";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "php_auth_user ";}
        	$palabra_clave   = "php_auth_pw";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "php_auth_pw ";}
        	$palabra_clave   = "auth_type";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "auth_type ";}
        	$palabra_clave   = "path_info";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "path_info ";}
        	$palabra_clave   = "orig_path_info";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "orig_path_info ";}
        	$palabra_clave   = "chmod";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "chmod ";}
        	//$palabra_clave   = "ls";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	//$palabra_clave   = "arp";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "assoc";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "assoc ";}
        	//$palabra_clave   = "at";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "attrib";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "attrib ";}
        	$palabra_clave   = "auditpol";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "auditpol ";}
        	$palabra_clave   = "bitsadmin";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "bitsadmin ";}
        	$palabra_clave   = "break";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "break ";}
        	$palabra_clave   = "bcdboot";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "bcdboot ";}
        	$palabra_clave   = "bcdedit";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "bcdedit ";}
        	$palabra_clave   = "bootcfg";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "bootcfg ";}
        	$palabra_clave   = "cacls";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "cacls ";}
        	//$palabra_clave   = "call";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "call ";}
        	//$palabra_clave   = "cd";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "chcp";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "chcp ";}
        	$palabra_clave   = "chdir";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "chdir ";}
        	$palabra_clave   = "chkdsk";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "chkdsk ";}
        	$palabra_clave   = "chkntfs";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "chkntfs ";}
        	$palabra_clave   = "choice";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "choice ";}
          $palabra_clave   = "cipher";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "cipher ";}
        	$palabra_clave   = "cleanmgr";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "cleanmgr ";}
        	$palabra_clave   = "clip";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "clip ";}
        	$palabra_clave   = "cls";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "cls ";}
        	$palabra_clave   = "cmdkey";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "cmdkey ";}
        	//$palabra_clave   = "color";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	//$palabra_clave   = "comp";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	//$palabra_clave   = "compact";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	//$palabra_clave   = "convert";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "cscript";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "cscript ";}
        	$palabra_clave   = "date";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "date ";}
        	//$palabra_clave   = "del";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	//$palabra_clave   = "defrag";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	//$palabra_clave   = "dir";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	//$palabra_clave   = "dism";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "diskcomp";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "diskcomp ";}
        	$palabra_clave   = "diskcopy";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "diskcopy ";}
        	$palabra_clave   = "diskpart";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "diskpart ";}
        	$palabra_clave   = "doskey";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "doskey ";}
        	$palabra_clave   = "driverquery";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "driverquery ";}
        	$palabra_clave   = "endlocal";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "endlocal ";}
        	$palabra_clave   = "expand";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "expand ";}
        	$palabra_clave   = "exit";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "exit ";}
        	//$palabra_clave   = "fc";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "find";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "find ";}
        	$palabra_clave   = "findstr";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "findstr ";}
        	//$palabra_clave   = "for";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "forfiles";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "forfiles ";}
        	$palabra_clave   = "fsutil";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "fsutil ";}
        	$palabra_clave   = "ftype";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "ftype ";}
        	$palabra_clave   = "getmac";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "getmac ";}
        	$palabra_clave   = "goto";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "goto ";}
        	$palabra_clave   = "gpresult";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "gpresult ";}
        	$palabra_clave   = "gpupdate";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "gpupdate ";}
        	$palabra_clave   = "graftabl";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "graftabl ";}
        	$palabra_clave   = "help";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "help ";}
        	$palabra_clave   = "icacls";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "icacls ";}
        	//$palabra_clave   = "if";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "ipconfig";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "ipconfig ";}
        	$palabra_clave   = "label";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "label ";}
        	$palabra_clave   = "logman";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "logman ";}
        	//$palabra_clave   = "mem";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	//$palabra_clave   = "md";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "mkdir";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "mkdir ";}
        	$palabra_clave   = "mklink";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "mklink ";}
        	//$palabra_clave   = "mode";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	//$palabra_clave   = "more";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	//$palabra_clave   = "move";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "msinfo32";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "msinfo32 ";}
         	$palabra_clave   = "mstsc";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "mstsc ";}
        	$palabra_clave   = "nbtstat";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "nbtstat ";}
        	//$palabra_clave   = "net";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "netcfg";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "netcfg ";}
        	$palabra_clave   = "netsh";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "netsh ";}
         	$palabra_clave   = "netstat";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "netstat ";}
        	$palabra_clave   = "nlsfunc";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "nlsfunc ";}
        	$palabra_clave   = "nltest";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "nltest ";}
        	$palabra_clave   = "nslookup";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "nslookup ";}
        	$palabra_clave   = "ocsetup";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "ocsetup ";}
        	$palabra_clave   = "openfiles";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "openfiles ";}
        	$palabra_clave   = "path";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "path ";}
        	$palabra_clave   = "pause";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "pause ";}
        	$palabra_clave   = "ping";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "ping ";}
        	$palabra_clave   = "popd";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "popd ";}
        	$palabra_clave   = "powershell";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "powershell ";}
        	$palabra_clave   = "prompt";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "prompt ";}
        	$palabra_clave   = "pushd";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "pushd ";}
          $palabra_clave   = "qappsrv";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "qappsrv ";}
        	$palabra_clave   = "qprocess";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "qprocess ";}
         	$palabra_clave   = "query";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "query ";}
        	$palabra_clave   = "quser";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "quser ";}
        	$palabra_clave   = "qwinsta";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "qwinsta ";}
        	$palabra_clave   = "rasdial";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "rasdial ";}
        	//$palabra_clave   = "rd";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "recover";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "recover ";}
        	//$palabra_clave   = "reg";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "regedit";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "regedit ";}
        	$palabra_clave   = "regsvr32";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "regsvr32 ";}
        	$palabra_clave   = "relog";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "relog ";}
        	//$palabra_clave   = "rem";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	//$palabra_clave   = "ren";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "replace";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "replace ";}
        	$palabra_clave   = "rmdir";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "rmdir ";}
        	$palabra_clave   = "robocopy";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "robocopy ";}
        	$palabra_clave   = "reset";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "reset ";}
        	$palabra_clave   = "session";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "session ";}
        	$palabra_clave   = "route";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "route ";}
        	$palabra_clave   = "rpcping";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "rpcping ";}
        	$palabra_clave   = "rundll32";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "rundll32 ";}
        	$palabra_clave   = "runas";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "runas ";}
        	$palabra_clave   = "secedit";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "secedit ";}
        	//$palabra_clave   = "set";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "setlocal";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "setlocal ";}
        	$palabra_clave   = "setver";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "setver ";}
        	$palabra_clave   = "setx";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "setx ";}
        	//$palabra_clave   = "sc";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "schtasks";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "schtasks ";}
        	//$palabra_clave   = "sfc";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "shadow";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "shadow ";}
        	$palabra_clave   = "share";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "share ";}
        	$palabra_clave   = "sxstrace";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "sxstrace ";}
        	$palabra_clave   = "shift";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "shift ";}
        	//$palabra_clave   = "sort";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	//$palabra_clave   = "start";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	//$palabra_clave   = "subst";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "systeminfo";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "systeminfo ";}
        	$palabra_clave   = "takeown";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "takeown ";}
        	$palabra_clave   = "tcmsetup";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "tcmsetup ";}
        	$palabra_clave   = "time";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "time ";}
        	$palabra_clave   = "timeout";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "timeout ";}
        	$palabra_clave   = "title";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "title ";}
        	$palabra_clave   = "tracerpt";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "tracerpt ";}
        	$palabra_clave   = "tracert";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "tracert ";}
        	$palabra_clave   = "tree";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "ptrees ";}
        	$palabra_clave   = "tsdiscon";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "tsdiscon ";}
        	$palabra_clave   = "tskill";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "tskill ";}
        	$palabra_clave   = "type";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "type ";}
        	$palabra_clave   = "typeperf";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "typeperf ";}
        	$palabra_clave   = "tzutil";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "tzutil ";}
        	$palabra_clave   = "unlodctr";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "unlodctr ";}
        	//$palabra_clave   = "ver";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "verifier";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "verifier ";}
        	$palabra_clave   = "verify";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "verify ";}
        	//$palabra_clave   = "vol";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "vssadmin";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "vssadmin ";}
        	$palabra_clave   = "w32tm";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "w32tm ";}
        	$palabra_clave   = "waitfor";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "waitfor ";}
        	$palabra_clave   = "wbadmin";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "wbadmin ";}
        	$palabra_clave   = "wevtutil";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "wevtutil ";}
        	$palabra_clave   = "where";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "where ";}
        	//$palabra_clave   = "and";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	//$palabra_clave   = "or";
        	//$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          //if ($encontrada === false){}else{$conteo.= "ps ";}
        	$palabra_clave   = "whoami";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "whoami ";}
        	$palabra_clave   = "winhlp32";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "winhlp32 ";}
        	$palabra_clave   = "winrm";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "winrm ";}
        	$palabra_clave   = "winrs";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "winrs ";}
        	$palabra_clave   = "winsat";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "winsat ";}
        	$palabra_clave   = "wmic";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "wmic ";}
        	$palabra_clave   = "xcopy";
        	$encontrada = strpos($cadena_completa_minuscula, $palabra_clave);
          if ($encontrada === false){}else{$conteo.= "xcopy ";}
  		
  		
  		  break;
  	}//switch
  }//for
  
  if($conteo==0){
     
  }//if inicia busqueda dentro de cadena sin partir
  
  
  return $conteo;
}// palabra injection code

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  function mesLetras($mesnumero){
   
     switch($mesnumero){
  		case 1:
  			$mes = "Enero";
  		break;
  		case 2:
  			$mes = "Febrero";
  		break;
  		case 3:
  			$mes = "Marzo";
  		break;
  		case 4:
  			$mes = "Abril";
  		break;
  		case 5:
  			$mes = "Mayo";
  		break;
  		case 6:
  			$mes = "Junio";
  		break;
  		case 7:
  			$mes = "Julio";
  		break;
  		case 8:
  			$mes = "Agosto";
  		break;
  		case 9:
  			$mes = "Septiembre";
  		break;
  		case 10:
  			$mes = "Octubre";
  		break;
  		case 11:
  			$mes = "Noviembre";
  		break;
  		case 12:
  			$mes = "Diciembre";
  		break;
      default :
  		break;
  	}//switch
    return $mes;
  }//funcion mesLetras




//pintar en un formulario un campo desde la BD
//echo $_SERVER['PHP_SELF'];
function tipodecampo($tipo, $id, $nombre){
	switch($tipo){
		case "TEXTAREA":
			return "<textarea cols='20' rows='3' name='$tipo|$id'></textarea>";
			break;
		default :
			return "<input type='TEXT' name='$tipo|$id'>";
			break;
	}
}

	function findAllOccurences($Haystack, $needle, $limit=0){
	  $offset				= 0;
	  $Positions 			= array();
	  $currentOffset 	= 0;
	  $count				= 0;
	  while(($pos = strpos($Haystack, $needle, $offset))!==false && ($count < $limit || $limit == 0)) {
	   $Positions[] = $pos;
	   $offset = $pos + strlen($needle);
	   $count++;
	  }
	  return $count;
	}

  function capturarCampos2Bd($cadena){
    foreach($cadena as $x => $y){
      if($x != "tabla"){
        if($y != ""){
          $cadenaCampos .= "`$x`,";
          $cadenaValores .= "'$y',";
        }
      }else{
        $tabla = $y;
      }
    }
    $cadenaCampos = substr($cadenaCampos, 0, (strlen($cadenaCampos) - 1));
    $cadenaValores = substr($cadenaValores, 0, (strlen($cadenaValores) - 1));
    return "INSERT INTO `$tabla` ($cadenaCampos) VALUES ($cadenaValores);";
  }

  function actualizarCampos2Bd($cadena){
    foreach($cadena as $x => $y){
      if($x == "id"){
        $_id = $y;
      }
      if($x != "tabla"){
        if($y != ""){
          $cadenaCampos .= "`$x` = '$y',";
        }
      }else{
        $tabla = $y;
      }
    }
    $cadenaCampos = substr($cadenaCampos, 0, (strlen($cadenaCampos) - 1));
    return "UPDATE `$tabla` SET $cadenaCampos WHERE `id` = '$_id';";
  }

  function capturarVariables($cadena){
    $host = explode("?", $cadena);
    $variables = explode("&", $host[1]);
    $vars_array = array();
    foreach($variables as $x => $y){
      $partes = explode("=", $y);
      $vars_array[$partes[0]] = $partes[1];
    }

    return $vars_array;
  }

  //devuelve un vector con todos los campos en la tabla referenciada
  function captuarDesdeBd($tabla, $campos){
    $sql = "SELECT $campos FROM $tabla";
    $qdatos = mysql_query($sql);
    if($qdatos){
      $registros = mysql_num_rows($qdatos);
      $campos = mysql_num_fields($qdatos);
      if($registros > 0){
        $datos = array();
        for($x = 0; $x < $registros; $x ++){
          $rDatos = mysql_fetch_array($qdatos);
          $datos[$x] = array();
          for($y = 0; $y < $campos; $y ++){
            $datos[$x][mysql_field_name($qdatos, $y)] = $rDatos[mysql_field_name($qdatos, $y)];
          }
        }
        return $datos;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }

function captuarDesdeBd_subs($tabla, $campos){
    $sql = "SELECT $campos FROM $tabla ORDER BY nombre ASC";
    $qdatos = mysql_query($sql);
    if($qdatos){
      $registros = mysql_num_rows($qdatos);
      $campos = mysql_num_fields($qdatos);
      if($registros > 0){
        $datos = array();
        for($x = 0; $x < $registros; $x ++){
          $rDatos = mysql_fetch_array($qdatos);
          $datos[$x] = array();
          for($y = 0; $y < $campos; $y ++){
            $datos[$x][mysql_field_name($qdatos, $y)] = $rDatos[mysql_field_name($qdatos, $y)];
          }
        }
        return $datos;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }


  function capturarSoporDesdeBd($tabla, $campos){
    $sql = "SELECT $campos FROM $tabla order by nombre asc";
    $qdatos = mysql_query($sql);
    if($qdatos){
      $registros = mysql_num_rows($qdatos);
      $campos = mysql_num_fields($qdatos);
      if($registros > 0){
        $datos = array();
        for($x = 0; $x < $registros; $x ++){
          $rDatos = mysql_fetch_array($qdatos);
          $datos[$x] = array();
          for($y = 0; $y < $campos; $y ++){
            $datos[$x][mysql_field_name($qdatos, $y)] = $rDatos[mysql_field_name($qdatos, $y)];
          }
        }
        return $datos;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }





  function captuarDesdeBd4($tabla, $campos, $campo2, $orden){
    $sql = "SELECT $campos FROM $tabla ORDER BY $campo2 $orden";
    $qdatos = mysql_query($sql);
    if($qdatos){
      $registros = mysql_num_rows($qdatos);
      $campos = mysql_num_fields($qdatos);
      if($registros > 0){
        $datos = array();
        for($x = 0; $x < $registros; $x ++){
          $rDatos = mysql_fetch_array($qdatos);
          $datos[$x] = array();
          for($y = 0; $y < $campos; $y ++){
            $datos[$x][mysql_field_name($qdatos, $y)] = $rDatos[mysql_field_name($qdatos, $y)];
          }
        }
        return $datos;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }

  function partirHost(){
    return explode("?", $_SERVER['HTTP_REFERER']);
  }

  function mayusculaInicial($cadena){
    return (strtoupper(substr($cadena, 0, 1)) . substr($cadena, 1, strlen($cadena)));
  }

  //captura los campos requeridos a partir de una clave

  function captuarDesdeBd2($tabla, $campos, $clave, $valorClave){
    $sql = "SELECT $campos FROM $tabla WHERE $clave = '$valorClave' ";
    $qdatos = mysql_query($sql);
    if($qdatos){
      $registros = mysql_num_rows($qdatos);
      $campos = mysql_num_fields($qdatos);
      if($registros > 0){
        $datos = array();
        for($x = 0; $x < $registros; $x ++){
          $rDatos = mysql_fetch_array($qdatos);
          $datos[$x] = array();
          for($y = 0; $y < $campos; $y ++){
            $datos[$x][mysql_field_name($qdatos, $y)] = $rDatos[mysql_field_name($qdatos, $y)];
          }
        }
        return $datos;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }

  function captuarDesdeBd3($tabla, $campos, $clave){
    $sql = "SELECT $campos FROM $tabla $clave";
    /*
	$f	= fopen("c:\\zzz.txt", "w+");
	fwrite($f, $sql);
	fclose($f);
	*/
    $qdatos = mysql_query($sql);
    if($qdatos){
      $registros = mysql_num_rows($qdatos);
      $campos = mysql_num_fields($qdatos);
      if($registros > 0){
        $datos = array();
        for($x = 0; $x < $registros; $x ++){
          $rDatos = mysql_fetch_array($qdatos);
          $datos[$x] = array();
          for($y = 0; $y < $campos; $y ++){
            $datos[$x][mysql_field_name($qdatos, $y)] = $rDatos[mysql_field_name($qdatos, $y)];
          }
        }
        return $datos;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }

  function captuarDesdeBd5_x_pagina_total($tabla, $campos, $clave, $valorClave){
    $sql = "SELECT $campos FROM $tabla WHERE $clave = '$valorClave'";
    $qdatos = mysql_query($sql);
    if($qdatos){
      $registros = mysql_num_rows($qdatos);
	  return $registros;
	}
  }
  
  function captuarDesdeBd5_x_pagina($tabla, $campos, $clave, $valorClave, $campo, $orden, $inicio, $limite){
    $sql = "SELECT $campos FROM $tabla WHERE $clave = '$valorClave' ORDER BY $campo $orden LIMIT $inicio, $limite";
    $qdatos = mysql_query($sql);
    if($qdatos){
      $registros = mysql_num_rows($qdatos);
      $campos = mysql_num_fields($qdatos);
      if($registros > 0){
        $datos = array();
        for($x = 0; $x < $registros; $x ++){
          $rDatos = mysql_fetch_array($qdatos);
          $datos[$x] = array();
          for($y = 0; $y < $campos; $y ++){
            $datos[$x][mysql_field_name($qdatos, $y)] = $rDatos[mysql_field_name($qdatos, $y)];
          }
        }
        return $datos;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }

  function crearPaginas($totalPaginas, $inicio, $limite){
	//echo "$totalPaginas, $inicio, $limite<hr>";
	$cadena		= "<div style='font-size: 10px;'>";
	if($totalPaginas > 1){
		for($x = 0; $x < $totalPaginas; $x ++){
			if($inicio == $x){
				$cadena .= "$x |";
			}else{
				$cadena .= "<a href='?inicio=$x&limite=$limite'><b>$x</b></a> |";
			}
		}
	}
	$cadena		.= "</div>";
	
	return $cadena;
  }
  
  function captuarDesdeBd5($tabla, $campos, $clave, $valorClave, $campo, $orden){
    $sql = "SELECT $campos FROM $tabla WHERE $clave = '$valorClave' ORDER BY $campo $orden";
    $qdatos = mysql_query($sql);
    if($qdatos){
      $registros = mysql_num_rows($qdatos);
      $campos = mysql_num_fields($qdatos);
      if($registros > 0){
        $datos = array();
        for($x = 0; $x < $registros; $x ++){
          $rDatos = mysql_fetch_array($qdatos);
          $datos[$x] = array();
          for($y = 0; $y < $campos; $y ++){
            $datos[$x][mysql_field_name($qdatos, $y)] = $rDatos[mysql_field_name($qdatos, $y)];
          }
        }
        return $datos;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }

    //1>>10.20.40.40.|2>>Facu
  function capturarCoincidencias($campos, $cadena){
    $totalCampos = explode("|", $campos);
    $rating = 0;
    foreach($campos as $x => $y){
      $partes = explode(">>", $y);
      if(strpos($partes[1], $cadena) != 0){
        $rating ++;
      }
    }

    return rating;
  }

  function capturarDatoCampo($codigo, $campos){
    foreach($campos as $x => $y){
      $partes = explode(">>", $y);
      if($partes[0] == $codigo){
        break;
      }
    }
    return $partes[1];
  }

  function capturarCampos($campos){
    $totalCampos = explode("|", $campos);
    $campos_array = array();
    foreach($totalCampos as $x => $y){
        if($y != ""){
            $partes = explode(">>", $y);
            $campos_array[$partes[0]] = $partes[1];
        }
    }
    return $campos_array;
  }

function buscarClave($_BUSCAR){
	$contador_temporal = 0;
	$resultados_temporal = array();
	$_SESSION['resultados_obtenidos'] = 0;
	//echo $_SESSION['tipousuario'];
  //if($_SESSION['tipousuario'] == 0){
  if(1){
    $sql	= "SELECT * FROM `documentos` WHERE `activo` = '1' and datosCampos LIKE '%$_BUSCAR%'";
    //echo "SELECT * FROM `documentos` WHERE `activo` = '1'";
  }else{
    $pos = strpos($_SESSION['tipousuario'], "*");
  	if($pos === false){
		$sql	= "SELECT * FROM `documentos` WHERE `ruta2` = '{$_SESSION['tipousuario']}.' AND `activo` = '1' and datosCampos LIKE '%$_BUSCAR%'";
    }else{
      $rutaClave = explode("*", $_SESSION['tipousuario']);
      $sql	= "SELECT * FROM `documentos` WHERE `ruta2` = '{$_SESSION['tipousuario']}.' AND `activo` = '1' and datosCampos LIKE '%$_BUSCAR%'";
    }
  }
	$qbusqueda = mysql_query($sql);
	//echo "--" . $qbusqueda;
	//echo "buscando:...{$_BUSCAR}";

	$qcampos = mysql_query("SELECT * FROM `campos`");
	if($qcampos){
		$totalCampos = mysql_num_rows($qcampos);
		$_SESSION['campos'] = array();
		for($x = 0; $x < $totalCampos; $x ++){
			$registro = mysql_fetch_array($qcampos);
			$_SESSION['campos'][$registro['id']] = $registro['campo'];
		}
		mysql_free_result($qcampos);
	}

	$total_campos = 0;

	if($qbusqueda){
		$total = mysql_num_rows($qbusqueda);
		//echo $total . " ------";
		if($total > 0){
			$_SESSION['resultados'] = array();
			$totalCampos = mysql_num_fields($qbusqueda);
			for($x = 0; $x < $total; $x ++){
				$registro = mysql_fetch_array($qbusqueda);
				$_SESSION['resultados'][$registro['id']] = array();
				$rating = 0;
				//echo "<hr>";
		        for($y = 0; $y < $totalCampos; $y ++){
		          //echo mysql_field_name($qbusqueda, $y) . "<br>";
		          $_SESSION['resultados'][$registro['id']][mysql_field_name($qbusqueda, $y)] = $registro[mysql_field_name($qbusqueda, $y)];
		          $vector_temporal[0][mysql_field_name($qbusqueda, $y)] = $registro[mysql_field_name($qbusqueda, $y)];

		          if(strpos(strtolower($registro[mysql_field_name($qbusqueda, $y)]), strtolower($_BUSCAR)) != 0){
					//echo "<p><b>{$registro['id']}</b>esta es : {$registro[mysql_field_name($qbusqueda, $y)]} :: $_BUSCAR<p>";
		            $rating ++;
		          }
		          switch(mysql_field_name($qbusqueda, $y)){
		            case "descripcion":
		              $_DESCRIPCION = $registro['descripcion'];
		              break;
		            case "ruta":
		              $_RUTA = $registro['ruta'];
		              break;
		            case "datosCampos":
		              //ECHO "BUSCANDO en campos: ";
		      				$_SESSION['resultados'][$registro['id']]['campos'] = array();
		      				$datosCampos = explode("|", $registro['datosCampos']);
		      				$totalCampos = count($datosCampos);
		      				for($y = 0; $y < $totalCampos; $y ++){
                                                    $total_campos ++;
                                                    $dato = explode(">>", $datosCampos[$y]);
                                                    if(count($dato) > 1){
                                                        $_SESSION['resultados'][$registro['id']]['campos'][$dato[0]] = $dato[1];
                                    //echo "buscando: <i>$_BUSCAR</i> en [<b>{$dato[1]}</b>] :: ".strpos($dato[1], $_BUSCAR)."<br>";
                                                        if(strpos(strtolower($dato[1]), strtolower($_BUSCAR)) > 0){
                                                          //echo "encontrado: $_BUSCAR en {$dato[1]}<br>";
                                                          //echo "{$dato[0]} = {$dato[1]}...encontrado: { ".strpos($dato[1], $_BUSCAR)." }<br>";
                                                          $rating ++;
                                                        }else{
                                                          //echo "{$dato[0]} = {$dato[1]} : buscando[$_BUSCAR]<br>";
                                                        }
                                                    }
                                                    //echo $_SESSION['campos'][$dato[0]] . " = " . $_SESSION['resultados'][$x]['campos'][$_SESSION['campos'][$dato[0]]] . "<br>";
		      				}
		              break;
		            default:
		              $total_campos ++;
		              break;
		          }
				}

        //echo "<br>Rating: $rating<br>";

        if($rating > 0){
          //echo "alamacenando: {$registro['id']}";

          foreach($vector_temporal as $w => $q){
            foreach($vector_temporal[$w] as $w2 => $q2){
              //echo "$w2 = ".utf8_decode($q2)."<br>";
              $resultados_temporal[$registro['id']][$w2] = $q2;
            }
          }

          //$_SESSION['resultados'][$registro['id']]['rating'] = $rating;

          //$resultados_temporal[$registro['id']]['rating'] = $rating;

          $porcentaje = ($rating * 100) / $total_campos;
          $partesp = explode(".", $porcentaje);
          //$_SESSION['resultados'][$registro['id']]['porcentaje'] = $partesp[0] . "." . substr($partesp[1], 0, 1);

          $resultados_temporal[$registro['id']]['porcentaje'] = $partesp[0] . "." . substr($partesp[1], 0, 1);

          $resultados_temporal[$registro['id']]['cod_of'] = capturarDatoCampo(1, $datosCampos);
          $resultados_temporal[$registro['id']]['descripcion'] = $_DESCRIPCION;
          $resultados_temporal[$registro['id']]['ruta'] = $_RUTA;
          $resultados_temporal[$registro['id']]['rating'] = $rating;

          $resultados_temporal[$registro['id']]['fecha'] = $registro['fecha'];
          $resultados_temporal[$registro['id']]['serie'] = $registro['serie'];
          $resultados_temporal[$registro['id']]['subserie'] = $registro['subserie'];
          $resultados_temporal[$registro['id']]['id_trd'] = $registro['id_trd'];

          //echo $resultados_temporal[$registro['id']]['ruta'];

          @$_SESSION['resultados_obtenidos'] ++;

          //$resultados_temporal[$registro['id']] = $_SESSION['resultados'][$registro['id']];
          $contador_temporal ++;
        }
			}

			$_SESSION['resultados'] = array();
			$_SESSION['resultados'] = $resultados_temporal;


      //echo "-------> " . count($_SESSION['resultados']) . " --<br>";

      @mysql_free_result($qbusqueda);
		}
	}
	/*
      foreach($_SESSION['resultados'] as $x => $y){
        echo "$x = {$y['id']}<br>";
      }
      echo count($_SESSION['resultados'])."<hr>";
	*/
}

function ordenarResultados(){
  $mayor = 0;

  //echo "<hr>" . count($_SESSION['resultados']) . " resultados<hr>";

  $indices = 0;

  foreach($_SESSION['resultados'] as $x => $y){
    //echo "<b>$x</b> = {$y['rating']}<br>";
    $vectorIDs[$indices] = $x;
  }


  //echo "<hr>";
  $totalResultados = count($_SESSION['resultados']);
  //echo "resultadillos: $totalResultados";
  for($x = 0; $x < $totalResultados; $x ++) {
    for($y = 0; $y < $totalResultados - 1; $y ++){
      //echo "{$_SESSION['resultados'][$y]['ruta']} :: {$_SESSION['resultados'][$y]['rating']} > {$_SESSION['resultados'][$x]['rating']}<br>";
      if(@$_SESSION['resultados'][$vectorIDs[$y]]['rating'] < @$_SESSION['resultados'][$vectorIDs[$x]]['rating']){
        $aux = $_SESSION['resultados'][$vectorIDs[$x]];
        $_SESSION['resultados'][$vectorIDs[$x]] = $_SESSION['resultados'][$vectorIDs[$y]];
        $_SESSION['resultados'][$vectorIDs[$y]] = $aux;
      }
    }
  }

  //echo "<hr>";
  foreach($_SESSION['resultados'] as $x => $y){
    //echo "$x = {$y['rating']}<br>";
  }

}

function buscarIndice($id){
  $encontrado = 0;
  foreach($_SESSION['resultados'] as $x => $y){
  //echo "JUAS !<br>";
    if($y['id'] != ""){
      //echo "---------looking for '$id' in {$_SESSION['resultados'][$x]['id']}<br>";
      if($_SESSION['resultados'][$x]['id'] == $id){
        $_SESSION['resultados'][$x]['rating'] ++;
        //$encontrado = 1;
        break;
      }
    }
  }

  if($encontrado == 0){
    $_SESSION['resultados'][$x]['rating'] = 0;
  }/*else{
    return false;
  }*/
}



function cDatos($qdocumentos, $campo){
  $docs = mysql_num_rows($qdocumentos);
  $vectorDatos = array();
  for($x = 0; $x < $docs; $x ++){
    $registro = mysql_fetch_array($qdocumentos);
    //$vectorDatos[$indice] = array();
    if($vectorDatos[$registro[$campo]]['rating'] == ""){
      $vectorDatos[$registro[$campo]]['rating'] = 1;
      $vectorDatos[$registro[$campo]]['id_usuario'] = $registro['id_usuario'];
      $vectorDatos[$registro[$campo]]['id_doc'] = $registro['id_documento'];
	
      $nombreMov = captuarDesdeBd2("paginas", "*", "id", $registro['operacion']);
      $vectorDatos[$registro[$campo]]['pagina'] = $nombreMov[0]['nombre'];
    }else{
      $vectorDatos[$registro[$campo]]['rating'] ++;
    }
    //echo $registro['id_usuario'] . " : " . $vectorDatos[$registro['id_usuario']]['rating'] . "<br>";
  }

  $datos = count($vectorDatos);
  $vectorIndices = array();

  $indice = 0;
  foreach($vectorDatos as $x => $y){
    //echo "$x = {$vectorDatos[$x]['rating']}<br>";
    $vectorIndices[$indice] = $x;
    //echo "$x : $indice<br>";
    $indice ++;
  }

  for($x = 0; $x < $datos; $x ++){
    //echo "{$vectorIndices[$x]} : {$vectorDatos[$vectorIndices[$x]]['rating']}<br>";
    for($y = 0; $y < $datos - 1; $y ++){
      if($vectorDatos[$vectorIndices[$x]]['rating'] > $vectorDatos[$vectorIndices[$y]]['rating']){
        $aux = $vectorDatos[$vectorIndices[$x]]['rating'];
        $vectorDatos[$vectorIndices[$x]]['rating'] = $vectorDatos[$vectorIndices[$y]]['rating'];
        $vectorDatos[$vectorIndices[$y]]['rating'] = $aux;
      }
    }
  }

  return $vectorDatos;
}

function calcularCeros($valor){
  $ceros = "";
  for($x = 0; $x < strlen($valor); $x ++){
    $ceros .= "0";
  }
  return "1$ceros";
}

function clasificar($clasi){
  require("config.php");
  // WHERE id_usuario = '{$_SESSION['idusuario']}'
  $sql				= "SELECT * FROM `log_usuario`";
  $vectorOrdenado 	= cDatos(mysql_query($sql), $clasi);
  $tablaEstadistica	= "<table width='100%'>
          <tr class='celdaShop1'>
            <td colspan=2>
              Resultados
            </td>
          </tr>";
  foreach($vectorOrdenado as $x => $y){
    $maximux = calcularCeros($y['rating']) . "<br>";
    break;
  }

  foreach($vectorOrdenado as $x => $y){
    $datosUsuario = captuarDesdeBd2("usuarios", "*", "id", $vectorOrdenado[$x]['id_usuario']);
    $porcentaje = ($y['rating'] * 100) / $maximux;
    $texto = $datosUsuario[0]['nombre'];
    switch($clasi){
      case "operacion":
          $texto .= " : <br>" . $vectorOrdenado[$x]['pagina'];
          break;
    }
    if($texto != ""){
      $tablaEstadistica	.= "<tr class='celdaShop4'>
              <td width='30%'>
                <a class='linkDetalle' href='?id={$datosUsuario[0]['id']}'>$texto</a>";
		
		switch($clasi){
			case "id_documento":
				$tablaEstadistica	.= "</br><a class='link2' href=\"javascript:vermas('vermasestadistica.php?id=".$vectorOrdenado[$x]['id_doc']."')\">Ver documento</a>";
				break;
			default:
				break;
		}
		
      $tablaEstadistica	.= "        </td>
              <td width='70%'>
                <table width='$porcentaje%'>
                  <tr>
                    <td class='porcentaje'>
                     $porcentaje%
                    </td>
                  </tr>
                </table>
              </td>
            </tr>";
    }
  }
  $tablaEstadistica	.= "</table>";
  
  echo $tablaEstadistica;
}

function loMas($inicio, $id){
	if(file_exists("config.php")){
		require("config.php");
	}else{
		require("../config.php");
	}
  //$documentos = captuarDesdeBd("log_usuario", "*");

		$qdocumentos = mysql_query("SELECT * FROM `info` WHERE `nombre` = 'tam_pagina'");
		$registro = mysql_fetch_array($qdocumentos);
		$tam_pagina = $registro['valor'];
		$qtdocumentos = mysql_query("SELECT * FROM `log_usuario` WHERE `id_usuario` = '$id'");
		$qdocumentos = mysql_query("SELECT * FROM `log_usuario`  WHERE `id_usuario` = '$id' ORDER BY `fecha` ASC LIMIT $inicio, $tam_pagina");

    //echo "<p>SELECT * FROM `log_usuario` WHERE `id` = '$id'<p>";

		$tpaginas = mysql_num_rows($qtdocumentos);
		$tpaginas = ceil($tpaginas / $tam_pagina);
		if($tpaginas > 1){
		  echo "<div id='marco4'>";
  			for($x = 0; $x < $tpaginas; $x ++){
  				if($inicio == ($x * $tam_pagina)){
  					echo " [ <a href='#&id=$id' class='linkDetalle'>".($x + 1)." </a> ] ";
  				}else{
  					echo " <a href='?inicio=".($x * $tam_pagina)."&id=$id' class='linkDetalle'>".($x + 1)." </a>";
  				}
  			}
		  echo "</div>";
		}

    //clasificarDatos($qtdocumentos);

    if($qdocumentos){
      $totalDocumentos = mysql_num_rows($qdocumentos);
      if($totalDocumentos > 0){
        echo "<div id='marco3'>
              <table width='100%'>";
        echo "  <tr class='celdaShop1'>
                  <td >
                    Usuario
                  </td>
                  <td >
                    Movimiento
                  </td>
                  <td >
                    Fecha
                  </td>
                  <td >
                    Hora
                  </td>
                  <td >
                    Documento
                  </td>
                  <td >
                    Observacin
                  </td>
                </tr>";
        for($x = 0; $x < $totalDocumentos; $x ++){
          $registro = mysql_fetch_array($qdocumentos);
          if($x % 2 == 0){
            $celda = 2;
          }else{
            $celda = 3;
          }

          $nombreUsuario = captuarDesdeBd2("usuarios", "*", "id", $registro['id_usuario']);
          $movimientoUsuario = captuarDesdeBd2("paginas", "*", "id", $registro['operacion']);
          $documentoVisitado = captuarDesdeBd2("documentos", "*", "id", $registro['id_documento']);

          $partesDocumento = explode("::", $documentoVisitado[0]['ruta']);
          $documentoVisitado = $partesDocumento[count($partesDocumento) - 2];

          echo "  <tr class='celdaShop$celda'>
                    <td >
                      ".$nombreUsuario[0]['nombre']."
                    </td>
                    <td class='detalleImagen'>
                      ".$movimientoUsuario[0]['nombre']."
                    </td>
                    <td >
                      {$registro['fecha']}
                    </td>
                    <td >
                      {$registro['hora']}
                    </td>
                    <td >";
          if(utf8_decode(substr($documentoVisitado, 0, 20)) != ""){
            echo "<a class='linkDetalle3' href=\"javascript:abrirtema('vermasestadistica.php?id={$registro['id_documento']}')\">".utf8_decode(substr($documentoVisitado, 0, 20))."...</a>";
          }
          echo "          </td>
                    <td >
                      ".utf8_decode($registro['observacion'])."
                    </td>
                  </tr>";
        }
        echo "</table>
              </div>";
      }
    }

		if($tpaginas > 1){
  		echo "<div id='marco4'>";
  			for($x = 0; $x < $tpaginas; $x ++){
  				if($inicio == ($x * $tam_pagina)){
  					echo " [ <a href='#' class='linkDetalle'>".($x + 1)." </a> ] ";
  				}else{
  					echo " <a href='?inicio=".($x * $tam_pagina)."&id=$id' class='linkDetalle'>".($x + 1)." </a>";
  				}
  			}
  		echo "</div>";
		}

}

function capturarTablaDeRetencion($id){
  //$trd = captuarDesdeBd2("subserie_trd", "*", "id", $id);
  ///////////////////////////
    $qseries = mysql_query("SELECT * FROM `subserie_trd` WHERE `id` = '$id'");
    $registro = mysql_fetch_array($qseries);
    $nombreSerie = captuarDesdeBd2("series", "*", "id", $registro['cod_serie']);
    $nombreSubSerie = captuarDesdeBd2("subseries", "*", "id", $registro['cod_subserie']);
    $nombreProc = captuarDesdeBd2("proc_subserie", "*", "id", $registro['cod_proc']);

    $qsoportes = mysql_query("SELECT * FROM sopor_subserie WHERE cod_subserie = '{$registro['cod_subserie']}' AND cod_serie = '{$registro['cod_serie']}' AND cod_of = '{$registro['cod_of']}'");
    //echo "SELECT * FROM `subserie_trd` WHERE `id` = '$id'";
    //echo "<br>SELECT * FROM sopor_subserie WHERE cod_subserie = '{$registro['cod_subserie']}' AND cod_serie = '{$registro['cod_serie']}' AND cod_of = '{$registro['cod_of']}'";

    if($qsoportes){
      $totalSoportes = mysql_num_rows($qsoportes);
      $soportes = "";
      for($s = 0; $s < $totalSoportes; $s ++){
        $rsoporte = mysql_fetch_array($qsoportes);
        $nombreSoporte = captuarDesdeBd2("soportes", "*", "codigo", $rsoporte['cod_soporte']);
        $soportes .= "<li>" . $nombreSoporte[0]['nombre'];
      }
    }

    $laS = "#ffffff";
    $laM = "#ffffff";
    $laC = "#ffffff";
    $laE = "#ffffff";
    $laD = "#ffffff";

    $disposiciones = explode(",", $registro['disp_final']);
    foreach($disposiciones as $q => $w){
      if(strpos($w, "Microfilmar") === false){
        //$laM = "#666666";
      }else{
        $laM = "#666666";
      }
      if(strpos($w, "Seleccion") === false){
        //$laS = "#666666";
      }else{
        $laS = "#666666";
      }
      if(strpos($w, "Conservacion") === false){
        //$laC = "#666666";
      }else{
        $laC = "#666666";
      }
      if(strpos($w, "Conservar") === false){
        //$laC = "#666666";
      }else{
        $laC = "#666666";
      }
      if(strpos($w, "Eliminar") === false){
        //$laE = "#666666";
      }else{
        $laE = "#666666";
      }
      if(strpos($w, "Digitalizar") === false){
        //$laE = "#666666";
      }else{
        $laD = "#666666";
      }
    }

    $laO = "#FFFFFF";
    $laCopia = "#FFFFFF";

    $traducion = explode(",", $registro['trad_doc']);
    foreach($traducion as $q => $w){
      if(strpos($w, "Original") === false){
        //$laM = "#666666";
      }else{
        $laO = "#666666";
      }
      if(strpos($w, "Copia") === false){
        //$laS = "#666666";
      }else{
        $laCopia = "#666666";
      }
    }

    $tablaRetencion = "
      <table width='500' align=center>
        <tr>
          <td  align=center class='tinycelda' valign=top width='20%'>
            <b><center>C&oacute;digo</center></b>
            <br>
            <b>{$registro['cod_serie']}</b><br>
            {$registro['cod_of']}.-<b>{$registro['cod_serie']}{$registro['cod_subserie']}</b>
          </td>
          <td class='tinycelda2' valign=top>
            <b><center>Series</center></b>
            <br>
            <b>".strtoupper($nombreSerie[0]['nombre'])."</b><br>
            <b>{$registro['nom_subserie']}</b>
            $soportes
          </td>
          </tr>
          <tr>
          <td class='tinycelda' valign=top colspan=2 align=center>
            <table align=center >
              <tr>
                <td class='tinycelda2'>
                  <b><center>Retenci&oacute;n</center></b>
                  <br>
                  <table width=100>
                    <tr>
                      <td class='tinycelda'>
                        <b><center>Archivo gesti&oacute;n</center></b>
                        <br>
                        {$registro['tiempo_ret_ag']} a&ntilde;os
                      </td>
                      <td class='tinycelda'>
                        <b><center>Archivo central</center></b>
                        <br>
                        {$registro['tiempo_ret_ac']} a&ntilde;os
                      </td>
                    </tr>
                  </table>
                </td>
                <td class='tinycelda2' valign=top>
                  <b><center>Disposici&oacute;n final</center></b>
                  <br>

                  <table width=40>
                    <tr>
                      <td class='tinycelda' bgcolor='$laC'>
                        C
                      </td>
                      <td class='tinycelda' bgcolor='$laM'>
                        M
                      </td>
                      <td class='tinycelda' bgcolor='$laS'>
                        S
                      </td>
                      <td class='tinycelda' bgcolor='$laE'>
                        E
                      </td>
                      <td class='tinycelda' bgcolor='$laD'>
                        D
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
          </tr>
          <tr>
          <td class='tinycelda2' width='100%' valign=top align=center colspan=2>
                  <b><center>Procedimiento</center></b>
                  <br>
            <textarea name='descripcion' cols=50 rows=5 onfocus=\"this.blur()\" >{$nombreProc[0]['descripcion']}</textarea>
            <input type='hidden' name='cod_proc' value='{$registro['cod_proc']}'>
          </td>
        <td class='tinycelda'>
          <input type='hidden' name='id' value='{$registro['id']}'>
        </td>
        </tr>
      </table>

    ";

  return $tablaRetencion;
  ///////////////////////////
}

function calcular_anos($fecha){
  $partes = explode("-", $fecha);

  $ano = Date("Y");
  $mes = Date("m");
  $dia = Date("d");

  $anos = $ano - $partes[0] - 1;

  if(($partes[1] - $mes) < 0){
    $anos ++;
  }else{
    if($partes[1] == $mes){
      if(($partes[2] - $dia) < 0){
        $anos ++;
      }
    }
  }

  return $anos;
}

function convertirTildes($cadena){
  $cadena = str_replace("�", "&aacute;", $cadena);
  $cadena = str_replace("�", "&eacute;", $cadena);
  $cadena = str_replace("�", "&iacute;", $cadena);
  $cadena = str_replace("�", "&oacute;", $cadena);
  $cadena = str_replace("�", "&uacute;", $cadena);
  return $cadena;
}

function insertarABD($tabla, $campos, $valores){
  $insertar = "INSERT INTO $tabla ($campos) VALUES($valores)<br>";
  mysql_query($insertar);
}

function ultimoRegistro($tabla){
  $consulta = captuarDesdeBd4($tabla, "*", "id", "ASC");
  if($consulta != false){
    foreach($consulta as $x => $y){

    }
    return $y['id'];
  }else{
    return false;
  }
}


function sonLetras($id){
	 $letrasEncontradas=0;
	 //echo  "id recibido --> ".$id."<br>";
     $idArray = str_split($id);
	 $digitosArray = count($idArray);
	 //echo  "cuantos elementos array --> ".$digitosArray."<br>";
	 for($a=0;$a<=$digitosArray-1;$a++){
		 //echo  $a."--> ".$idArray[$a]."<br>";
		 $digito = $idArray[$a];
		 switch($digito){
			case '1':
			break;
			case '2':
			break;
			case '3':
			break;
			case '4':
			break;
			case '5':
			break;
			case '6':
			break;
			case '7':
			break;
			case '8':
			break;
			case '9':
			break;
			case '0':
			break;
		  default :
		    $letrasEncontradas++;
			break;
		}//switch
	 }//for
    //echo  "letras encontradas --> ".$letrasEncontradas."<br>";
    return $letrasEncontradas;
	
  }//funcion sonLetras
?>
