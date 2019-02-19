<?php 

function get_sections($conn){
	$sql = "SELECT * FROM sections ORDER BY id DESC";
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

function get_section($conn,$section_id){
	$sql = sprintf("SELECT * FROM sections where id = %d LIMIT 1", $section_id);
	$result = mysqli_query($conn,$sql);

	if( $result ){
		if( mysqli_num_rows($result) > 0 ){
			$section_data = mysqli_fetch_assoc($result);
			return $section_data;
		}else{
			return 0;
		}
	}else{
		return 0;
	}
}

function add_section($conn,$data){
	$sql = sprintf("INSERT INTO sections(name,year,adviser,room_number) VALUES('%s','%s','%s','%s')", $data['name'],$data['year'],$data['adviser'],$data['room']);
	$result = mysqli_query($conn,$sql);

	if( $result ){
		return true;
	}else{
		return false;
	}
}

function delete_section($conn,$section_id){
	$sql = sprintf("DELETE FROM sections where id = %d", $section_id);
	$result = mysqli_query($conn,$sql);

	if( $result ){
		return true;
	}else{
		return false;
	}
}

function update_section($conn,$data){
	$sql = sprintf("UPDATE sections SET name='%s', year='%s', adviser='%s', room_number='%s' WHERE id=%d", $data['name'],$data['year'],$data['adviser'],$data['room'], $data['id']);
	$result = mysqli_query($conn,$sql);

	if( $result ){
		return true;
	}else{
		return false;
	}
}

?>