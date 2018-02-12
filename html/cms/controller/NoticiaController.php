<?php
namespace App\Controller;

use App\Model\Noticia;
use App\Helper\ViewHelper;
use App\Helper\DbHelper;

class UsuarioController {
    
    var $db;
    var $viewHelper;
    function __construct() {
        
        $dbHelper = new DbHelper();
        $this->db = $dbHelper->db ;
        //instancio el viewHelper
        $viewHelper = new ViewHelper();
        $this->view = $viewHelper;
    }
    function activar($id){

        if ($id) {
            $registros = $this->db->exec("UPDATE noticias SET activo=1 WHERE id=" . $id . "");

            if ($registros) {

                $mensaje[] = ['tipo' => 'success',
                    'texto' => 'La noticia se ha activado correctamente.',
                ];


            } else {
                $mensaje[] = ['tipo' => 'danger',
                    'texto' => 'Ha ocurrido un error al activar la noticia.',
                ];
            }
        }else{
            $mensaje[] = ['tipo' => 'danger',
                'texto' => 'La noticia no existe.',
            ];
        }
        $_SESSION['mensajes'] = $mensaje;
        //Le redirijo al panel
        header("location: ".$_SESSION['home']."panel/noticias");


    }
    function desactivar($id){

        if ($id) {
            $registros = $this->db->exec("UPDATE noticias SET activo=0 WHERE id=" . $id . "");

            if ($registros) {

                $mensaje[] = ['tipo' => 'success',
                    'texto' => 'La noticias se ha desactivado correctamente.',
                ];


            } else {
                $mensaje[] = ['tipo' => 'danger',
                    'texto' => 'Ha ocurrido un error al desactivar la noticia.',
                ];
            }
        }else{
            $mensaje[] = ['tipo' => 'danger',
                'texto' => 'La noticia no existe.',
            ];
        }
        $_SESSION['mensajes'] = $mensaje;
        //Le redirijo al panel
        header("location: ".$_SESSION['home']."panel/noticias");


    }
    function borrar($id){

        if ($id) {
            $registros = $this->db->exec("DELETE FROM noticias WHERE id=" . $id . " ");

            if ($registros) {

                $mensaje[] = ['tipo' => 'success',
                    'texto' => 'La noticia se ha borrado correctamente.',
                ];


            } else {
                $mensaje[] = ['tipo' => 'danger',
                    'texto' => 'Ha ocurrido un error al borrar la noticia.',
                ];
            }
        }else{
            $mensaje[] = ['tipo' => 'danger',
                'texto' => 'La noticia no existe.',
            ];
        }
        $_SESSION['mensajes'] = $mensaje;
        //Le redirijo al panel
        header("location: ".$_SESSION['home']."panel/noticias");


    }
    
    function editar($id) {

        if ($id) {
            if(isset($_POST['guardar']) AND  $_POST['guardar'] == "Guardar"){
                $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $usuarios = (filter_input(INPUT_POST, 'usuarios', FILTER_SANITIZE_STRING)) == 'on' ? 1 : 0;
                $noticias = (filter_input(INPUT_POST, 'noticias', FILTER_SANITIZE_STRING)) == 'on' ? 1 : 0;
                $this->db->beginTransaction();
                $this->db->exec("UPDATE usuarios SET usuario='".$usuario."' WHERE id='".$id."'");
                $this->db->exec("UPDATE usuarios SET usuarios='".$usuarios."' WHERE id='".$id."'");
                $this->db->exec("UPDATE usuarios SET noticias='".$noticias."' WHERE id='".$id."'");
                $this->db->commit();
                
                $mensaje[] = ['tipo' => 'success',
                    'texto' => 'El usuario <strong>'.$usuario.'</strong> se ha editado correctamente'];
                header("location: " . $_SESSION['home'] . "panel/usuarios");
                
            }else{
               $resultado = $this->db->query("SELECT * FROM usuarios WHERE id='" . $id . "'");
                $usuario = $resultado->fetch(\PDO::FETCH_OBJ);
                if ($usuario) {
                    $this->view->vista('usuario', $usuario);
                } else {
                    $mensaje[] = ['tipo' => 'danger',
                        'texto' => 'Ha ocurrido un error al editar el usuario'];
                    $_SESSION['mensajes'] = $mensaje;
                    header("location: " . $_SESSION['home'] . "panel/usuarios");
                } 
            }           
        } else {
            $mensaje[] = ['tipo' => 'danger',
                'texto' => 'Ha ocurrido un error al editar el usuario'];
            $_SESSION['mensajes'] = $mensaje;
            header("location: " . $_SESSION['home'] . "panel/usuarios");
        }
    }

}

