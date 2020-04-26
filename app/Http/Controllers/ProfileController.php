<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Support\Str;
use App\Http\Requests\ProfileRequest;
use App\Profile;

class ProfileController extends Controller
{
		public function __construct()
		{
				$this->middleware('auth');
		}
     /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
		return view('auth.profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
			return view('auth.profiles.edit', compact('profile'));
    }
		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \App\Http\Requests\ProfileRequest;  $request
		 * @param  \App\Profile  $profile
		 * @return \Illuminate\Http\Response
		 */
    public function update(ProfileRequest $request, Profile $profile)
    {

    	$data  = $request->all();
        // Poner el campo del Modelo Profile(en este caso es image_id)
    	if($file = $request->file('image_id'))
    	{
					$name = Str::snake($file->getClientOriginalName());
					$file->move('images',$name);
          $image = Image::create(['ruta' => $name]);
          $data['image_id'] = $image->id;
    	}

      $profile->update($data);

    	return redirect()->route('account.show',$profile)->with('success','Actualizaste tu Perfil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
