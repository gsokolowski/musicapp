<?php


// user belongs to category
class Track extends Model {

    public $id;
    public $trackname;
    public $energy;
    public $explicit;
    public $artist;
    public $playlist_id;

    protected $db;


    public function storeTrack($data) {

        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tracks (trackname, energy, explicit, artist, playlist_id ) values(?, ?, ?, ?, ?)";
        echo $sql;
        $query = $this->db->prepare($sql);

        foreach($data as $row) {
            $response = $query->execute(array($row['trackname'], $row['energy'], $row['explicit'], $row['artist'], $row['playlist_id']));
        }
    }


    public function deleteTrack($data) {

        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from tracks where id = ?";
        $query = $this->db->prepare($sql);
        $query->execute(array($data['id']));

    }


}