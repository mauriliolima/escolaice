<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "retorno".
 *
 * @property integer $id_retorno
 * @property string $nome_arquivo
 * @property integer $id_conta_corrente
 * @property integer $numero_linhas
 * @property date $data_retorno
 * @property integer $total_registrado
 * @property integer $total_baixado
 * @property integer $total_rejeitado
 * @property integer $id_agencia
 * @property integer $id_banco
 * @property string $inserido_por
 * @property string $inserido_em
 * @property string $alterado_por
 * @property string $alterado_em
 * 
 * @property ItemRetorno[] $itemRetornos
 */
class Retorno extends \yii\db\ActiveRecord
{
    
      
    /**
     * @inheritdoc
     */
    
    public static function tableName()
    {
        return 'retorno';
    }

    /**
    * @var UploadedFile
    */
    public $imageFile;
     
    public function rules()
    {
        return [
            //[['id_conta_corrente', 'inserido_em'], 'required'],
            [['id_conta_corrente', 'numero_linhas', 'total_registrado', 'total_baixado', 'total_rejeitado', 'id_agencia', 'id_banco'], 'integer'],
            [['data_retorno', 'inserido_em', 'alterado_em'], 'safe'],
            [['nome_arquivo'], 'string', 'max' => 255],
            [['inserido_por', 'alterado_por'], 'string', 'max' => 50],
            //[['imageFile'], 'file', 'skipOnEmpty' => false, ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_retorno' => 'Id Retorno',
            'nome_arquivo' => 'Nome Arquivo',
            'id_conta_corrente' => 'Id Conta Corrente',
            'numero_linhas' => 'Numero Linhas',
            'data_retorno' => 'Data de Retorno',
            'total_registrado' => 'Total Registrado',
            'total_baixado' => 'Total Baixado',
            'total_rejeitado' => 'Total Rejeitado',
            'id_agencia' => 'Id Agencia',
            'id_banco' => 'Id Banco',
            'inserido_por' => 'Inserido Por',
            'inserido_em' => 'Inserido Em',
            'alterado_por' => 'Alterado Por',
            'alterado_em' => 'Alterado Em',
            'imageFile' => 'Arquivo Retorno',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemRetornos()
    {
        return $this->hasMany(ItemRetorno::className(), ['id_retorno' => 'id_retorno']);
    }

    /**
     * @inheritdoc
     * @return RetornoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RetornoQuery(get_called_class());
    }
    
       
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('../uploads/arquivos-retorno/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
