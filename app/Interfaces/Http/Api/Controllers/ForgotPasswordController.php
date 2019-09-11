<?php

namespace App\Interfaces\Http\Api\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use App\Domain\Services\ForgotPasswordService;
use App\Application\Validation\ForgotPasswordValidator;

/**
 * Class ForgotPasswordController
 * @package App\Interfaces\Http\Api\Controllers
 */
class ForgotPasswordController extends Controller
{

  /**
   * @var ForgotPasswordService $service
   */
  protected $service;

  /**
   * ForgotPasswordController constructor.
   */
  public function __construct()
  {
    $this->service = app(ForgotPasswordService::class);
  }

  /**
   * @param Request $request
   * @return JsonResponse
   */
  public function store(Request $request)
  {
    $attributes = [
      'email' => $request->get('email'),
    ];

    $errors = ForgotPasswordValidator::check('store', $attributes);

    if(is_not_empty($errors)){
      return response()->json(convert_json_detail($errors), 422);
    }

    $forgotPassword = $this->service->create($request->all());

    return response()->json($forgotPassword);
  }

  /**
   * @param Request $request
   * @return JsonResponse
   */
  public function verifyCode(Request $request)
  {
    $attributes = [
      'email' => $request->get('email'),
      'code' => $request->get('code')
    ];

    $errors = ForgotPasswordValidator::check('verifyCode', $attributes);

    if(is_not_empty($errors)){
      return response()->json(convert_json_detail($errors), 422);
    }

    $forgotPassword =  $this->service->verifyCode();

    return response()->json($forgotPassword);
  }
}
