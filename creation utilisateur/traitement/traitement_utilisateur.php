<?php
// Inclure l'autoloader de Composer pour charger les classes PhpSpreadsheet
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

// Vérifie si des données ont été soumises via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Récupère les données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];

        // Crée un tableau contenant les données de l'utilisateur
        $userData = array(
            array($nom, $prenom, $email, $mot_de_passe)
        );

        // Crée un nouveau fichier Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Ajoute les données de l'utilisateur au fichier Excel
        foreach ($userData as $row => $data) {
            foreach ($data as $col => $value) {
                $sheet->setCellValueByColumnAndRow($col + 1, $row + 1, $value);
            }
        }

        // Enregistre le fichier Excel sur le serveur
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('utilisateurs.xlsx');

        // Redirige l'utilisateur vers une page de confirmation
        header("Location: confirmation.html");
        exit;
    } catch (\Exception $e) {
        // Gère les exceptions
        echo "Une erreur est survenue : " . $e->getMessage();
    }
} else {
    // Redirige l'utilisateur vers une page d'erreur si la méthode de requête n'est pas POST
    header("Location: erreur.html");
    exit;
}
?>
