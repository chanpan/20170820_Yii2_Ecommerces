<?php

namespace backend\modules\persons\models;

/**
 * This is the ActiveQuery class for [[MilitaryStatus]].
 *
 * @see MilitaryStatus
 */
class MilitaryStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MilitaryStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MilitaryStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}