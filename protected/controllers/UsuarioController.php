<?php

class UsuarioController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main3';
	public $dir;

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
				'actions'=>array('index','view','create','update','admin','delete'),
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

/*	public function actionCreate()
	{
		 $model = new Usuario;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Usuario']))
        {
            $rnd = rand(0,9999);  // generate random number between 0-9999
            $model->attributes=$_POST['Usuario'];
 
            $uploadedFile=CUploadedFile::getInstance($model,'avatar');
            //$fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
             $fileName = $rnd.'-'.$uploadedFile;
            $model->avatar = $fileName;
 
            if($model->save())
            {
                $uploadedFile->saveAs(Yii::getPathOfAlias('webroot').'/users-images/'.$fileName);  // image will uplode to rootDirectory/banner/
                $this->redirect(array('view','id'=>$model->id));
            }
        }
        $this->render('create',array(
            'model'=>$model,
        ));
 
	}*/

	public function actionCreate()
 
    {
        $model = new Usuario;
        $msg = false;
        $mensaje = '';
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
 
        if (isset($_FILES['Usuario'])) {
 
            $model->attributes = $_FILES['Usuario'];

            $photos = CUploadedFile::getInstancesByName('Usuario[avatar]');
            // proceed if the images have been set
            if (isset($photos) && count($photos) > 0) {
 
                // go through each uploaded image
                foreach ($photos as $image => $pic) {
                	 $rnd = rand(0,9999);
                	 $fileName = $rnd.'-'.$pic->name;
                	 
                	 if($pic->saveAs(Yii::getPathOfAlias('webroot').'/users-images/'.$fileName)){
                	 	$model2 = new Usuario;
                	 	$model2->avatar = $fileName;
                	 	if($model2->save(false)){
                	 		$msg = true;
                	 		echo $mensaje = "Imagen almacenada";
                	 	}else{
                	 		echo $mensaje = "Imagen no almacenada";
                	 	}
                	 }
                }
                if($msg){
                	$this->redirect(array('index'));
                }
                

            }
 			
        }
        $this->render('create', array(
        	'mensaje' => $mensaje,
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->delete_image($id);
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Usuario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usuario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Usuario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Usuario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Usuario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function delete_image($id){
		$usuario = Usuario::model()->find(array(
    		'select'=>'avatar',
    		'condition'=>'id=:id',
    		'params'=>array(':id'=>$id),
		));

		if($usuario->avatar != ''){
			$path = Yii::getPathOfAlias('webroot').'/users-images/'.$usuario->avatar;
			if(file_exists($path)){
				unlink($path);
			}
		}
	}
}
