<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "documento".
 *
 * @property integer $id_documento
 * @property string $nome
 */
class Documento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'documento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_documento' => 'Id Documento',
            'nome' => 'Nome',
        ];
    }

    /**
     * @inheritdoc
     * @return DocumentoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DocumentoQuery(get_called_class());
    }
}
