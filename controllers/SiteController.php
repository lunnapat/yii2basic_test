<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {   $array = ['fname'=>'สมชาย','lname'=>'ใจดี','email'=>'dkfjpweie'];
//                    ['fname'=>'สมหญิง','lname'=>'ใจงาม','email'=>'erprrrrrp'];
//                  ]
        print_r($array);
        echo '<hr>';
//        
//        
////        foreach ($array as $i => $r) {
////            echo $value.'<br>';
////        }
//        die();
        //return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionTest() 
    {
        $a=30;
        $b=54;
        $c=$a+$b;
        
        $arr=['1','2','3'];
        //ส่งค่า array ไปหน้า view test 
//        return $this->render('test',['cat'=> $c,'ar'=> $arr]);
        
        $title = 'ทดสอบ Controller and View';
        
        $person = [
            ['fname' => 'สมชาย', 'lname' => 'ใจดี', 'email' => 'som@hotmail.com'],
            ['fname' => 'สมหญิง', 'lname' => 'ใจงาม', 'email' => 'ying@hotmail.com']
        ];


        return $this->render('test', ['cat' => $c,
                    'ar' => $arr,
                    'person' => $person,
                    'title' => $title,
                        ]
        );
    }
}
