<?php

function get_users($conn){
	$sql = sprintf("SELECT * FROM users ORDER BY id DESC");
	$result = mysqli_query($conn,$sql);

	if( $result ){
		if( mysqli_num_rows($result) > 0 ){
			$user_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
			return $user_data;
		}else{
			return 0;
		}
	}
}

function get_user($conn,$user_id){
	$sql = sprintf("SELECT * FROM users where id = %d LIMIT 1", $user_id);
	$result = mysqli_query($conn,$sql);

	if( $result ){
		if( mysqli_num_rows($result) > 0 ){
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}else{
			return 0;
		}
	}else{
		return 0;
	}
}

function add_user($conn,$data){
	$sql = sprintf("INSERT INTO users(username,password,email,role) VALUES('%s','%s','%s','%s')", $data['name'],$data['password'],$data['email'],$data['role']);
	$result = mysqli_query($conn,$sql);

	if( $result ){
		return true;
	}else{
		return false;
	}
}

function delete_user($conn,$user_id){
	$sql = sprintf("DELETE FROM users where id = %d", $user_id);
	$result = mysqli_query($conn,$sql);

	if( $result ){
		return true;
	}else{
		return false;
	}
}

function update_user($conn,$data){
	$sql = sprintf("UPDATE users SET username='%s', password='%s', email='%s', role='%s' WHERE id=%d", $data['username'],$data['password'],$data['email'],$data['role'], $data['id']);
	$result = mysqli_query($conn,$sql);

	if( $result ){
		return true;
	}else{
		return false;
	}
}

?>