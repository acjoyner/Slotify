<?php include("includes/includedFiles.php");
// Check to see if the id is set
if(isset($_GET['id'])){
    $playlistId =  $_GET['id'];
}
// If the id is not set, send the user to the home page
else {
    header("Location: index.php");
}

// Create new Playlist Object
$playlist = new Playlist($con, $playlistId);
// Create new owner object
$owner = new User($con, $playlist->getOwner());
?>
<div class="entityInfo">
    <div class="leftSection">
        <div class="playlistImage">
            <img src="assets/images/icons/playlist.png" alt="Album Artwork">
        </div>
    </div>
    <div class="rightSection">
        <h2><?php echo $playlist->getName(); ?></h2>
        <p> By <?php echo $playlist->getOwner();?></p>
        <p><?php echo $playlist->getNumberOfSongs();?> songs</p>
        <button class="button" onclick="deletePlaylist('<?php echo $playlistId;?>')">DELETE PLAYLIST</button>
    </div>
</div>

<div class="trackListContainer">
    <ul class="trackList">
        <?php
        $songIdArray = $playlist->getSongIds();

        $i = 1;
        // loop through songs
        foreach($songIdArray as $songId){
            $playlistSong = new Song($con, $songId);
            $songArtist = $playlistSong->getArtist();
            echo "<li class='trackListRow'>
                    <div class='trackCount'>
                        <img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(
                            \"" . $playlistSong->getId() ."\" ,tempPlaylist, true)'>
                        <span class='trackNumber'>$i</span>    
                    </div>

                    <div class='trackInfo'>
                        <span class='trackName'>" . $playlistSong->getTitle(). "</span>
                        <span class='artistName'>" . $songArtist->getName(). "</span>
                    </div>
                    
                    
                    
                    <div class='trackOptions'>
                        <input type='hidden' class='songId' value='" .$playlistSong->getId(). "'>
                        <img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
                    </div>

                    <div class='trackDuration'>
                        <span class='duration'>" . $playlistSong->getDuration(). "</span>
                    </div>

                </li>";
            $i++;
           
        }
        ?>

    <script>
        var tempSongIds = '<?php echo json_encode($songIdArray);?>';
        tempPlaylist = JSON.parse(tempSongIds);
    </script>
    </ul>
</div>
<nav class="optionsMenu">
    <input type="hidden" class="songId">
        <?php echo Playlist::getPlaylistDropdown($con,$userLoggedIn->getUsername()); ?>
        <div class="item" onclick="removeFromPlaylist(this,'<?php echo $playlistId; ?>')">Remove from Playlist</div>
</nav>