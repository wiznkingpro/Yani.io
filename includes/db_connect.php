<?php
	$db = mysqli_connect("localhost", "root", "root", "bless");
	$user_id = $_GET['id'];
	$query = mysqli_query($db, "SELECT * FROM `users` WHERE `user_id`='{$user_id}'");
	$array = mysqli_fetch_array($query); 
	session_start();