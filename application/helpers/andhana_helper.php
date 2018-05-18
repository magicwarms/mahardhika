<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

function encode($string){
    $CI =& get_instance();
    $id = $CI->encryption->encrypt($string);
    $id = str_replace(['+','/'], ['==11==','==12=='], $id);
    return $id;
}

function decode($string){
    $CI =& get_instance();
    $id = str_replace(['==11==','==12=='], ['+','/'], $string);
    $id = $CI->encryption->decrypt($id);
    return $id;
}

function txt($string){
	return addslashes($string);
}

function dF($date, $format){
	return date($format, strtotime($date));
}

function selectall_menu_active($parent=NULL, $child=NULL, $session=NULL){
    $CI =& get_instance();
    $CI->db->select('menus_admin.idMENU, parentMENU, namaMENU, functionMENU, iconMENU');
    $CI->db->select('menus_admin_join_users_admin.idMENUSJOINADMIN');
    $CI->db->from('menus_admin');
    $CI->db->join('menus_admin_join_users_admin', 'menus_admin_join_users_admin.idMENU = menus_admin.idMENU');

    if($parent != NULL){
        $CI->db->where('menus_admin.parentMENU', 0);
    }
    if($child != NULL){
        $CI->db->where('menus_admin.parentMENU !=', 0);
    }
    if($session != NULL){
        $CI->db->where('menus_admin_join_users_admin.idADMIN', $CI->session->userdata('idADMIN'));
    }
    $CI->db->where('menus_admin.statusMENU', 1);

    $data = $CI->db->get()->result();
    return $data;
}

function selectall_user_active(){
    $CI =& get_instance();
    $CI->db->select('*');
    $CI->db->from('users_admin');
    $CI->db->where('statusADMIN', 1);

    $data = $CI->db->get()->result();
    return $data;
}

function folenc($id){
    $folenc = base64_encode($id);
    return strtolower($folenc);
}


function timeAgo($timestamp){

    $time = time() - $timestamp;

    if ($time < 60)
        return ( $time > 1 ) ? $time . ' detik yang lalu' : 'satu detik';

    elseif ($time < 3600) {
        $tmp = floor($time / 60);
        return ($tmp > 1) ? $tmp . ' menit yang lalu' : ' satu menit yang lalu';
    }

    elseif ($time < 86400) {
        $tmp = floor($time / 3600);
        return ($tmp > 1) ? $tmp . ' jam yang lalu' : ' satu jam yang lalu';
    }

    elseif ($time < 2592000) {
        $tmp = floor($time / 86400);
        return ($tmp > 1) ? $tmp . ' hari lalu' : ' satu hari lalu';
    }

    elseif ($time < 946080000) {
        $tmp = floor($time / 2592000);
        return ($tmp > 1) ? $tmp . ' bulan lalu' : ' satu bulan lalu';
    }

    else {
        $tmp = floor($time / 946080000);
        return ($tmp > 1) ? $tmp . ' years' : ' a year';
    }
}

function replacesymbol($string){
    return str_replace([' ','&',',','.','(',')','!','?'], ['','','','','','','',''], $string);
}

function replacesymbol_tounderscore($string){
    return str_replace([' ','&',',','.','(',')','!','?'], ['_','_','_','_','_','_','_','_'], $string);
}

function seo_url($string){
    $change = str_replace([' ','&',',','.','(',')','!','?',''], ['-','-','-','-','-','-','-','-','-'], $string);
    return strtolower($change);
}

function cutting($string=NULL){
    $replace = str_replace('-',' ', $string);
    $cut = substr($replace, 0, 4);
    return $cut;
}
function cetak($str){
    echo htmlentities($str, ENT_QUOTES, 'UTF-8');
}

function indonesian_date ($timestamp = '', $date_format = 'l, j F Y | H:i', $suffix = 'WIB') {
    if (trim ($timestamp) == '')
    {
        $timestamp = time ();
    }
    elseif (!ctype_digit ($timestamp))
    {
        $timestamp = strtotime ($timestamp);
    }
    # remove S (st,nd,rd,th) there are no such things in indonesia :p
    $date_format = preg_replace ("/S/", "", $date_format);
    $pattern = array (
        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
        '/April/','/June/','/July/','/August/','/September/','/October/',
        '/November/','/December/',
    );
    $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
        'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
        'Oktober','November','Desember',
    );
    $date = date ($date_format, $timestamp);
    $date = preg_replace ($pattern, $replace, $date);
    $date = "{$date} {$suffix}";
    return $date;
}


function selectall_menu_name_row($id){
    $CI =& get_instance();
    $CI->db->select('namaMENU');
    $CI->db->from('menus_admin');
    $CI->db->where('idMENU', $id);
    $data = $CI->db->get()->row();
    return $data;
}

function select_all_multiple_menu(){
    $CI =& get_instance();
    $CI->db->select('namaMENU, idMENU');
    $CI->db->from('menus_admin');

    $data = $CI->db->get()->result();
    return $data;
}

function select_all_multiple_menu_for_row($id){
    $CI =& get_instance();
    $CI->db->select('menus_admin.namaMENU, menus_admin.idMENU');
    $CI->db->select('menus_admin_join_users_admin.idMENUSJOINADMIN');
    $CI->db->from('menus_admin');
    $CI->db->join('menus_admin_join_users_admin', 'menus_admin_join_users_admin.idMENU = menus_admin.idMENU');
    $CI->db->where('menus_admin_join_users_admin.idADMIN', $id);

    $data = $CI->db->get()->result();
    return $data;
}

function find_row__menu($func){
    $CI =& get_instance();
    $CI->db->select('idMENU');
    $CI->db->from('menus_admin');
    $CI->db->where('functionMENU', $func);
    $data = $CI->db->get()->row();
    return $data;
}

function find_menu_for_admin_user($admin, $menu){
    $CI =& get_instance();
    $CI->db->select('idADMIN, idMENU');
    $CI->db->from('menus_admin_join_users_admin');
    $CI->db->where('idADMIN',$admin);
    $CI->db->where('idMENU',$menu);

    $data = $CI->db->get()->row();
    return $data;
}

function browseragent(){
    $CI =& get_instance();
    if ($CI->agent->is_browser()){
        $agent = $CI->agent->browser();
    }elseif ($CI->agent->is_mobile()){
        $agent = $CI->agent->mobile();
    }else{
        $agent = 'Unindentified device';
    }
    return $agent;
}

function slugify($text){
        // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
    $text = trim($text, '-');
        // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);
        // lowercase
    $text = strtolower($text);
    if (empty($text)) {
        return 'n-a';
    }
    
    return $text;
}