<?php

namespace app\modules\base\models;

use Yii;
use yii\base\Model;
use app\modules\base\models\Usuario;

/**
 * LoginForm is the model behind the login form.
 *
 * @property Usuario $user This property is read-only.
 *
 */
class LoginForm extends Model
{

    public $username;
    public $password;
    public $rememberMe = true;
    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [ [ 'username', 'password' ], 'required' ],
            // rememberMe must be a boolean value
            [ 'rememberMe', 'boolean' ],
            // password is validated by validatePassword()
            [ 'password', 'validatePassword' ],
        ];

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Usuário',
            'password' => 'Senha',
            'rememberMe' => 'Lembrar-me'
        ];

    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword( $attribute, $params )
    {
        if ( ! $this->hasErrors() )
        {
            $user = $this->getUser();

            if ( ! $user || ! $user->validatePassword($this->password) )
            {
                $this->addError($attribute, 'Usuário ou senha incorretos!');
            }
        }

    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ( $this->validate() )
        {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;

    }

    /**
     * Finds user by [[username]]
     *
     * @return Usuario|null
     */
    public function getUser()
    {
        if ( $this->_user === false )
        {
            $this->_user = Usuario::findByUsername($this->username);
        }

        return $this->_user;

    }

}
