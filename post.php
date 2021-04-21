<?php 
    class Post {

        private $id;
        private $title;
        private $content;
        private $date;
        private $imageURL;
    

    function __construct($id,$title,$content,$date,$imageURL) {
        
        $this->id = $id;
        $this->title = $title;
        $this->content =$content;
        $this->date = $date;
        $this->imageURL = $imageURL;

    }


    function get_id() {
        return $this->id;
    }

    function get_title() {
        return $this->title;
    }

    function get_content() {
        return $this->content;
    }

    function get_date() {
        return $this->date;
    }
    function get_imageURL() {
        return $this->imageURL;
    }


    
}
?>