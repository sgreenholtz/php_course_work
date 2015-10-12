ARRAY

Numeric arrays:
$products = array('bacon','hamburgers','tomatoes','buns');
echo $products[0]; //bacon
echo $products[3]; //buns

Associative array:
$ages = array('bob' => 34, 'kim' => 31, 'todd' => 62);
echo $ages['bob']; //34
echo $ages['kim']; //31
echo $ages['todd'];//62

-- can combine arrays, but really shouldn't

compact()
array_push() : add things to the array
$cas[] = array();

array_push($cars, "Altima");
$cars[0] == "Altima"

foreach($cars as $car)
{
    echo $car;
}
-- will go through the whole array and output each element

SECURITY

-- basic HTTP authorization is really really simple
-- trim()
-- mysqli_real_escape_string()