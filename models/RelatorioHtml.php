<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "relatorio_html".
 *
 * @property integer $id_relatorio_html
 * @property string $nome
 * @property string $conteudo
 */
class RelatorioHtml extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'relatorio_html';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['conteudo'], 'string'],
            [['nome'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_relatorio_html' => 'Identificador do relatório',
            'nome' => 'Nome do Relatório',
            'conteudo' => 'Conteudo',
        ];
    }

    /**
     * @inheritdoc
     * @return RelatorioHtmlQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RelatorioHtmlQuery(get_called_class());
    }
}
