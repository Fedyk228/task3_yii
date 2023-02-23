<?php

namespace app\controllers;

use app\models\Reviews;
use yii\web\Controller;
use app\models\Users;
use app\models\Citys;



class SiteController extends Controller
{

    public function actionIndex()
    {
        if($_GET['city'])
        {
            setcookie('city', $_GET['city'], time() + 30);

            echo "<script>window.location.assign('/web/?r=site/index')</script>";
        }

        if($_GET['p'] == 'logout')
        {
            unset($_SESSION['login']);

            echo "<script>window.location.assign('/web/?r=site/index')</script>";
        }


        $citys = Citys::find()->asArray()->orderBy(['name' => 'ASC'])->all();

        $reviews = null;
        $current_city = null;

        if(isset($_COOKIE['city']))
        {
            $reviews = Reviews::find()->select('*')->leftJoin(Users::tableName(), Reviews::tableName() . '.id_author = ' . Users::tableName() . '.id')->asArray()->where(['id_city' => $_COOKIE['city']])->all();
            $current_city = Citys::find()->asArray()->where(['id' => $_COOKIE['city']])->one();
        }

        return $this->render('index', ['citys' => $citys, 'reviews' => $reviews, 'current_city' => $current_city]);
    }

    public function actionRegister()
    {
        $model = new Users();

        $err = '';
        $notify = '';

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(empty($_POST['email']))
                $err = 'Empty Email';
            else if(empty($_POST['password']))
                $err = 'Empty Password';
            else if($_POST['password'] != $_POST['r_password'])
                $err = 'Repeat password incorrect';
            else
            {
                $exist = Users::find()->asArray()->where(['email' => $_POST['email']])->one();

                if($exist == null)
                {
                    $model->fio = $_POST['fio'];
                    $model->email = $_POST['email'];
                    $model->phone = $_POST['phone'];
                    $model->password = md5($_POST['password']);
                    $model->date_create = Date('d.m.Y - H:i');
                    $model->save();
                    $notify = 'Register success';
                }
                else
                {
                    $err = 'This Email is already';
                }

            }

        }

        return $this->render('register', ['notify' => $notify, 'err' => $err]);
    }

    public function actionLogin()
    {
        $err = '';

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
                $exist = Users::find()->asArray()->where(['email' => $_POST['email'], 'password' => md5($_POST['password'])])->one();

                if($exist)
                {
                    $_SESSION['login'] = $exist;
                    echo "<script>window.location.assign('/web/?r=site/index')</script>";
                }
                else
                {
                    $err = 'Incrorrect login or password';
                }

        }

        return $this->render('login', ['err' => $err]);
    }

    public function actionAddReview()
    {
        $notify = '';

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(!isset($_COOKIE['city']))
            {
                echo "<script>window.location.assign('/web/?r=site/index')</script>";
                return;
            }

            $filename = '';

            if(!empty($_FILES['img']['name'])) {
                $ext = strtolower(array_pop(explode('.', $_FILES['img']['name'])));
                $filename = 'img' . time() . '.' . $ext;

                move_uploaded_file($_FILES['img']['tmp_name'], '../upload/' . $filename);
            }

            $model = new Reviews();
            $model->id_city = $_COOKIE['city'];
            $model->title = $_POST['title'];
            $model->text = $_POST['text'];
            $model->rating = $_POST['rating'];
            $model->img = $filename;
            $model->id_author = $_SESSION['login']['id'];
            $model->date_create = Date('d.m.Y - H:i');
            $model->save();

            $notify = 'Add review success!';

        }


        return $this->render('add-review', ['notify' => $notify]);
    }

}
