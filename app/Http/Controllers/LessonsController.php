<?php

namespace App\Http\Controllers;

use App\Acme\Transformers\LessonTransformer;
use App\Lesson;
use Illuminate\Http\Request;

class LessonsController extends ApiController {

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

		return $this->respond([
			'data' => $this->lessonTransformer->transformCollection($lessons->all())
		]);
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
			return $this->respondNotFound('Lesson does not exist');
		}

		return $this->respond([
			'data' => $this->lessonTransformer->transform($lesson)
		]);
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
