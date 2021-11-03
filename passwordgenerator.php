<?php
//Password generation values

$pass_lenght        = $_POST['lenght'];      //Lenght of the password.
// Not implemented yet.
$complexity         = $_POST['complex'];     //Complexity of the password.
$type_of_pass       = "test";                //Type of password indicates what type.'
if($complexity == 0){
  $complexity = 4;
}
if($pass_lenght == null){
    $pass_lenght = 12;
}
if($pass_lenght >= 51){
    $pass_lenght = 50;
}

//trash code that doesnt work nice but it works kinda but its hell if i want to change anything on the fly and when this project expands this will be a paaaaaaaiin in the ass
//Returns a random string of numbers/letters.
function l4_complex_random_string($length) {
  $key = '';
  $keys = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));

  for ($i = 0; $i < $length; $i++) {
      $key .= $keys[array_rand($keys)];
  }

  return $key;
}
function l3_complex_random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}
//Returns a random string of letters.
function l2_complex_random_string($length) {
  $key = '';
  
  $keys = array_merge(range('a', 'z'));
  
  for ($i = 0; $i < $length; $i++) {
      $key .= $keys[array_rand($keys)];
  }

  return $key;
}
//Returns a random string of numbers.
function l1_complex_random_string($length) {
  $key = '';
  
  $keys = array_merge(range(0, 9));
  
  for ($i = 0; $i < $length; $i++) {
      $key .= $keys[array_rand($keys)];
  }

  return $key;
}
//This is the output of that function.
switch($complexity){
  case 1:
    $output = l1_complex_random_string($pass_lenght);
    break;
    case 2:
      $output = l2_complex_random_string($pass_lenght);
      break;
      case 3:
        $output = l3_complex_random_string($pass_lenght);
        break;
        case 4:
          $output = l4_complex_random_string($pass_lenght);
          break;
}



?>


<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet">

<style>
body {
  background-color: darkgray;
}


</style>


<body class="text-center"> 
<img src="/images/krekkers.png" width="256" height="256"> </img>
<form method="POST">
<div class="mx-auto" style="width: 250px;">
<ul class="list-group list-group-flush">


<?php if($pass_lenght == 50){ ?>
    <li class="list-group-item">
    <div class="alert alert-danger" role="alert">
  You have reached the password lenght limit.
</li>
<?php } ?>

  <li class="list-group-item">Lenght <input type="text" name="lenght" value="<?php echo $pass_lenght; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">

</li>
<li class="list-group-item">complexity
 <div class="input-group mb-3">
  <select class="form-select" name="complex" id="inputGroupSelect01">
    <option selected>Choose</option>
    <option name="complex" value="1">numbers</option>
    <option name="complex" value="2">letters</option>
    <option name="complex" value="3">both</option>
    <option name="complex" value="4">Both + capital (default)</option>
  </select>
</div>

</li>
  <li class="list-group-item">Type <input disabled type="text" name="type" placeholder="<?php echo $type_of_pass; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">

</li>
  <li class="list-group-item">Output  <input type="text" disabled name="output" id="output" value="<?php echo $output; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">

</li>
</ul>
<button name="submit" type="submit" class="btn btn-success" type="button">Generate</button><button name="copy" onclick="ctc()" class="btn btn-primary" type="button">Copy</button>
</div>
</form>
<?php include('templates/footer.php') ?>

<script>

//copy to clipboard thingy.
function ctc(){
    var textToCopy = document.getElementById("output");

    textToCopy.select();
    navigator.clipboard.writeText(textToCopy.value);

    
}



    </script>



