<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LessonsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index() {
		// really bad practice
		// 1) All is bad
		// 2) No way to attach meta data
		// 3) Linking db structure to API output
		// 4) No way to signal headers/response code
		$lessons = Lesson::all();

		return Response::json( [
			'data' => $this->transformCollection( $lessons )
		], 200 );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		$lesson = Lesson::find( $id );

		if ( ! $lesson ) {
			return Response::json( [
				'error' => [
					'message' => 'Lesson does not exist'
				]
			], 404 );
		}

		return Response::json( [
			'data' => $this->transform($lesson->toArray())
		], 200 );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
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
	public function update( Request $request, $id ) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		//
	}

// the transform method enables us to switch some_bool out later if needed
	private function transformCollection( $lessons ) {
		return array_map( [ $this, 'transform' ], $lessons->toArray() );
	}

	private function transform( $lesson ) {
		return [
			'title'  => $lesson['title'],
			'body'   => $lesson['body'],
			'active' => (boolean) $lesson['some_bool']
		];
	}
}
