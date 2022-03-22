<?php
session_start();
include "./Posts/PostCrude.php";

$post = new PostCrude();

echo $post->getVoteStat($_POST['id']);