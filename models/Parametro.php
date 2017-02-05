<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parametro".
 *
 * @property string $nome
 * @property integer $tipo_dado
 * @property string $modelo
 * @property string $chave
 * @property string $valor_exibicao
 * @property string $descricao
 */
class Parametro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parametro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'tipo_dado', 'descricao'], 'required'],
            [['tipo_dado'], 'integer'],
            [['nome', 'modelo', 'chave', 'valor_exibicao'], 'string', 'max' => 40],
            [['descricao'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nome' => 'Nome do Parâmetro',
            'tipo_dado' => '1 Inteiro/2 Data/3 Decimal/4 Textual/5 Lógico',
            'modelo' => 'Classe do Modelo que ela representa',
            'chave' => 'Chave primária para localização',
            'valor_exibicao' => 'nome do campo a ser exibido em uma busca',
            'descricao' => 'Descrição',
        ];
    }

    /**
     * @inheritdoc
     * @return ParametroQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ParametroQuery(get_called_class());
    }
}
