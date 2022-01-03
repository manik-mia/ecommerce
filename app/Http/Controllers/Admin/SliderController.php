<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slider::latest()->get();
        return view( 'admin.slider.index', compact( 'slides' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin.slider.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $request->validate( [
            'image'          => 'required | image',
            'title_en'       => 'nullable| min:5',
            'title_bn'       => 'nullable| min:5',
            'sub_title_en'   => 'nullable| min:5',
            'sub_title_bn'   => 'nullable| min:5',
            'description_en' => 'nullable| min:5',
            'description_bn' => 'nullable| min:5',
        ] );
        try {
            if ( $request->hasFile( 'image' ) )
            {
                $sliderImage = $request->file( 'image' );
                $imageName   = hexdec( uniqid() ) . '.' . $sliderImage->extension();
                Image::make( $sliderImage )->resize( 870, 370 )->save( 'uploads/slider/images/' . $imageName );
                $imageUrl = 'uploads/slider/images/' . $imageName;
            }
            Slider::create( [
                'image'          => $imageUrl,
                'title_en'       => $request->title_en,
                'title_bn'       => $request->title_bn,
                'sub_title_en'   => $request->sub_title_en,
                'sub_title_bn'   => $request->sub_title_bn,
                'description_en' => $request->description_en,
                'description_bn' => $request->description_bn,
            ] );
            return redirect()->route( 'slider.index' )->withSuccess( "{$request->title_en} Added Successfully" );
        }
        catch ( \Exception$e )
        {
            return redirect()->back()->withInput()->withError( $e->getMessage() );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $slideId )
    {
        $slide = Slider::findOrFail( $slideId );
        return view( 'admin.slider.edit-slide', compact( 'slide' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $slideId )
    {
        $request->validate( [
            'image'          => 'nullable | image',
            'title_en'       => 'nullable | min:5',
            'title_bn'       => 'nullable | min:5',
            'sub_title_en'   => 'nullable | min:5',
            'sub_title_bn'   => 'nullable | min:5',
            'description_en' => 'nullable | min:5',
            'description_bn' => 'nullable | min:5',
        ] );
        try {
            if ( $request->image != null )
            {
                if ( $request->hasFile( 'image' ) )
                {
                    $oldImage = Slider::findOrFail( $slideId );
                    unlink( $oldImage->image );
                    $sliderImage = $request->file( 'image' );
                    $imageName   = hexdec( uniqid() ) . '.' . $sliderImage->extension();
                    Image::make( $sliderImage )->resize( 870, 370 )->save( 'uploads/slider/images/' . $imageName );
                    $imageUrl = 'uploads/slider/images/' . $imageName;

                    Slider::findOrFail( $slideId )->update( [
                        'image'          => $imageUrl,
                        'title_en'       => $request->title_en,
                        'title_bn'       => $request->title_bn,
                        'sub_title_en'   => $request->sub_title_en,
                        'sub_title_bn'   => $request->sub_title_bn,
                        'description_en' => $request->description_en,
                        'description_bn' => $request->description_bn,
                    ] );
                }

            }
            else
            {
                Slider::findOrFail( $slideId )->update( [
                    'title_en'       => $request->title_en,
                    'title_bn'       => $request->title_bn,
                    'sub_title_en'   => $request->sub_title_en,
                    'sub_title_bn'   => $request->sub_title_bn,
                    'description_en' => $request->description_en,
                    'description_bn' => $request->description_bn,
                ] );
            }
            return redirect()->route( 'slider.index' )->withSuccess( "{$request->title_en} Updated Successfully" );
        }
        catch ( \Exception$e )
        {
            return redirect()->back()->withInput()->withError( $e->getMessage() );
        }
    }
    /**
     * Update the specified resource in storage.
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activeSlide( $slideId )
    {
        $title = Slider::findOrFail( $slideId )->title_en;
        Slider::findOrFail( $slideId )->update( [
            'status' => 1,
        ] );
        return redirect()->back()->withSuccess( "{$title} Is Active Now" );
    }
    /**
     * Update the specified resource in storage.
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inactiveSlide( $slideId )
    {
        $title = Slider::findOrFail( $slideId )->title_en;
        Slider::findOrFail( $slideId )->update( [
            'status' => 0,
        ] );
        return redirect()->back()->withSuccess( "{$title} is Inactive Now" );
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $slideId )
    {
        $slide = Slider::findOrFail( $slideId );
        unlink( $slide->image );
        $delete = Slider::findOrFail( $slideId )->delete();
        if ( $delete )
        {
            return redirect()->back()->withSuccess( 'Slide Deleted Successfully' );
        }
        else
        {
            return redirect()->back()->withError( 'Slide Delete Fail!!' );
        }
    }
}
