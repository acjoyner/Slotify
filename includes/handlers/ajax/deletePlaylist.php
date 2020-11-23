<?php
include("../../config.php");

if(isset($_POST['playlistId'])){
    $playlistId = $_POST['playlistId'];

    mysqli_query($con, "DELETE FROM playlists WHERE id='$playlistId'");
    mysqli_query($con, "DELETE FROM playlistsSongs WHERE playlistId='$playlistId'");

}
else{
    echo "Playlist was not passed into deletePlaylist.php ";
}
?>