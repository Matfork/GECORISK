<?php

class IndicatorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		 // get all the indicators
        $indicators = Indicator::all();

        // load the view and pass the indicators
        return View::make('logicViews.indicators.index')->with('indicators', $indicators);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		 // load the create form (app/views/indicators/create.blade.php)
        return View::make('logicViews.indicators.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
			 // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'min_indicator'      => 'required',
            'max_indicator' => 'required',
            'color' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('indicator/create')->withErrors($validator)->withInput(Input::except('name'));
        } else {

            $indicator = new Indicator;
            $indicator->min_indicator= Input::get('min_indicator');
            $indicator->max_indicator= Input::get('max_indicator');
            $indicator->color 	= Input::get('color');
            
            $indicator->save();

			// redirect
            Session::flash('message', 'Successfully created indicator!');
            return Redirect::to('indicator');
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
			 // get the indicator
        $indicator = Indicator::find($id);
        // show the view and pass the indicator to it
        return View::make('logicViews.indicators.show')->with('indicator', $indicator);
	
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the indicator
        $indicator = Indicator::find($id);

        // show the edit form and pass the indicator
        return View::make('logicViews.indicators.edit')->with('indicator', $indicator);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
				// validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'min_indicator'      => 'required',
            'max_indicator' => 'required',
            'color' => 'required',
        );
     	$validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('indicators/' . $id . '/edit')
                ->withErrors($validator);
        } else {

            // store
            $indicator = Indicator::find($id);
 			$indicator->min_indicator= Input::get('min_indicator');
            $indicator->max_indicator= Input::get('max_indicator');
            $indicator->color 	= Input::get('color');
            $indicator->save();

            // redirect
            Session::flash('message', 'Successfully updated indicator!');
            return Redirect::to('indicator');
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
        $indicator = Indicator::find($id);
        $indicator->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the indicator!');
        return Redirect::to('indicator');
	
	}


}
