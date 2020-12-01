<?php

namespace landing\controllers;

use api\models\Users;
use models\User;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class UsersController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'edit', 'add', 'delete', 'info'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('../site/index', ['page' => 'users', 'action' => 'index']);
    }

    public function actionInfo($tel = null)
    {
        if ($us = Users::findOne(['phone' => $tel])) {
            return $this->render('../site/index', ['page' => 'users', 'action' => $this->action->id, 'user' => $us]);
        }
        return $this->render('../site/index', ['page' => 'users', 'action' => 'index']);
    }

    public function actionAdd()
    {
        $user = new User();
        if ($body = Yii::$app->request->getBodyParam('User')) {
            foreach ($body as $k => $v) {
                $user->$k = $v;
            }
            if (!User::findByEmail($user->email) && $user->save()) {
                return $this->render('../site/index', ['page' => 'users', 'action' => 'index']);
            }
        }
        return $this->redirect('/users');
    }

    public function actionEdit($id)
    {
        if ($user = Users::findOne($id)) {
            return $this->render('../site/index', ['page' => 'users', 'action' => $this->action->id, 'user' => $user]);
        }
        return $this->render('../site/index', ['page' => 'users', 'action' => $this->action->id]);
    }

    public function actionProfile()
    {
        if ($user = User::findOne(Yii::$app->user->id)) {
            return $this->render('../site/index', ['page' => 'users', 'action' => $this->action->id, 'user' => $user]);
        }
        return $this->render('../site/index', ['page' => 'users', 'action' => $this->action->id]);
    }

    public function actionDelete($id)
    {
        if ($user = User::findOne($id)) {
            $user->delete();
        }
        return $this->redirect('/users');
    }
}
