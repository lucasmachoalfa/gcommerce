<?php

class RedesSociais {
    private $facebook;
    private $instagram;
    private $twitter;
    private $google;
    private $vimeo;
    private $youtube;
    private $pinterest;
    private $flickr;
    private $linkedin;
    
    public function getFacebook() {
        return $this->facebook;
    }
    public function setFacebook($facebook) {
        $this->facebook = seg($facebook);
    }
    

    public function getInstagram() {
        return $this->instagram;
    }
    public function setInstagram($instagram) {
        $this->instagram = seg($instagram);
    }
    

    public function getTwitter() {
        return $this->twitter;
    }
    public function setTwitter($twitter) {
        $this->twitter = seg($twitter);
    }
    

    public function getGoogle() {
        return $this->google;
    }
    public function setGoogle($google) {
        $this->google = seg($google);
    }
    

    public function getVimeo() {
        return $this->vimeo;
    }
    public function setVimeo($vimeo) {
        $this->vimeo = seg($vimeo);
    }
    

    public function getYoutube() {
        return $this->youtube;
    }
    public function setYoutube($youtube) {
        $this->youtube = seg($youtube);
    }
    

    public function getPinterest() {
        return $this->pinterest;
    }
    public function setPinterest($pinterest) {
        $this->pinterest = seg($pinterest);
    }
    

    public function getFlickr() {
        return $this->flickr;
    }
    public function setFlickr($flickr) {
        $this->flickr = seg($flickr);
    }
    

    public function getLinkedin() {
        return $this->linkedin;
    }
    public function setLinkedin($linkedin) {
        $this->linkedin = seg($linkedin);
    }


}


$objRedesSociais = new RedesSociais();