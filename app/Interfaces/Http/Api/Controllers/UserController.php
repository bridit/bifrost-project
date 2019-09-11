<?php

namespace App\Interfaces\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Bifrost\Http\Api\Controllers\Controller;
use App\Domain\Services\UserService;
use App\Application\Validation\UserValidator;

/**
 * Class UserController
 * @package App\Interfaces\Http\Api\Controllers
 */
class UserController extends Controller
{

  /**
   * UserController constructor.
   * @param UserService $userService
   */
  public function __construct(UserService $userService)
  {
    parent::__construct($userService);
  }

  /**
   * @return mixed
   */
  public function me()
  {
    return $this->response($this->getService()->findMe());
  }

  /**
   * @return mixed
   */
  public function store(Request $request)
  {
    $attributes = $this->request->all();
    $attributes['lang'] = is_not_empty($this->request->get('lang'))
                              ? $this->request->get('lang')
                              : 'PT-Br';
    $user = $this->getService()->create($attributes);

    return $this->response($user);
  }

  /**
   * @param Request $request
   * @return mixed
   */
  public function update($id, Request $request)
  {
    $data = $request->all();
    $user = $this->getService()->update($id,$data);

    return $this->response($user);
  }

  /**
   * @param $id
   * @return mixed
   */
  public function show($id)
  {
    $entity = $this->getService()->find($id);

    return $this->response($entity);
  }

  /**
   * @param $id
   * @return mixed
   */
  public function delete($id)
  {
    $user = $this->getService()->delete($id);

    return $this->response($user);
  }

  /**
   * @param Request $request
   * @return JsonResponse
   */
  public function resetPassword(Request $request)
  {
    $attributes = [
      'code' => $request->get('code'),
      'email' => $request->get('email'),
      'password' => $request->get('password')
    ];

    $errors = UserValidator::check('resetPassword', $attributes);

    if(is_not_empty($errors)){
      return response()->json(convert_json_detail($errors), 422);
    }

    $user = $this->getService()->resetPassword($this->request->all());

    return response()->json($user);
  }

}
