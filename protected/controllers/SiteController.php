<?php

class SiteController extends Controller
{

	public function actions()
	{
		return array(
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionrutas(){
		$model = MostrarPuntos::model()->findAll();
		$this->layout = 'main2';
		$this->render('rutas',array('model'=>$model,));
	}

	public function actionmapa(){
		$this->layout = 'main2';
		$this->render('mapa');
	}
	public function actionregmap(){
		$model = new MostrarPuntos;
		//$savePoint = Yii::app()->request->getParam('lat','long');
		$model->lat = $_POST['lat'];
		$model->long = $_POST['long'];
		$model->pos = $_POST['lat'].', '.$_POST['long'];
		$this->layout = 'main2';
		$model->save();
		echo "Posición guardada: ".$model->pos;
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	/**
	 * Displays the login page
	 */

	/**
	 * Logs out the current user and redirect to homepage.
	 */
}