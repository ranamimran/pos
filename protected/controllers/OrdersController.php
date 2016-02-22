<?php

class OrdersController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view','admin','Processed', 'ProcessedSuccessfully', 'Chat', 'Search'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Orders;
        
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Orders'])) {
            $model->attributes = $_POST['Orders'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->order_id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Orders'])) {
            $model->attributes = $_POST['Orders'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->order_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Orders');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Orders('search');
        $model->unsetAttributes();  // clear any default values
        $model->status = 'recieved';
        if (isset($_GET['Orders'])) {
            $model->attributes = $_GET['Orders'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionProcessed()
    {
        $model = new Orders('search');
        $model->unsetAttributes();  // clear any default values
        //$model->admin_id != -1;
        $model->status = 'processed';
        if (isset($_GET['Orders']))
            $model->attributes = $_GET['Orders'];
        $this->render('processed', array(
            'model' => $model,
        ));
    }

    public function actionProcessedSuccessfully()
    {

        $order_id = $_REQUEST['order_id'];
        $order = Orders::model()->findByPk($order_id);
        if ($order) {
            $order->processed_on = gmdate("Y-m-d H:i:s");
            $order->admin_id = Yii::app()->session['adminSession']['id'];
            $order->status = 'processed';
            if ($order->save(false)) {
                if(Yii::app()->request->isAjaxRequest)
                    $this->redirect(array("admin"));
                else
                    $this->redirect(array("admin"));

            }
        }
    }

    public function actionChat()
    {
        $model = new Orders('search');
//		$dataa = SendMessageChat::sensms();
        $this->render('chat', array('model' => $model,));
    }

    public function actionSearch()
    {
        $model = new Orders('search');
        $this->render('search', array('model' => $model,));
    }
    
    
        protected function gridUserName($data,$row)
        {
            $user=  User::model()->findByPk($data['user_id']);
            if($user->parent_id)
            {
                $parent=  User::model()->findByPk($user->parent_id);
                return $parent->first_name. ' ' . $parent->last_name;   
//                return 'Self';
            }  else {
                return $user->first_name. ' ' . $user->last_name;
//                return 'Self';
            }            
        }
    
    
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Orders the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Orders::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Orders $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'orders-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
