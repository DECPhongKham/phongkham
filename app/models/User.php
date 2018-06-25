<?php
namespace App\Models;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation;
class User extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var integer
     */
    protected $role;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $birthday;

    /**
     *
     * @var string
     */
    protected $address;

    /**
     *
     * @var string
     */
    protected $account;

    /**
     *
     * @var string
     */
    protected $password;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field role
     *
     * @param integer $role
     * @return $this
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field birthday
     *
     * @param string $birthday
     * @return $this
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Method to set the value of field address
     *
     * @param string $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Method to set the value of field account
     *
     * @param string $account
     * @return $this
     */
    public function setAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Method to set the value of field password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field role
     *
     * @return integer
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field birthday
     *
     * @return string
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Returns the value of field address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Returns the value of field account
     *
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Returns the value of field password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("gdien");
        $this->setSource("user");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'user';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return User[]|User|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return User|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
    
    public function validation()
    {
        $validator = new Validation();
    
        $validator->add(
            'account',
            new Uniqueness(
                [
                    'model'   => $this,
                    'message' => 'Tên tài khoản này đã tồn tại',
                    'cancelOnFail' => true
                   
                ]
                )
            );
    
        return $this->validate($validator);
    }

}
