<?php
// Obtener el contenido de la página web
$contenido = file_get_contents('https://dolarhoy.com/');

// Verifica si el contenido se obtuvo correctamente
if ($contenido !== false) {
    // Define el patrón de expresión regular para buscar el dato específico
    $patron = '/<div class="val">(.*?)<\/div>/';
    // Se especifica clase, id o etiqueta HTML que corresponda en la página web
    // El '(.*?)' captura cualquier contenido entre las etiquetas span

    // Realiza la búsqueda con la expresión regular
    if (preg_match($patron, $contenido, $coincidencias)) {
        // La función preg_match() devuelve las coincidencias encontradas en el arreglo $coincidencias
        // El dato específico se encuentra en $coincidencias[1], que es el primer grupo capturado por la expresión regular

        $datoEspecifico = $coincidencias[1]; // Extrae el dato específico
        //$patron = "/\d+/";
        //preg_match($patron, $datoEspecifico, $coincidencia);
        //$numero = $coincidencia[0];
        echo '<br>';
        echo '<span>Valor del peso Argentino respecto al Dolar Blue, desde <a href="https://dolarhoy.com" target="_blank">dolarhoy.com</a> es: <h4>' . $datoEspecifico.'</h4></span>';
        //echo '<br>';
        //echo "El número encontrado es: " . $numero;

    } else {
        echo 'No se encontró el dato específico en el contenido obtenido de la página web.';
    }
} else {
    echo 'No se pudo obtener el contenido de la página web.';
}
?>

