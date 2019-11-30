<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\course\CourseService;
use App\Utils\StatusKeys;
use Illuminate\Http\Request;

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
        try {
            // TODO, hay validar antes de guardar info
            $this->courseService->store($request->all());
            return response()->json(null, 201);
        } catch (\Exception $exception) {
            return response()->json(array("success" => false, "message" => $exception->getMessage()), 500);
        }
    }

    public function update($id, Request $request) {
        try {
            $this->courseService->update($id, $request->all());
            return response()->json(null, 200);
        } catch (\Exception $exception) {
            return response()->json(array("success" => false, "message" => $exception->getMessage()), 500);
        }
    }

    public function delete($id) {
        try {
            $this->courseService->delete($id);
            return response()->json(null, 200);
        } catch (\Exception $exception) {
            return response()->json(array("success" => false, "message" => $exception->getMessage()), 500);
        }
    }
}
