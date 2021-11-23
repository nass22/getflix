<?php

    function filtreSaisie($saisie){
        $saisie=trim($saisie); //supprime les espaces inutiles
        $saisie=stripslashes($saisie); //supprime les antislashes
        $saisie=htmlspecialchars($saisie); //permet d'échapper certains caractères pour éviter d'insérer du js
        return $saisie;
    }

?>