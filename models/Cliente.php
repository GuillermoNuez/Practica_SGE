<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $idCliente
 * @property integer $fk_idTipoCliente
 * @property string $nombreCompleto
 * @property string $nombreNegocio
 * @property string $nombreResponsable
 * @property string $correo
 * @property string $fechaRegistro
 * @property string $telefono
 * @property string $direccion
 * @property string $nitCi
 * @property string $codigoCliente
 * @property integer $enable
 * @property integer $fk_idSucursal
 *
 * @property Sucursal $fkIdSucursal
 * @property Tipocliente $fkIdTipoCliente
 * @property Ordenctp[] $ordenctps
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_idTipoCliente', 'enable', 'fk_idSucursal'], 'integer'],
            [['nombreCompleto', 'nombreNegocio', 'fechaRegistro', 'telefono', 'codigoCliente', 'enable'], 'required'],
            [['fechaRegistro'], 'safe'],
            [['nombreCompleto', 'nombreNegocio', 'nombreResponsable'], 'string', 'max' => 100],
            [['correo', 'direccion'], 'string', 'max' => 150],
            [['telefono'], 'string', 'max' => 30],
            [['nitCi'], 'string', 'max' => 20],
            [['codigoCliente'], 'string', 'max' => 45],
            [['fk_idSucursal'], 'exist', 'skipOnError' => true, 'targetClass' => Sucursal::className(), 'targetAttribute' => ['fk_idSucursal' => 'idSucursal']],
            [['fk_idTipoCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Tipocliente::className(), 'targetAttribute' => ['fk_idTipoCliente' => 'idTipoCliente']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCliente' => 'Id Cliente',
            'fk_idTipoCliente' => 'Fk Id Tipo Cliente',
            'nombreCompleto' => 'Nombre Completo',
            'nombreNegocio' => 'Nombre Negocio',
            'nombreResponsable' => 'Nombre Responsable',
            'correo' => 'Correo',
            'fechaRegistro' => 'Fecha Registro',
            'telefono' => 'Telefono',
            'direccion' => 'Direccion',
            'nitCi' => 'Nit Ci',
            'codigoCliente' => 'Codigo Cliente',
            'enable' => 'Enable',
            'fk_idSucursal' => 'Fk Id Sucursal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkIdSucursal()
    {
        return $this->hasOne(Sucursal::className(), ['idSucursal' => 'fk_idSucursal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkIdTipoCliente()
    {
        return $this->hasOne(Tipocliente::className(), ['idTipoCliente' => 'fk_idTipoCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenctps()
    {
        return $this->hasMany(Ordenctp::className(), ['fk_idCliente' => 'idCliente']);
    }
}
