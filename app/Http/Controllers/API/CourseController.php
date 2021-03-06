<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\course\CourseService;
use App\Utils\StatusKeys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller {

    private $courseService;


    public function __construct(CourseService $courseService) {
        $this->courseService = $courseService;
    }


    public function index() {
        try {
            return response()->json(array("success" => true, "courses" => $this->courseService->findAll()));
        } catch (\Exception $exception) {
            return response()->json(array("success" => false, "courses" => []));
        }
    }

    public function show($id) {
        try {
            return response()->json(array("success" => true, "course" => $this->courseService->findById($id)));
        } catch (\Exception $exception) {
            return response()->json(array("success" => false, "course" => []));
        }
    }

    public function store(Request $request) {
        DB::beginTransaction();
        try {
            // TODO, hay validar antes de guardar info
            $this->courseService->store($request->all());
            DB::commit();
            return response()->json(null, 201);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(array("success" => false, "message" => $exception->getMessage()), 500);
        }
    }

    public function update($id, Request $request) {
        DB::beginTransaction();
        try {
            $this->courseService->update($id, $request->all());
            DB::commit();
            return response()->json(null, 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(array("success" => false, "message" => $exception->getMessage()), 500);
        }
    }

    public function delete($id) {
        DB::beginTransaction();
        try {
            $this->courseService->delete($id);
            DB::commit();
            return response()->json(null, 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(array("success" => false, "message" => $exception->getMessage()), 500);
        }
    }
}
