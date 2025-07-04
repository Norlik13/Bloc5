<?php

namespace App\Controllers;

use App\Models\Articles;
use App\Utility\Upload;
use \Core\View;

/**
 * Product controller
 */
class Product extends \Core\Controller
{

    /**
     * Affiche la page d'ajout
     * @return void
     */
    public function indexAction()
    {

        if(isset($_POST['submit'])) {
            $errors = [];

            // Vérifier si l'utilisateur a téléchargé une image
            if ($_FILES['picture']['error'] === UPLOAD_ERR_NO_FILE || !isset($_FILES['picture'])) {
                $errors[] = "Veuillez uploader un photo pour publier une annonce.";
            }

            if (empty($errors)) {
                try {
                    $f = $_POST;

                    $f['user_id'] = $_SESSION['user']['id'];
                    $id = Articles::save($f);

                    $pictureName = Upload::uploadFile($_FILES['picture'], $id);

                    Articles::attachPicture($id, $pictureName);

                    header('Location: /product/' . $id);
                    exit;

                } catch (\Exception $e) {
                    $errors[] = "Une erreur s'est produite : " . $e->getMessage();
                }
            }
            View::renderTemplate('Product/Add.html', [
                'errors' => $errors
            ]);
        }
        else {
            View::renderTemplate('Product/Add.html');
        }
    }

    /**
     * Affiche la page d'un produit
     * @return void
     */
    public function showAction()
    {
        $id = $this->route_params['id'];

        try {
            Articles::addOneView($id);
            $suggestions = Articles::getSuggest();
            $article = Articles::getOne($id);
        } catch(\Exception $e){
            var_dump($e);
        }

        View::renderTemplate('Product/Show.html', [
            'article' => $article[0],
            'suggestions' => $suggestions
        ]);
    }

    public function contact()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $message = $_POST['message'] ?? '';
            $articleId = $this->route_params['id'] ?? null;

            header('Location: /product/' . $articleId);
            exit;
        } else {
            header('Location: /');
            exit;
        }
    }
}
