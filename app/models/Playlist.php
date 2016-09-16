<?php

class Playlist extends Model {

    public $id;
    public $playlistname;
    public $username;
    public $created_at;
    public $updated_at;

    protected $db;


    public function getAllPlaylists() {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = " select * from playlists ";
        //echo $sql;
        $query = $this->db->prepare($sql);
        $query->execute(array());
        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        return $data;
        //return json_encode($data);
    }

    public function getPlaylistId($id) {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = " select * from playlists where id = ? ";
        echo $sql;
        $query = $this->db->prepare($sql);
        $query->execute(array($id));
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
        //return json_encode($data);
    }

    public function storePlaylist($data) {

        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO playlists (playlistname, username, created_at, updated_at ) values(?, ?, ?, ?)";
        //echo $sql;
        $query = $this->db->prepare($sql);
        return $query->execute(array($data['playlistname'], $data['username'], $this->date, $this->date));

    }

    public function updatePlaylist($data) {

        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE playlists set playlistname = ?, username = ?, updated_at = ?  WHERE id = ?";
        var_dump($data);
        $query = $this->db->prepare($sql);
        $response = $query->execute(array($data['playlistname'], $data['username'], $this->date, $data['id']));
    }

    public function deleteUser($data) {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from playlists where id = ?";
        $query = $this->db->prepare($sql);
        $response = $query->execute(array($data['id']));
    }




}