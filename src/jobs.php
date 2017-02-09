<?php

    class Job
    {
        private $previous_title;
        private $previous_description;
        private $previous_pay;
        private $reason_for_leaving;

        function __construct($previous_title, $previous_description, $previous_pay, $reason_for_leaving)
        {
          $this->previous_title = $previous_title;
          $this->previous_description = $previous_description;
          $this->previous_pay = $previous_pay;
          $this->reason_for_leaving = $reason_for_leaving;
        }

        function setTitle($new_previous_title)
        {
            $this->previous_title = (string) $new_previous_title;
        }
        function getTitle()
        {
            return $this->previous_title;
        }

        function setDescription($new_previous_description)
        {
            $this->previous_description = (string) $new_previous_description;
        }

        function getDescription()
        {
          return $this->previous_description;
        }

        function getPay()
        {
            return $this->previous_pay;
        }

        function setPay($new_previous_pay)
        {
            $this->previous_pay = (string) $new_previous_pay;
        }

        function getLeaving()
        {
            return $this->reason_for_leaving;
        }

        function setLeaving($new_reason_for_leaving)
        {
            $this->reason_for_leaving = (string) $new_reason_for_leaving;
        }

        function save()
        {
            array_push($_SESSION['job_array'], $this);
        }

        static function getAll()
        {
            return $_SESSION['job_array'];
        }

        static function clearAll()
        {
            return $_SESSION['job_array'] = array();
        }
    }

?>
