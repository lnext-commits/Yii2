<?php
namespace common\models;

use Yii;
use yii\base\Model;
use yii\web\IdentityInterface;

/**
 * Login form
 */
class LoginForm extends Model implements IdentityInterface
{
    public $username;
    public $password;
    public $rememberMe = true;
    public $email;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password' , 'email'], 'string'],
            [['password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {

        if ($this->validate([])) {
            if ($user = $this->getUser()) {
                return Yii::$app->user->login($this->getUser(), 3600 * 24 * 30);
            }
        }

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {

        if($this->email == null){
            $this->email = $this->username;
        }else{
            $this->username=$this->email;
        }
        if ($this->_user === null) {
            $this->_user = \common\models\User::findByUsername($this->username);
        }

        if ($this->_user === null) {
            $this->_user = \common\models\User::findByEmail($this->email);
        }
        return $this->_user;
    }

    /**
     * @inheritDoc
     */
    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
    }

    /**
     * @inheritDoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return User::findOne(['access_token' => $token]);
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        // TODO: Implement getId() method.
    }

    /**
     * @inheritDoc
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    /**
     * @inheritDoc
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
}
