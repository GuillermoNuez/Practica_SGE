<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form about `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUser', 'status', 'created_at', 'updated_at', 'enable', 'role', 'fk_idUser', 'fk_idSucursal'], 'integer'],
            [['username', 'password', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'apellido', 'nombre', 'CI', 'telefono', 'email2', 'fechaRegistro', 'fechaUltimoAcceso', 'fechaAcceso'], 'safe'],
            [['salario'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = User::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idUser' => $this->idUser,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'enable' => $this->enable,
            'role' => $this->role,
            'salario' => $this->salario,
            'fechaRegistro' => $this->fechaRegistro,
            'fechaUltimoAcceso' => $this->fechaUltimoAcceso,
            'fechaAcceso' => $this->fechaAcceso,
            'fk_idUser' => $this->fk_idUser,
            'fk_idSucursal' => $this->fk_idSucursal,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'CI', $this->CI])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'email2', $this->email2]);

        return $dataProvider;
    }
}