<?php
// nombre del archivo que contiene los asistentes
// Este script lee un archivo de texto y muestra los nombres de los asistentes en una lista numerada
$archivo = "asistentes.txt";
try {
    // Verifica si el archivo existe
    if (!file_exists($archivo)) {
        throw new Exception("El archivo no existe.");
    }
    // Abrir el archivo para lectura
    $fp = fopen($archivo, "r");
    // Si no se pudo abrir el archivo, lanzamos una excepción
    if (!$fp) {
        throw new Exception("No se pudo abrir el archivo para lectura.");
    }
    // Leer el archivo línea por línea y mostrar los nombres
    $contador = 1;
    while (!feof($fp)) {
        // Leemos una línea del archivo
        $linea = fgets($fp);
        // htmlspecialchars() para evitar problemas de seguridad con HTML
        if (trim($linea) !== "") {
            echo $contador . ". " . htmlspecialchars(trim($linea)) . "<br>";
            $contador++;
        }
    }
    fclose($fp);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
