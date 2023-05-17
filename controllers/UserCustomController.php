<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UserCustom;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use webvimark\modules\UserManagement\models\User;

class UserCustomController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'ghost-access' => [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    // public function actionIndex()
    // {
    //     $dataProvider = new ActiveDataProvider([
    //         'query' => UserCustom::find(),
    //         /*
    //         'pagination' => [
    //             'pageSize' => 50
    //         ],
    //         'sort' => [
    //             'defaultOrder' => [
    //                 'id' => SORT_DESC,
    //             ]
    //         ],
    //         */
    //     ]);
    //     $userCustom = new UserCustom;
    //     $user = new User;

    //     return $this->render('index', compact('dataProvider', 'userCustom', 'user'));
    // }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => UserCustom::find(),
        ]);
        $userCustom = new UserCustom;
        $user = new User;

        if ($this->request->isPost) {
            if ($userCustom->load($this->request->post()) && $user->load($this->request->post())) {
                $user->auth_key        = Yii::$app->security->generateRandomString();
                $user->password_hash   = Yii::$app->security->generatePasswordHash($user->password);
                $user->status          = 1;
                $user->created_at      = time();
                $user->updated_at      = time();
                $user->email_confirmed = 1;
                if ($user->save()) {
                    $userCustom->use_fkuser = $user->id;
                    // if ($userCustom->save()) {
                    //     $userCustom = new UserCustom;
                    //     $user = new User;
                    // }
                    $userCustom->save();
                }
            }
        } else {
            $userCustom->loadDefaultValues();
        }

        return $this->render('index', compact('dataProvider', 'userCustom', 'user'));
    }
    public function actionIndexDataTable()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => UserCustom::find(),
        ]);
        $userCustom = new UserCustom;
        $user = new User;

        if ($this->request->isPost) {
            if ($userCustom->load($this->request->post()) && $user->load($this->request->post())) {
                $user->auth_key        = Yii::$app->security->generateRandomString();
                $user->password_hash   = Yii::$app->security->generatePasswordHash($user->password);
                $user->status          = 1;
                $user->created_at      = time();
                $user->updated_at      = time();
                $user->email_confirmed = 1;
                if ($user->save()) {
                    $userCustom->use_fkuser = $user->id;
                    // if ($userCustom->save()) {
                    //     $userCustom = new UserCustom;
                    //     $user = new User;
                    // }
                    $userCustom->save();
                }
            }
        } else {
            $userCustom->loadDefaultValues();
        }

        return $this->render('index-datatable', compact('dataProvider', 'userCustom', 'user'));
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new UserCustom();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = UserCustom::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
