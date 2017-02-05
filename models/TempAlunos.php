<?php

namespace app\models;

use Yii;
use yii\db\Command;
use yii\web\Session;

/**
 * This is the model class for table "estado".
 *
 * @property string $matricula
 * @property string $nome
 *
 */
 
 /*
 Model para tabela temporária
 */
 
 
class TempAlunos extends \yii\db\ActiveRecord
{
   
   	public function __construct(){
		/*$session = Yii::$app->session;
		if (!$session->isActive) {
			$session->open();
			if(!$session->has("TempTable")){
				$session['TempTable']  = 't_alunos_' . (string) rand(1000,9999);
			}
		}*/
		if(!Yii::$app->session->has("TempTable")){
			Yii::$app->session["TempTable"] = 't_alunos_' . (string) rand(1000,9999);
		}
		$connection = Yii::$app->getDb();
		$tb = Yii::$app->session['TempTable'];
		//$lines = $connection->createCommand('CREATE TABLE IF NOT EXISTS ' . $tb . ' (matricula varchar(10) PRIMARY KEY, nome varchar(150) NOT NULL)')->execute();
		parent::__construct();
	}

   
	/**
     * @inheritdoc
     */
	public static function tableName()
    {
		$session = Yii::$app->session;
		if (!$session->isActive) {
			$session->open();
			if(!$session->has("TempTable")){
				$session['TempTable']  = 't_alunos_' . (string) rand(1000,9999);
			}
		}
		return $session['TempTable'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['matricula'], 'required'],
            [['matricula'], 'string', 'max' => 10],
			[['nome'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'matricula' => 'Matricula',
            'nome' => 'Nome',
        ];
    }

    /**
     * @inheritdoc
     * @return TempAlunosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TempAlunosQuery(get_called_class());
    }
}
