<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use App\Services\lesson\LessonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller {

    private $lessonService;


    public function __construct(LessonService $lessonService) {
        $this->lessonService = $lessonService;
    }


    public function index($course_id) {
        try {
            return response()->json(array("success" => true, "lessons" => $this->lessonService->findAll($course_id)));
        } catch (\Exception $exception) {
            return response()->json(array("success" => false, "lessons" => []));
        }
    }

    public function show($course_id, $lesson_id) {
        try {
            return response()->json(array("success" => true, "lesson" => new LessonResource($this->lessonService->findById($course_id, $lesson_id))));
        } catch (\Exception $exception) {
            return response()->json(array("success" => false, "lessons" => []));
        }
    }

    public function store($course_id, Request $request) {
        DB::beginTransaction();
        try {
            // TODO, hay validar antes de guardar info
            $this->lessonService->store($course_id, $request->all());
            DB::commit();
            return response()->json(null, 201);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(array("success" => false, "message" => $exception->getMessage()), 500);
        }
    }

    public function update($course_id, $lesson_id, Request $request) {
        DB::beginTransaction();
        try {
            $this->lessonService->update($course_id, $lesson_id, $request->all());
            DB::commit();
            return response()->json(null, 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(array("success" => false, "message" => $exception->getMessage()), 500);
        }
    }

    public function delete($course_id, $lesson_id) {
        DB::beginTransaction();
        try {
            $this->lessonService->delete($course_id, $lesson_id);
            DB::commit();
            return response()->json(null, 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(array("success" => false, "message" => $exception->getMessage()), 500);
        }
    }

}