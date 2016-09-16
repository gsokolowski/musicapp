<?php


class TrackController extends Controller
{

    public function index() {

    }

    // Add new trucks as array
    // POST an array to http://musicapp.local/track/store
    // data[0][trackname] = 'name' etc
    // data[0][energy]
    // data[0][explicit]
    // data[0][artist]
    // data[0][playlist_id]

    // data[1][trackname]
    // data[1][energy]
    // data[1][explicit]
    // data[1][artist]
    // data[1][playlist_id]

    public function store() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            if(isset($_POST['data'])) {
                $data = $_POST['data'];
                if(sizeof($data)) {
                    $track = $this->model('Track');
                    $response = $track->storeTrack($data);
                }
            }
        }
    }


    // DELETE user http://musicapp.local/track/delete
    // x-www-urlcoded id=13
    public function delete() {

        //DELETE
        if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            $xwwwurlencoded = file_get_contents('php://input');

            if(isset($xwwwurlencoded)) {
                print_r($xwwwurlencoded);
                parse_str($xwwwurlencoded, $data);
                $track = $this->model('Track');
                $response = $track->deleteTrack($data);
            }
        }

    }

}