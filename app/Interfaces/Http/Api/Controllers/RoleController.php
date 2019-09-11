<?php

namespace App\Interfaces\Http\Api\Controllers;

use Illuminate\Http\JsonResponse;
use Bifrost\Http\Api\Controllers\Controller;
use App\Domain\Services\RoleService;

/**
 * Class RoleController
 * @package App\Interfaces\Http\Api\Controllers
 */
class RoleController extends Controller
{

  /**
   * @var RoleService
   */
  protected $service;

  /**
   * RoleController constructor.
   * @param RoleService $roleService
   */
  public function __construct(RoleService $roleService)
  {
    parent::__construct($roleService);
  }

//  /**
//   * @return mixed
//   */
//  public function store()
//  {
//    $data = [
//      'name' => $this->request->get('name'),
//      'description' => $this->request->get('description'),
//      'permissions' => $this->request->get('permissions', []),
//    ];
//
//    $role = $this->getService()->create($data);
//
//    return $this->response($role);
//  }
//
//  /**
//   * @param $id
//   * @return mixed
//   * @throws \Exception
//   */
//  public function update($id)
//  {
//    $data = [
//      'id' => $id,
//      'name' => $this->request->get('name'),
//      'description' => $this->request->get('description'),
//      'permissions' => $this->request->get('permissionIds', []),
//    ];
//
//    $role = $this->service->update($data);
//
//    return $this->response($role);
//  }
//
//  /**
//   * @param mixed $id
//   * @return JsonResponse
//   */
//  public function show($id)
//  {
//    $entity = $this->service->find($id);
//
//    return $this->response($entity);
//  }
}
