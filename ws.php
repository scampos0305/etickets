<?php
function digital($array){
    return 'digital';
}
function comprobante($array){
    return "Tu comprobante a sido generado correctamente!.";
}
function whatsapp($array){
    $data = [
        'phone' => '5217713497113', // Rece
        'body' => 'Este es un mensaje de Banco Azteca, tu transaccion de '.$array['monto'].' se realizo correctamente el dia'.date('Y-m-d H-i-s'), // Message
    ];

    $json = json_encode($data); // Encode data to JSON
// URL for request POST /message
    $url = 'https://eu63.chat-api.com/instance61391/sendMessage?token=dko6ki3wgv5alftl';
// Make a POST request
    $options = stream_context_create(['http' => [
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $json
    ]
    ]);
// Send a request
    $result = file_get_contents($url, false, $options);

    return "Se envio un mensaje al numero 77XXXXXXXX";
}

function email($array){

  mail("detal446@gmail.com","Retiro de efectivo","Retiro la cantidad de: $150.00" );


    return "mail";
}
function otro($array){

    $url = 'https://rest.nexmo.com/sms/json?' . http_build_query([
            'api_key' => 'c9d44d63',
            'api_secret' => '4PRhS4lQw1CwAi0h',
            'to' => '527713497113',
            'from' => 'Nexmo',
            'text' => 'Su transaccion de '.$array['monto'].' se realiz贸 exitosamente.'
        ]);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    return $response = curl_exec($ch);//Que apasho ya funciono lo de gmail jajaja y el mensaje a no nada ,recuerda que no puedo mandarme un sms solo

    //return "Tu transaccion se completo exitosamente, con un cargo a tu tarjeta de ".$array['monto'];
}

header("Content-Type:application/json");
header("HTTP/1.1 ");

$mensaje = "";

if ($_POST['tipo']!='') {

    $data = $_POST['tipo'];
    $mensaje = $data;

    $array =
        array(
            'tarjeta' => $_POST['txtTarjeta'],
            'cvv' => $_POST['txtCVV'],
            'monto' => $_POST['txtmonto'],
        );

    switch ($data) {
        case 'digital':
            $mensaje = digital($array);
            break;
        case 'whatsapp':
            $mensaje = whatsapp($array);
            break;
        case 'mail':
            $mensaje = email($array);
            break;
        case 'comprobante':
            $mensaje = comprobante($array);
            break;
        case 'otro':
            $mensaje = otro($array);
            break;
        default:
            $mensaje = "No se encontro ninguna referencia a la accion solicitada.";
            break;
    }

}else{
    $mensaje = "Error al tratar de realizar el movimiento.";
}

$json_response = json_encode($mensaje);
echo $json_response;
