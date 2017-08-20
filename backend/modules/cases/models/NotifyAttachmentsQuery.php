<?php

namespace backend\modules\cases\models;

/**
 * This is the ActiveQuery class for [[NotifyAttachments]].
 *
 * @see NotifyAttachments
 */
class NotifyAttachmentsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return NotifyAttachments[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return NotifyAttachments|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}