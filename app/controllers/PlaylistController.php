<?php


class PlaylistController extends Controller
{
    // GET http://musicapp.local/playlist/index
    public function index($id = '') {

        echo 'Id '. $id;
        echo 'Show Playlist COTROLLER<br /><br />';

        $playlist = $this->model('Playlist');
        $playlistData = $playlist->getPlaylistId($id);
        echo '<br /><br />';
        var_dump('PlaylistData: ' ,$playlistData);

        echo $playlistData['playlistname'];

        $this->view('playlist/index', [
            'name' => $playlistData['playlistname'],
            'user' => $playlistData['username'],
            'created_at' => $playlistData['created_at'],
            'updated_at' => $playlistData['updated_at'],
        ]);
    }

    // Create a new playlist
    // POST http://musicapp.local/playlist/store
    // data[playlistname]
    // data[username]
    public function store() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            if(isset($_POST['data'])) {
                $data = $_POST['data'];
                if(sizeof($data)) {
                    $playlist = $this->model('Playlist');
                    $playlist->storePlaylist($data);
                }
            }
        }
    }

    // PUT http://musicapp.local/playlist/update
    // x-www-urlcoded playlistname=R%26B&username=Jon&id=13
    public function update() {

        if($_SERVER['REQUEST_METHOD'] == 'PUT') {
            echo '<br /><br />PUT<br />';
            $xwwwurlencoded = file_get_contents('php://input');

            if(isset($xwwwurlencoded)) {
                print_r($xwwwurlencoded);
                parse_str($xwwwurlencoded, $data);
                $playlist = $this->model('Playlist');
                $response = $playlist->updatePlaylist($data);
            }
        }
    }

    // DELETE user http://mvcapp.local/user/delete
    // x-www-urlcoded id=13
    public function delete() {

        //DELETE
        if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            $xwwwurlencoded = file_get_contents('php://input');

            if(isset($xwwwurlencoded)) {
                print_r($xwwwurlencoded);
                parse_str($xwwwurlencoded, $data);
                $playlist = $this->model('Playlist');
                $response = $playlist->deleteUser($data);
            }
        }

    }

}