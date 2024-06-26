<?php
// PHP8.3
declare(strict_types=1);

class ZzzSample extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $zzz_sample_id;

    /**
     *
     * @var string
     */
    public $zzz_sample_cd;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $kind;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("common");
        $this->setSource("zzz_sample");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ZzzSample[]|ZzzSample|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ZzzSample|\Phalcon\Mvc\Model\ResultInterface|\Phalcon\Mvc\ModelInterface|null
     */
    public static function findFirst($parameters = null): ?\Phalcon\Mvc\ModelInterface
    {
        return parent::findFirst($parameters);
    }
}
