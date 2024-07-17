<?php

// controllers/ApiController.php
namespace app\controllers;

use yii\rest\ActiveController;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use app\models\Books;
use Yii;

class ApiController extends ActiveController
{
    public $modelClass = 'app\models\Books';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;
        return $behaviors;
    }

    public function actionList()
    {
        $books = Books::find()->with('author')->all();
        return $books;
    }

    public function actionById($id)
    {
        $book = Books::findOne($id);
        if ($book === null) {
            throw new NotFoundHttpException("Book not found");
        }
        return $book;
    }

    public function actionUpdate()
    {
        $params = Yii::$app->request->post();
        $book = Books::findOne($params['id']);
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
        $book = Books::findOne($id);
        if ($book === null) {
            throw new NotFoundHttpException("Book not found");
        }
        $book->delete();
        return ['status' => 'Book deleted'];
    }
}
