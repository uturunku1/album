<?php
    class CD
    {
    public $title;
    public $artist;
    public $cover_art;
    private $price;

    function __construct($album_name, $band_name, $image_path, $album_price = 10.99)
    {
        $this->title = $album_name;
        $this->artist = $band_name;
        $this->cover_art = $image_path;
        $this->price = $album_price;
    }


    function setPrice($new_price)
    {
        $float_price = (float) $new_price;
        if ($float_price != 0) {
            $formatted_price = number_format($float_price, 2);
            $this->price = $formatted_price;
        }
    }

    function getPrice()
    {
      return $this->price;
    }
    }

?>
