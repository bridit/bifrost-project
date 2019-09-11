<?php

namespace App\Interfaces\Http\Api\Controllers;

use Bifrost\Http\Api\Controllers\Controller;
use App\Domain\Services\PermissionService;
use App\Application\Validation\PermissionValidator;

/**
 * Class PermissionController
 * @package App\Interfaces\Http\Api\Controllers
 */
class PermissionController extends Controller
{

  /**
   * @var PermissionService
   */
  protected $service;

  /**
   * PermissionController constructor.
   * @param PermissionService $permissionService
   * @param PermissionValidator $permissionValidator
   */
  public function __construct(PermissionService $permissionService, PermissionValidator $permissionValidator)
  {
    parent::__construct($permissionService, $permissionValidator);
  }

}
