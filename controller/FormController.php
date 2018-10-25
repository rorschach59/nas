<?php

class FormController extends DefaultController
{
    public function __construct()
    {
    }

    public static function postForm()
    {
        $path = '';

        // Si on se trouve dans un ou plusieurs dossiers
        if (isset($_GET) && !empty($_GET)) {
            $countDir = 0;

            foreach ($_GET as $key => $value) {
                if (explode('_', $key)[0] === 'dir') {
                    $countDir++;
                }
            }

            for ($i=1; $i <= $countDir; $i++) {
                if($i > 1) {
                    $path .= '/'.$_GET['dir_'.$i];
                } else {
                    $path .= $_GET['dir_'.$i];
                }
            }
        }

        // Si on créé un nouveau dossier
        if (isset($_POST['dirName']) && !empty($_POST['dirName'])) {
            $path .= '/'.$_POST['dirName'];
        }

        if (isset($_FILES) && !empty($_FILES['uploadFile'])) {
            
            // Met en forme la superglobale $_FILES
            $file_array = self::reArrayFiles($_FILES['uploadFile']);
            $success = false;
            $plural = count($file_array) > 1 ? 's' : '';

            foreach ($file_array as $file) {
                
                // Si on se trouve dans un ou plusieurs dossiers, ou que l'on à créé un nouveau dossier
                if (isset($path) && !empty($path)) {
                    // source, destination
                    if(AwsController::uploadToS3($file['tmp_name'], $path.'/'.$file['name'])) {
                        $success = true;
                    }
                } else {
                    if(AwsController::uploadToS3($file['tmp_name'], $file['name'])) {
                        $success = true;
                    }
                }
                
                if ($success) {
                    $_SESSION['flash']['level'] = 'success';
                    $_SESSION['flash']['message'] = 'Fichier'.$plural.' téléchargé'.$plural.' avec success';
                    header("Location: ".DOMAINE);
                } else {
                    $_SESSION['flash']['level'] = 'error';
                    $_SESSION['flash']['message'] = 'Erreur pour télécharger le'.$plural.' fichier'.$plural;
                    $success = false;
                }
            }
        }
    }

    private static function reArrayFiles(&$file_post)
    {
        $file_array = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);
    
        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_array[$i][$key] = $file_post[$key][$i];
            }
        }
    
        return $file_array;
    }
}