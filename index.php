<?php
 declare(strict_types=1);
ini_set('display_errors', "1");

// Below are several code blocks, read them, understand them and try to find whats wrong.
// Once this exercise is finished, we'll go over the code all together and we can share how we debugged the following problems.
// Try to fix the code every time and good luck ! (write down how you found out the answer and how you debugged the problem)
// =============================================================================================================================

// === Exercise 1 ===
// Below we're defining a function, but it doesn't work when we run it.
// Look at the error you get, read it and it should tell you the issue...,
// sometimes, even your IDE can tell you what's wrong
echo "Exercise 1 starts here:";

function new_exercise(int $x)
{
    $type ="<br/><hr/><br/><br/>Exercise ".$x." starts here:<br/>";  // er was iets mis met de var $block -> die vervangen
    //echo gettype($type);  type is string
    echo (string) $type;
}

new_exercise(2);
// 1 is 'OK'

// === Exercise 2 ===
// Below we create a week array with all days of the week.
// We then try to print the first day which is monday, execute the code and see what happens.

$week = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
$monday = $week[0]; // gewoon de index op nul gezet

echo $monday;
// 2 is 'OK'
new_exercise(3);
// functie aanroep is 'ok'
// === Exercise 3 ===
// This should echo ` "Debugged !" `, fix it so that that is the literal text echo'ed

$str = "Debugged ! Also very fun"; // verkeerde aanhalingstekens rond de string
echo substr($str, 0, 10);
// 3 is 'ok'!

new_exercise(4);
// === Exercise 4 ===
// Sometimes debugging code is just like looking up code and syntax...
// The print_r($week) should give:  Array ( [0] => mon [1] => tues [2] => wednes [3] => thurs [4] => fri [5] => satur [6] => sun )
// Look up whats going wrong with this code, and then fix it, with ONE CHARACTER!

foreach($week as $day) {
    //echo $day; //  dit werkt "ok", dus het zit in het zinnetje hieronder
    $day = [substr($day, 0, strlen($day)-3)];

    print_r($day);

    // waarom die $week uitprinten en niet die $dag? Daar gaat het toch om?!
    //echo $day."<br/>"; // dit werkt ook dus die waarde terug aan $day toewijzen is 'ok'
}
echo "<br/>";

print_r($week);
// excercise 4 is 'ok'

new_exercise(5); // excercise 5 is 'ok'
// === Exercise 5 ===
// The array should be printing every letter of the alfabet (a-z) but instead it does that + aa-yz
// Fix the code so the for loop only pushes a-z in the array

$arr = [];
for ($letter = 'a'; $letter <= 'z'; $letter++) {
    array_push($arr, $letter);

    $zpos=array_search("z",$arr);
    if($zpos==25) {
        break;
    }
}
print_r($arr); // Array ([0] => a, [1] => b, [2] => c, ...) a-z alfabetical array

new_exercise(6);
// === Final exercise ===
// The fixed code should echo the following at the bottom:
// Here is the name: $name - $name2
// $name variables are decided as seen in the code, fix all the bugs while keeping the functionality!

$arr = []; //

function combineNames(string $str1 = "", string $str2 = "") {
    $params = [$str1, $str2];
    foreach($params as $param) {
        if ($param == "") {
            return (string) $param = randomHeroName();
        }
    }
    // if the parameters are given with the function call  // this part works
    return (string) implode($params, " - ");
}

function randomHeroName()
{
    $hero_firstnames = ["captain", "doctor", "iron", "Hank", "ant", "Wasp", "the", "Hawk", "Spider", "Black", "Carol"];
    $hero_lastnames = ["America", "Strange", "man", "Pym", "girl", "hulk", "eye", "widow", "panther", "daredevil", "marvel"];
    $heroes = [$hero_firstnames, $hero_lastnames];
    // print_r($heroes); echo "<br>";echo "<br>"; // even testen wat er in zit
    $randname = $heroes[0][mt_rand(0, 10)]." - ".$heroes[1][mt_rand(0, 10)]; // dit even opnieuw geschreven

    return (string) $randname;
}
echo "Here is the name: " . combineNames('Ann', 'Kemp');

new_exercise(7);  //  is OK! :) er moest dus een string ipv een integer gedeclareerd worden voor de parameters
function copyright(string $year) {
    return (string) "&copy; $year BeCode";
}
//print the copyright
 print copyright(date("Y"));

new_exercise(8); // is opgelost! Smith moest gewoon bij Welcome John toegevoegd worden
function login(string $email, string $password) {
    if($email == 'john@example.be' || $password == 'pocahontas') {
        return 'Welcome John Smith'; // de code stopt na de eerste return dus nog een lijn returnen daarna heeft geen zin
    }
    return 'No access';
}
//should great the user with his full name (John Smith)
 print $login = login('john@example', 'pocahontas');
print "<br />";
//no access
print $login = login('john@example', 'dfgidfgdfg');
print "<br />";
//no access
print $login = login('wrong@example', 'wrong');

new_exercise(9); // is OK!
function isLinkValid(string $link) {
    $unacceptables = array('https:','.doc','.pdf', '.jpg', '.jpeg', '.gif', '.bmp', '.png');

    foreach ($unacceptables as $unacceptable) {
        if ((strpos($link, $unacceptable) == true) || (strpos($link, $unacceptable) === 0)){
            return 'Unacceptable Found<br />';
        }
    }
    return 'Acceptable<br />';
}
//invalid link
echo isLinkValid('http://www.google.com/hack.pdf');
//invalid link
echo isLinkValid('https://google.com'); // https: met index 0 wordt vertaalt naar false ipv true daarom ook testen op 0
//VALID link
echo isLinkValid('http://google.com');
//VALID link
echo isLinkValid('http://google.com/test.txt');

new_exercise(10); // oef 10 is opgelost via een 'fix' (+1)

//Filter the array $areTheseFruits to only contain valid fruits
//do not change the arrays itself
$areTheseFruits = ['apple', 'bear', 'beef', 'banana', 'cherry', 'tomato', 'car'];
$validFruits = ['apple', 'pear', 'banana', 'cherry', 'tomato'];
//from here on you can change the code
// blijkbaar heeft ie problemen als je == ipv <= test want dan werkt ie niet meer, en met <= doet ie een toertje te weinig om het laatste element van de array ook te testen, vandaar dus deze "patch" oplossing
for($i=0; $i <= (count($areTheseFruits)+1); $i++) {

    if(!in_array($areTheseFruits[$i], $validFruits)) { // deze functie is ook 'ok'
        unset($areTheseFruits[$i]); // deze functie is 'ok' en selecteert de index en verwijdert via de index, een nummer dus
    }
}
var_dump($areTheseFruits);//do not change thisls