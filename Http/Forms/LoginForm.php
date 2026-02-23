<?php

    namespace Http\Forms;
    use Core\Validator;
    use Core\Session;
    class LoginForm
    {
        public function validate($email, $password) :bool
        {
            if (!Validator::email($email)) {
                Session::flash('errors', 'Please provide a valid email address.');
            }

            if (!Validator::string($password, 8, 50)) {
                Session::flash('errors', 'Please provide a valid password.');
            }

            return (!Session::has('errors'));
        }
    }