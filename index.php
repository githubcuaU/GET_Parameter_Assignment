<?php 

// Since users have not entered in any data, no message is displayed initially.
$message1 = "";
$message2 = "";
$message3 = "";
$currentDate = "";


// Save entered data in variables
if(isset($_GET['first']) || isset($_GET['last']) || isset($_GET['age']))
{
    $firstName = htmlspecialchars($_GET['first']);
    $lastName = htmlspecialchars($_GET['last']);
    $age = htmlspecialchars($_GET['age']);
}


// Ask users to fill out data if they leave the fields empty
if(empty($firstName))
{ 
    echo "Please fill out your first name."."<br>";
}
if(empty($lastName))
{ 
    echo "Please fill out your last name."."<br>";
}
if(empty($age))
{
    echo "Please fill out your age."."<br>";
}


if(!empty($firstName) && !empty($lastName) && !empty($age))
{
    // Ask users to enter valid alphanumeric data
    if (ctype_alpha($firstName) === false) 
    {
        echo "Please enter your first name in alphabetic letters."."<br>";
    }
    if (ctype_alpha($lastName) === false) 
    {
        echo "Please enter your last name in alphabetic letters."."<br>";
    }
    if (ctype_digit($age) === false) 
    {
        echo "Please enter your age in numbers."."<br>";
    }

    // Display messages with valid data
    if (ctype_alpha($firstName) && ctype_alpha($lastName) && ctype_digit($age))
    {
        
        $message1 = "Hello, my name is {$firstName} {$lastName}."."<br>";

        if($age >= 18)
        {
            $message2 = "I am {$age} years old and I am old enough to vote in the United States."."<br>";
        }
        else
        {
            $message2 = "I am {$age} years old and I am not old enough to vote in the United States."."<br>";
        }
    
        $message3 = "My age calculated in days = ".($age*365)." days <br>";
        $currentDate = date('m-d-Y');
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assigment</title>
    <link rel="stylesheet" href="main.css">
</head>


<body>
    <h1>User Info</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>">
        <label for="first">First Name:</label>
        <input type="text" id="first" name="first" autocomplete="off"> 
        <label for="last">Last Name:</label>
        <input type="text" id="last" name="last" autocomplete="off">
        <label for="age">Age:</label>
        <input type="text" id="age" name="age" autocomplete="off">
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>

    <p><?php echo $message1.$message2.$message3.$currentDate; ?></p>

</body>
</html>