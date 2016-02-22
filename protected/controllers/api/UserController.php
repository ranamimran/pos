<?php

class UserController extends WRestController
{
    protected $_modelName = "user"; //model to be used as resource

    public function actions() //determine which of the standard actions will support the controller
    {
        return array(
            'list' => array( //use for get list of objects
                'class' => 'WRestListAction',
                'filterBy' => array( //this param used in `where` expression when forming an db query
                    'user_id' => 'user_id', // 'name_in_table' => 'request_param_name'
                ),
                'limit' => 'limit', //request parameter name which will contain a limit of object
                'page' => 'page', //request parameter name which will contain a requested page num
                'order' => 'order', //request parameter name which will contain ordering for sort
            ),
            'delete' => 'WRestDeleteAction',
            'get' => 'WRestGetAction',
            'create' => 'WRestCreateAction', //provide 'scenario' param
            'update' => array(
                'class' => 'WRestUpdateAction',
                'scenario' => 'update', //as well as in WRestCreateAction optional param
            ));
    }
    
    public function actionLogin()
    {
        $post = file_get_contents("php://input");
        $data = CJSON::decode($post, true);
        $response = array();

        if ($data) {
           $user_model = User::model()->findByAttributes(array('email'=>$data['email'], 'password'=>  md5($data['password'])));
            if ($user_model) {
                $member_arr=array();
                $members = User::model()->findAllByAttributes(array('parent_id'=>$user_model->user_id));
                foreach($members as $member)
                {
                    $member_arr[]=array(
                        "user_id"=>$member->user_id,  
                        "first_name"=>$member->first_name,  
                        "last_name"=>$member->last_name,  
                        "email"=>$member->email,  
                        "date_of_birth"=>$member->date_of_birth, 
                    );
                }
                $user_model = array(
                  "user_id"=>$user_model->user_id,  
                  "first_name"=>$user_model->first_name,  
                  "last_name"=>$user_model->last_name,  
                  "email"=>$user_model->email,  
                  "date_of_birth"=>$user_model->date_of_birth, 
                  "members"=>$member_arr, 
                );
                
                
                 $response = array(
                        'code' => 200,
                        'title' => 'success',
                        'message' => 'User login successfully.',
                        'data' => $user_model
                    );
                } else {
                    $response = array(
                        'code' => 404,
                        'title' => 'Bad Request',
                        'message' => 'Email or Password is Wrong.'
                    );
                }
            } else {
                $response = array(
                    'code' => 404,
                    'title' => 'Invalid User',
                    'message' => 'User not found.'
                );
            }
        $this->sendResponse(200, $response);
    }
    
    public function actionSignup()
    {
        $post = file_get_contents("php://input");
        $data = CJSON::decode($post, true);
        $response = array();
        if ($data) {
            $user_email = User::model()->findByAttributes(array('email' => $data['email']));
            if ($user_email) {
                $response = array(
                    'code' => 201,
                    'title' => 'User already registered',
                    'message' => 'User already registered with given email'
                );
            } else {
                $user_model = new User();
                $user_model->first_name = $data['first_name'];
                $user_model->last_name = $data['last_name'];
                $user_model->email = $data['email'];
                $user_model->password = md5($data['password']);
                $user_model->parent_id = '0';
                if ($user_model->save(false)) {
                    $user_data = array(
                        "user_id" => $user_model->user_id,
                        "first_name" => $user_model->first_name,
                        "last_name" => $user_model->last_name,
                        "email" => $user_model->email
                    );
                    $response = array(
                        'code' => 200,
                        'title' => 'success',
                        'message' => 'User saved successfully.',
                        'data' => $user_data
                    );
                } else {
                    $response = array(
                        'code' => 404,
                        'title' => 'Bad Request',
                        'message' => 'Bad Request.'
                    );
                }
            }


        } else {
            $response = array(
                'code' => 404,
                'title' => 'Invalid Data',
                'message' => 'Data not found'
            );
        }

        $this->sendResponse(200, $response);
    }

    public function actionUpdateProfile()
    {
        $post = file_get_contents("php://input");
        $data = CJSON::decode($post, true);
        $response = array();

        if ($data) {
            $user_id = $data['user_id'];
            if ($user_id) {
                $user_model = User::model()->findByPK($user_id);
                if ($user_model) {
					$user_model->qb_id = $data['quickblox_id'];
                    $user_model->date_of_birth = $data['date_of_birth'];
                    $user_model->phi_number = $data['phi_number'];
                    $user_model->shi_provider = $data['shi_provider'];
                    $user_model->shi_number = $data['shi_number'];
                    $user_model->delivery_address = $data['delivery_address'];
                    $user_model->address_2 = $data['address_2'];
                    $user_model->city = $data['city'];
                    $user_model->province = $data['province'];
                    $user_model->postal_code = $data['postal_code'];
                    $user_model->billing_address_1 = $data['billing_address_1'];
                    $user_model->billing_address_2 = $data['billing_address_2'];
                    $user_model->billing_city = $data['billing_city'];
                    $user_model->billing_province = $data['billing_province'];
                    $user_model->billing_postal_code = $data['billing_postal_code'];
                    $user_model->preferred_time = $data['preferred_time'];
                    $user_model->packagining = $data['packagining'];
                    $user_model->special_instruction = $data['special_instruction'];

                    if ($user_model->save(false)) {
                        $response = array(
                            'code' => 200,
                            'title' => 'success',
                            'message' => 'User saved successfully.',
                            'data' => $user_model
                        );
                    } else {
                        $response = array(
                            'code' => 404,
                            'title' => 'Bad Request',
                            'message' => 'Bad Request.'
                        );
                    }
                } else {
                    $response = array(
                        'code' => 404,
                        'title' => 'Invalid User',
                        'message' => 'User not found.'
                    );
                }
            } else {
                $response = array(
                    'code' => 404,
                    'title' => 'Invalid User',
                    'message' => 'User not found.'
                );
            }
        } else {
            $response = array(
                'code' => 404,
                'title' => 'Wrong Input',
                'message' => 'Please enter valid data.'
            );
        }

        $this->sendResponse(200, $response);
    }
    
    public function actionAddFamilyMember()
    {
        $post = file_get_contents("php://input");
        $data = CJSON::decode($post, true);
        $response = array();

        if ($data) {
            $user_id = $data['user_id'];
            if ($user_id) {
                $user_model = new User();
                if ($user_model) {
                    $user_model->first_name = $data['first_name'];
                    $user_model->last_name = $data['last_name'];
                    $user_model->date_of_birth = $data['date_of_birth'];
                    $user_model->relation = $data['relation'];
                    $user_model->phi_number = $data['phi_number'];
                    $user_model->shi_provider = $data['shi_provider'];
                    $user_model->shi_number = $data['shi_number'];
                    $user_model->delivery_address = $data['delivery_address'];
                    $user_model->address_2 = $data['address_2'];
                    $user_model->city = $data['city'];
                    $user_model->province = $data['province'];
                    $user_model->postal_code = $data['postal_code'];
                    $user_model->billing_address_1 = $data['billing_address_1'];
                    $user_model->billing_address_2 = $data['billing_address_2'];
                    $user_model->billing_city = $data['billing_city'];
                    $user_model->billing_province = $data['billing_province'];
                    $user_model->billing_postal_code = $data['billing_postal_code'];
                    $user_model->preferred_time = $data['preferred_time'];
                    $user_model->packagining = $data['packagining'];
                    $user_model->special_instruction = $data['special_instruction'];
                    $user_model->parent_id = $data['user_id'];
                    $user_model->updated_on = gmdate("Y-m-d H:i:s");
                    $user_model->created_on = gmdate("Y-m-d H:i:s");

                    if ($user_model->save(false)) {
                        $response = array(
                            'code' => 200,
                            'title' => 'success',
                            'message' => 'User saved successfully.',
                            'data' => $user_model
                        );
                    } else {
                        $response = array(
                            'code' => 404,
                            'title' => 'Bad Request',
                            'message' => 'Bad Request.'
                        );
                    }
                } else {
                    $response = array(
                        'code' => 404,
                        'title' => 'Invalid User',
                        'message' => 'User not found.'
                    );
                }
            } else {
                $response = array(
                    'code' => 404,
                    'title' => 'Invalid User',
                    'message' => 'User not found.'
                );
            }
        } else {
            $response = array(
                'code' => 404,
                'title' => 'Wrong Input',
                'message' => 'Please enter valid data.'
            );
        }

        $this->sendResponse(200, $response);
    }

    public function actionOrderPrescription()
    {
        $post = file_get_contents("php://input");
        $data = CJSON::decode($post, true);
        $response = array();
        if ($data) {
            $user_id = $data['user_id'];
            if ($user_id) {
                $user_model = User::model()->findByPk($user_id);
                if ($user_model) {
                    $order_model = new Orders();

                    $order_model->user_id = $data['user_id'];
                    $q = count(Orders::model()->findAll());
                    $next_auto_inc = $q + 1;
                    $order_model->mobile_order = 'A-' . $next_auto_inc;
                    $order_model->order_type = $data['order_type'];
                    $order_model->date_received = $data['date_received'];
                    $order_model->time_received = $data['time_received'];
                    $order_model->status = 'recieved';
                    $order_model->processed_on = '0';
                    $order_model->created_on = gmdate('Y-m-d H:i:s');
                    $order_model->updated_on = gmdate('Y-m-d H:i:s');
                    $images = $data['images'];

                    if ($order_model->save(false)) {
                        foreach ($images as $img) {
                            $order_images = new OrderImages();
                            $order_images->order_id = $order_model->getPrimaryKey();
                            $file_name = time() . rand(10000, 99999) . '.png';
                            $order_images->image_name = Util::saveimage($img, $file_name, 'png');
                            $order_images->save(false);
                        }
                        $response = array(
                            'code' => 200,
                            'title' => 'success',
                            'message' => 'Perscription submitted successfully.',
                            'data' => $order_model
                        );
                    } else {
                        $response = array('code' => 404, 'title' => 'Bad Request', 'message' => 'Bad Request.');
                    }
                } else {
                    $response = array('code' => 404, 'title' => 'Invalid User', 'message' => 'User not found.');
                }
            } else {
                $response = array('code' => 404, 'title' => 'Invalid User', 'message' => 'User not found.');
            }
        } else {
            $response = array('code' => 404, 'title' => 'Wrong Input', 'message' => 'Please enter valid data.');
        }

        $this->sendResponse(200, $response);
    }

}
