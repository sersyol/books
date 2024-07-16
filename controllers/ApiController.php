<?php

// controllers/ApiController.php
namespace app\controllers;

use yii\rest\ActiveController;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use app\models\Book;
use Yii;

class ApiController extends ActiveController
{
    public $modelClass = 'app\models\Book';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;
        return $behaviors;
    }

    public function actionList()
    {
        $books = Book::find()->with('author')->all();
        return $books;
    }

    public function actionById($id)
    {
        $book = Book::findOne($id);
        if ($book === null) {
            throw new NotFoundHttpException("Book not found");
        }
        return $book;
    }

    public function actionUpdate()
    {
        $params = Yii::$app->request->post();
        $book = Book::findOne($params['id']);
        if ($book === null) {
            throw new NotFoundHttpException("Book not found");
        }
        $book->load($params, '');
        if ($book->save()) {
            return $book;
        }
        return ['error' => 'Unable to update book'];
    }

    public function actionDelete($id)
    {
        $book = Book::findOne($id);
        if ($book === null) {
            throw new NotFoundHttpException("Book not found");
        }
        $book->delete();
        return ['status' => 'Book deleted'];
    }
}
