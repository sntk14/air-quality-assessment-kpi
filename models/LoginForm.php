<?php
    namespace app\models;

    use Yii;
    use yii\base\Model;

    /**
     * LoginForm is the model behind the login form.
     *
     * @property-read User|null $user This property is read-only.
     *
     */
    class LoginForm extends Model
    {

        public $login;
        public $password;
        public $rememberMe = true;
        private $_user = false;

        /**
         * @return array the validation rules.
         */
        public function rules()
        {
            return [               
                [['login', 'password'], 'required'],
                ['rememberMe', 'boolean'],               
                ['password', 'validatePassword'],
            ];
        }

        public function validatePassword($attribute, $params)
        {
            if (!$this->hasErrors()) {
                $user = $this->getUser();
                if (!$user || !$user->validatePassword($this->password)) {
                    $this->addError($attribute, 'Данные не верны');
                }
            }
        }


        public function login()
        {
            if ($this->validate()) {
                return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
            }
            return false;
        }

        public function getUser()
        {
            if ($this->_user === false) {

                $this->_user = User::find()
                    ->where(['login' => $this->login])
                    ->one();
            }

            return $this->_user;
        }

    }
    