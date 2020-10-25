<?php

namespace app\models;
    use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 */
class Server
{
    /**
     * {@inheritdoc}
     */

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by'], 'integer'],
        ];
    }

    public function Hello()
    {
        return 'привет';
    }
    public function getCategories()
    {
        return Categories::find()->all();
    }
    public function getCategoriesId($id)
    {
        return Categories::findOne(['id'=>$id]);
    }
    public function getCategoriesNotId($id)
    {
        return Categories::find()->where(['<>','id', $id])->asArray()->all();
    }

    public static function server()
    {
        $server = new \SoapServer(null, array('uri' => "http://lab6/soap/index"));
        $server->setObject(new Server());
        ob_start();
        $server->handle();
        $result = ob_get_contents();
        ob_end_clean();
        return $result;
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }
}
