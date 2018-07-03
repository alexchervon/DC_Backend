<?php
namespace Controllers;
use Aura\Filter\FilterFactory;
use Models\Model_Form;

class Controller_Form
{
    public $model = null;
    public $data = array();

    function __construct()
    {
        $this->model = new Model_Form();
    }

    public function Validate()
    {
        $filter_factory = new FilterFactory();
        $filter = $filter_factory->newSubjectFilter();

        if (isset($_POST['name'])){
            $filter->validate('name')
                ->isNotBlank()
                ->asSoftRule('Имя пользователя введено не верно!');
        }

        if (isset($_POST['number'])){
            $filter->validate('number')
                ->is('regex',"/^[0-9]{10,11}+$/")
                ->asSoftRule('Номер телефона введен не верно!');
        }

        if (isset($_POST['email'])){
            $filter->validate('email')
                ->is('email')
                ->asSoftRule('Электронная почта введена не верно!');
        }


        $success = $filter->apply($_POST);
        $failures = $filter->getFailures();

        if (!$success) {
            $error = array(
                'success'=>false,
                'errors'=>$failures->getMessages()
            );

            echo json_encode($error);
            die();
        } else {
            echo json_encode(array('success'=>true));
        }


    }

}