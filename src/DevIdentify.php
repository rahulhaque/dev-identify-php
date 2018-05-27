<?php

namespace DevIdentify;

class DevIdentify
{
    private $email, $output, $result = [], $location;

    private static $_instance;

    /**
     * Validate email and make request to devidentify with email
     *
     * @param $email
     * @return DevIdentify
     */
    public static function email($email)
    {
        self::$_instance = new self();

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            self::$_instance->result = ["success" => false, "error" => "Invalid email format"];
            return self::$_instance;
        }

        self::$_instance->email = $email;
        $data = @file_get_contents("https://api.devidentify.com/" . self::$_instance->email);
        self::$_instance->result = json_decode($data, true);
        return self::$_instance;
    }

    /**
     * Save the fetched image in the local drive
     *
     * @param $location
     * @return $this
     */
    public function save($location)
    {
        $this->location = $location;
        if ($this->result['success']) {
            if (@copy(preg_replace('/\?sz=500$/', '', $this->result['profile_picture']), $this->location)) {
                $this->result = ['success' => true, 'directory' => $this->location];
            } else {
                $this->result = ['success' => false, 'directory' => $this->location, 'error' => 'Could not save to drive'];
            }
        }
        return $this;
    }

    /**
     * Return the result as array
     *
     * @return array
     */
    public function toArray()
    {
        return $this->output = $this->result;
    }

    /**
     * Return the result as json
     *
     * @return string
     */
    public function toJson()
    {
        return $this->output = json_encode($this->result);
    }

}