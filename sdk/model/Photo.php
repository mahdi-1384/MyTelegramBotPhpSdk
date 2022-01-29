<?php

class Photo extends BaseData {
    private string $photo;

    public function getPhoto() {
        return $this->photo;
    }

    public function setPhoto(string $photo) {
        $this->photo = $photo;
    }
}

?>