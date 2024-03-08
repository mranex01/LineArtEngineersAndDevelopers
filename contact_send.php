<?php
if (isset($_REQUEST['send'])) {
    
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';

    $message = "\nClient Details:  ";
    $message .= "\nName: $name";
    $message .= "\nPhone No: $phone";
    $message .= "\nWork Type: $type";
    $message .= "\nCity: $city";

    $fields = array(
        "message" => "$message",
        "language" => "english",
        "route" => "q",
        "numbers" => "9921951967,7744885858",
    );
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($fields),
      CURLOPT_HTTPHEADER => array(
        "authorization: Vuqn3CD0leocQXgk8xSWp4MiNERv6TwadOtHmrIF9yfGjLYb2BQ51sPvecOplF6wGu70SNDxyBMAj9ZV",
        "accept: */*",
        "cache-control: no-cache",
        "content-type: application/json"
      ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }

    
    header("Location: contact.php");
    exit(); 


}
?>
