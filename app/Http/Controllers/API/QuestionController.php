<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Services\question\QuestionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller {

    private $questionService;

    public function __construct(QuestionService $questionService) {
        $this->questionService = $questionService;
    }

    public function index($course_id, $lesson_id) {
        try {
            return response()->json(array("success" => true, "questions" => $this->questionService->findAll($lesson_id)));
        } catch (\Exception $exception) {
            return response()->json(array("success" => false, "questions" => []));
        }
    }

    public function show($course_id, $lesson_id, $question_id) {
        try {
            return response()->json(array("success" => true, "question" => $this->questionService->findById($lesson_id, $question_id)));
        } catch (\Exception $exception) {
            return response()->json(array("success" => false, "questions" => []));
        }
    }

    public function store($course_id, $lesson_id, Request $request) {
        DB::beginTransaction();
        try {
            // TODO, hay validar antes de guardar info
            $this->questionService->store($lesson_id, $request->all());
            DB::commit();
            return response()->json(null, 201);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(array("success" => false, "message" => $exception->getMessage()), 500);
        }
    }

    public function update($course_id, $lesson_id, $question_id, Request $request) {
        DB::beginTransaction();
        try {
            $this->questionService->update($lesson_id, $question_id, $request->all());
            DB::commit();
            return response()->json(null, 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(array("success" => false, "message" => $exception->getMessage()), 500);
        }
    }

    public function delete($course_id, $lesson_id, $question_id) {
        DB::beginTransaction();
        try {
            $this->questionService->delete($lesson_id, $question_id);
            DB::commit();
            return response()->json(null, 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(array("success" => false, "message" => $exception->getMessage()), 500);
        }
    }

}