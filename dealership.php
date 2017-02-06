<?php
class Car
{
    public $make_model;
    private $price;
    public $miles;

    function __construct($price, $miles, $make_model) {
      $this->price= $price;
      $this->make_model = $make_model;
      $this->miles = $miles;
    }

    function getPrice()
    {
        return $this->price;
    }

    function setPrice($new_price) {
      $float_price = (float) $new_price;
        if ($float_price != 0) {
            $formatted_price = number_format($float_price, 2);
            $this->price = $formatted_price;
        }
    }
}


$porsche = new Car();
$porsche->make_model = "2014 Porsche 911";
$porsche->price = 114991;
$porsche->miles = 7864;

$ford = new Car();
$ford->make_model = "2011 Ford F450";
$ford->price = 55995;
$ford->miles = 14241;

$lexus = new Car();
$lexus->make_model = "2013 Lexus RX 350";
$lexus->price = 44700;
$lexus->miles = 20000;

$mercedes = new Car();
$mercedes->make_model = "Mercedes Benz CLS550";
$mercedes->price = 39900;
$mercedes->miles = 37979;

$cars = array($porsche, $ford, $lexus, $mercedes);

$cars_matching_search = array();
foreach ($cars as $car) {
    if ($car->price < $_GET["price"]) {
        array_push($cars_matching_search, $car);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
            foreach ($cars_matching_search as $car) {
                $price = $price->getPrice();
                echo "<li> $car->make_model </li>";
                echo "<ul>";
                    echo "<li> $$price </li>";
                    echo "<li> Miles: $car->miles </li>";
                echo "</ul>";
            }
        ?>
    </ul>
</body>
</html>
The Car class has 3 properties: its make/model, its price, number of miles. Then, we instantiate 4 Car objects, set their properties, and put them in an array called $cars. Next, we create an empty array called $cars_matching_search, which will hold all the cars matching the user's search parameter so that we can display them on the page. Then, we use a loop to fill that array. It checks to see if the price on each Car object is less than the price specified in the form, and if they are, then add the Car to $cars_matching_search to display. Finally, we use another loop in the HTML to show each chosen Car's properties.

Let's create a method called worthBuying which compares the Car's price to the value entered into the form. Add this to the Car class declaration in Car.php:

Car.php
function worthBuying($max_price)
{
    return $this->price < $max_price;
}
