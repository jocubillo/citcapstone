<?php 

function get_sections($conn){
	$sql = "SELECT * FROM sections";
	$result = mysqli_query($conn,$sql);

	if( $result ){
		if( mysqli_num_rows($result) > 0 ){
			$section_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
			return $section_data;
		}else{
			return 0;
		}
	}
}

function add_section($conn,$data){
	
}

?>