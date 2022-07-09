 <?php 

 use App\Models\MenuItem as MenuItem;
 use App\Models\PressRelease as PressRelease;
 use App\Models\Video as Video;
 use App\Models\Media as Media;
 use App\Models\Page as Page;
 use App\Models\Gallery as Gallery;
 use App\Models\AdministrationCategory as AdministrationCategory;
 use App\Models\Administration as Administration;
 use Carbon\Carbon; 
 use Illuminate\Support\Facades\File as File;

function icon_type($file){
	
	$icons  = array(
		'application/pdf' =>'icon-file-pdf',
		'application/msword' =>'icon-file-word',
		'application/vnd.openxmlformats-officedocument.wordprocessingml.document' =>'icon-file-word',
		'application/mspowerpoint' =>'icon-file-powerpoint',
		'application/vnd.ms-powerpoint' =>'icon-file-powerpoint',
		'application/vnd.openxmlformats-officedocument.presentationml.presentation' =>'icon-file-powerpoint',
		'application/vnd.ms-excel' =>'icon-file-excel',
		'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' =>'icon-file-excel',
		'image/png' =>'icon-file-image',
		'image/jpeg' =>'icon-file-image',
		'image/pjpeg' =>'icon-file-image',
		'image/jpeg' =>'icon-file-image',
		'image/jpg' =>'icon-file-image',
		'application/zip' =>'icon-file-archive'
	 );
	if(isset($icons[$file])){
		return $icons[$file];
	}
	else {
		return "";
	}
}

function status($id){
	switch($id){
		case "0":
		return "Inactive";
		break;
		case "1":
		return "Active";
		break;
	}

}

function Gender($id){
	switch($id){
		case "1":
		return "Male";
		break;
		case "2":
		return "Female";
		break;
	}
}

function getPosition($id){
	switch($id){
		case "1":
		return "CHIEF EXECUTIVE OFFICER (CEO)";
		break;
		case "2":
		return "DIRECTOR";
		break;
		case "3":
		return "HEADS OF UNIT";
		break;
		case "4":
		return "MANAGER";
		break; 
	}
} 

function projectStatus($id){
	switch($id){
		case "1":
		break;
		case "2":
		break;
		case "3":
		break;
		case "4":
		break;
		case "5":
		break;
		case "6":
		break;
	}
} 

function displayOtherPositions($id,$limit){
	return App\Models\Administration::where('position','=',$id)->limit($limit)->get();
}

function mailConfig(){
	$settings = file_get_contents(app_path().'/../resources/views/contactus/'.'contactus.json');
    return json_decode($settings);

}

function utube_hash($url){
	$temp=$url;
		$url = explode('=', $url);
		if(isset($url[1])){
		  if(strpos($url[1], '&')){
		  	$url = explode('&', $url[1]);
		  	return $url[0];
		  }
		  else {
			return $url[1];
			}
		}
		else {
			$url = $temp;
			$url = explode ('/',$url);
			if(isset($url[count($url)-1])){
				return $url[count($url)-1];
			}
			else {
				return "";
			}
		}
}
function election($id){
	 $election_title = [1 => 'Presidential', 2 => "Constituency", 3 => 'Councillors',4=>'By Election'];
	 if(isset($election_title[$id]))
	 	return $election_title[$id];
	 else 
	 	return '';
}

function mapArrayPosition($array,$action=null){
	$x=array();
	if(is_null($action)){
		foreach($array as $out){
			$x[$out['position']]=$out['id'];
		}
	}
	else {
		$i=1;
		foreach($array as $out){
			$x[$i++]=$out['id'];
		}	
	}
	return $x;
}

function isadmin(){

	if(!is_null(Auth::user())){
		if((Auth::user()->is_admin))
			return true;
		else 
			return false;
		
	 }
	 else {
	 	return false; 
	 }

}

function recursiveMenu($parent=0,$menu_id,$menu_name='main_nav'){

	static $flag = true;

	if($flag){
		$menu_items = MenuItem::where('menu_id', '=', $menu_id)->where('parent', '=', $parent)->orderBy('position', 'ASC')->get();
		$flag = false;
	}
	else{
		$menu_items = MenuItem::where('menu_id', '=', $menu_id)->where('parent','=',$parent)->orderBy('position','ASC')->get();
	}

	foreach ($menu_items as $key => $child) {
		echo '<li class="dd-item" data-id="'.$child->id.'"><div class="dd-handle">'.$child->title_en.'</div>';
		echo '<span class="dropd"><i class="ion ion-chevron-down"></i></span>
               <div class="render-forms"></div>';
               
		openOrderedList($child);

		recursiveMenu($child->id,$child->menu_id);

		closeOrderedList($child);
		echo '</li>';
	}
	return;
}

function recursiveMenuOther($parent=0,$menu_name='our_parliament'){

	static $flag = true;

	if($flag){
		$menu_items = MenuItem::where('menu_name', '=', $menu_name)->where('parent', '=', $parent)->orderBy('position', 'ASC')->get();
		$flag = false;
	}
	else{
		$menu_items = MenuItem::where('parent','=',$parent)->orderBy('position','ASC')->get();
	}

	foreach ($menu_items as $key => $child) {
		echo '<li class="dd-item" data-id="'.$child->id.'"><div class="dd-handle">'.$child->title_en.'</div>';

		echo '<span class="dropd"><i class="ion ion-chevron-down"></i></span>
               <div class="render-forms"></div>';
               
		openOrderedList($child);

		recursiveMenu($child->id);

		closeOrderedList($child);
		echo '</li>';
	}
	return;
}

function recursiveMenuOtherdocx($parent=0,$menu_name='documents_category'){

	static $flag = true;

	if($flag){
		$menu_items = MenuItem::where('menu_name', '=', $menu_name)->where('parent', '=', $parent)->orderBy('position', 'ASC')->get();
		$flag = false;
	}
	else{
		$menu_items = MenuItem::where('parent','=',$parent)->orderBy('position','ASC')->get();
	}

	foreach ($menu_items as $key => $child) {
		echo '<li class="dd-item" data-id="'.$child->id.'"><div class="dd-handle">'.$child->title_en.'</div>';

		echo '<span class="dropd"><i class="ion ion-chevron-down"></i></span>
               <div class="render-forms"></div>';
               
		openOrderedList($child);

		recursiveMenu($child->id);

		closeOrderedList($child);
		echo '</li>';
	}
	return;
}


function openOrderedList($child){
	if($child->hasChildren()){
			echo '<ol class="dd-list">';
	}
}

function closeOrderedList($child){
	if($child->hasChildren()){
			echo '</ol>';
	}
}


function getFileSize($size){
		
	$size = $size/1024;
		if(round($size) >= 1024){
			return round($size/(1024))." Mb";
		} else {
			return round($size)." Kb";
		}

}

function deleteUnusedFields($unwanted,&$values){
	foreach ($unwanted as $value) {
		if(isset($values[$value])){
			unset($values[$value]);
		}
		
	}
	return;
}
/*Generate Random number*/
	function generateNumber($length) {

		$characters       =  '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength =  strlen($characters);
		$randomString     =  '';

		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}


function press_releases(){
	return PressRelease::orderBy('id','DESC')->limit(2)->get();
}

function press_releases_all(){
	return PressRelease::orderBy('id','DESC')->get();
}

function videos($key){
	if($key == 'first'){
		return Video::orderBy('id', 'desc')->first();
	}elseif($key == 'all'){
		return $videos = Video::orderBy('id', 'desc')->get();
	}
}

function eduPage(){
	return (Page::where('category_id', 1)->orderBy('id','DESC')->first() != null)? Page::where('category_id', 1)->orderBy('id','DESC')->first() : new Page;
}

function eduPhoto(){
	$gallery = Gallery::where('title_en', '=', 'education')->where('active','=',1)->first();
	if($gallery != null){
		return ($gallery->medias()->where('active','=',1)->orderBy('created_at', 'desc')->first() != null)? $gallery->medias()->where('active','=',1)->orderBy('created_at', 'desc')->first() : new Media;
	}
	else{
		$gallery = array();
	}

	return $gallery;
}


// function documentsCategories(){
// 	$data = array();

// 	$jsonurl = 'http://localhost:9000/api/documents';
// 	$json = file_get_contents($jsonurl, 0, null, null);
// 	$data = json_decode($json);

// 	return $data;
// }

function documentsCategories(){
	return MenuItem::where('menu_name', '=', "documents_category")->where('parent', '=', 0)->limit(5)->get();
}

 

function getAdminsCategoryTitle($id){
	return (AdministrationCategory::where("id",$id)->first() != null)? AdministrationCategory::where("id",$id)->first() : new AdministrationCategory;
}

function getAdminsFirstCategoryTitle(){
	return (AdministrationCategory::orderBy('id', 'ASC')->first() != null)? AdministrationCategory::orderBy('id', 'ASC')->first() : new AdministrationCategory;
}


function getDocumentSize($filename){
	$bytes = File::size($filename);
	return getFileSize($bytes);
}

function getAdministratorDetails($id){
	return (Administration::where("id", $id)->first() != null)? Administration::where("id", $id)->first() : new Administration;
}

function formatMyDate($date){
	
}

function searchResultSummary($data){

	$fields = Illuminate\Support\Collection::make(Config::get('es')['translatable_fields']);
	$summary = '';
	foreach ($data as $key=>$value) {

		if($fields->contains($key)){
			$title = substr($key, 0,strrpos($key,'_'));

			if(!strcmp(substr($key,-3), curlang())){
				 $summary.= implode('...',$data[label($title)]);
			}
		}
		else {
			$summary.= implode('...',$value);
		}
	}
	return $summary;
	
}

function searchUrl($value){
// 
	return (isset($value['url'.curlang()]))?ltrim($value['url'.curlang()], '/'):"#";

}

function title($info){
	$fields = Illuminate\Support\Collection::make(Config::get('es')['translatable_fields']);
	$title = Config::get('es')['title'];

	$m = array_only($info,$title);
	if(is_array($m)){
		$key = key($m);
		$title = substr($key, 0,strrpos($key,'_'));
	return $info[$title.curlang()];
	}
	return '';
	}

function err_note($msg){


		Session::put('noty','<div class="notification-panel">
		<a href="#" class="close-noty"><i class="ion ion-close-round "></i></a>
		<div class="notification-icon">
			<i class="ion ion-alert-circled no"></i>
		</div>
			<div class="notification-text">
				 '.$msg.'
			</div>
		</div>');
		return ;

}

function info_note($msg){

		Session::put('noty','<div class="notification-panel">
		<a href="#" class="close-noty"><i class="ion ion-close-round"></i></a>
		<div class="notification-icon">
			<i class="ion ion ion-ios-information-outline"></i>
		</div>
			<div class="notification-text">
				 '.$msg.'
			</div>
		</div>');

}

function success_note($msg){

		Session::put('noty','<div class="notification-panel">
		<a href="#" class="close-noty"><i class="ion ion-close-round "></i></a>
		<div class="notification-icon">
			<i class="ion ion-checkmark-circled yes"></i>
		</div>
			<div class="notification-text">
				 '.$msg.'
			</div>
		</div>');

}
