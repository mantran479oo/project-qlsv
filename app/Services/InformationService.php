<?php

namespace App\Services;

use Carbon\Carbon;
use App\Repositories\Repository\Interfaces\InformationRepositoryInterface;

class InformationService
{
    protected $InformationRepository;
    public function __construct(InformationRepositoryInterface  $InformationRepositoryInterface)
    {
        $this->InformationRepository = $InformationRepositoryInterface;
    }

    /**
     * Hiển thị thông tin
     * @return Collection
     */
    public function showInformation()
    {
        return $this->InformationRepository->listInformation();
    }

    /**
     * get product coverage
     * @param int $id   
     * @param Request $request
     * @return Collection
     */
    public function postInformation($request, $id)
    {
        $pin  = mt_rand(100, 9999) . mt_rand(0, 99);
        $code = Carbon::now()->month . str_shuffle($pin);
        $value = [
            'id' => $id,
            'student_code' => $code,
            'name' => $request->name,
            'date' => $request->date,
            'olds' => 15,
            'class_code' => $request->class_code,
            'hobby' => $request->hobby,
            'gender' => $request->gender,
            'address' => $request->address
        ];

        return $this->InformationRepository->create($value);
    }

    /**
     * get product coverage
     * @param int $id   
     * @return Collection
     */
    public function showProfile($id)
    {
        return $this->InformationRepository->myProfile($id);
    }
}