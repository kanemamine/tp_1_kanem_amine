<?php
// fonction pour ajouter du sel
function addSalt($data){
    $SALT = "FzfhrjYJRegzeEG!!:(";
    $data = $SALT . $data . $SALT;
    return $data;
}

if ($_POST) {

    $data = $_POST['password'];

    // Vérifie si la variable $data est vide
    if (!$data) {
        echo "T'attends de moi quoi au juste !!?";
    } else if (strlen($data) < 6 ) {
        // Vérifie si la longueur de $data est inférieure à 6 caractères
        echo "il me faudrait une loupe pour voir votre mot de passe ! un petit effort svp.";
    } else if (strlen($data) > 10) {
        // Vérifie si la longueur de $data est supérieure à 10 caractères
        echo "Votre mot de passe est un véritable chef-d'œuvre littéraire, mais nous avons juste besoin d'un mot de passe";
    } else {
        // Appelle la fonction addSalt pour ajouter du sel au mot de passe
        $dataS = addSalt($data);
        
        // Affiche le resultat 
        echo '
        <div style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <form style="margin-bottom: 20px;">
                <p style="font-size: 18px;"><strong>Votre mot de passe :</strong> ' . htmlspecialchars($data) . '</p>
                <p style="font-size: 18px;"><strong>Nombre de caractères :</strong> ' . strlen($data) . '</p>
                <p style="font-size: 18px;"><strong>Salté :</strong> ' . htmlspecialchars($dataS) . '</p>
                <p style="font-size: 18px;"><strong>Encrypté :</strong> ' . password_hash($dataS, PASSWORD_DEFAULT) . '</p>
            </form>
        </div>';

    }
}
?>
