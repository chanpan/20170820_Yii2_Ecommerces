<?php

namespace backend\modules\persons\models;

/**
 * This is the ActiveQuery class for [[Nationality]].
 *
 * @see Nationality
 */
class NationalityQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Nationality[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Nationality|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}