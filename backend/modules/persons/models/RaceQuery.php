<?php

namespace backend\modules\persons\models;

/**
 * This is the ActiveQuery class for [[Race]].
 *
 * @see Race
 */
class RaceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Race[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Race|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}