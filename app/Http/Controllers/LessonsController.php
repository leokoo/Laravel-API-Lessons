<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Acme\Transformers\LessonTransformer;

class LessonsController extends Controller {

	/**
	 * @var Acme\Transformers\LessonTransformer
	 */
	protected $lessonTransformer;

	/**
	 * LessonsController constructor.
	 * @param Acme\Transformers\LessonTransformer $lessonTransformer
	 */
	public function __construct(LessonTransformer $lessonTransformer)
	{
		$this->lessonTransformer = $lessonTransformer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index()
	{
		// really bad practice
		// 1) All is bad
		// 2) No way to attach meta data
		// 3) Linking db structure to API output
		// 4) No way to signal headers/response code
		$lessons = Lesson::all();

		return Response::json([
			'data' => $this->lessonTransformer->transformCollection($lessons->all())
		], 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$lesson = Lesson::find($id);

		if ( ! $lesson)
		{
			return Response::json([
				'error' => [
					'message' => 'Lesson does not exist'
				]
			], 404);
		}

		return Response::json([
			'data' => $this->lessonTransformer->transform($lesson)
		], 200);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}

}
