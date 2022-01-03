<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">
			@foreach ($categories as $category)
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{$category->category_icon}}" aria-hidden="true"></i>
					@if (Session::get('language')==='bangla')
						{{$category->category_name_bn}}
					@else
						{{$category->category_name_en}}
					@endif
				</a>
                 <ul class="dropdown-menu mega-menu">
					<li class="yamm-content">
						<div class="row">
							@foreach ($subCategories as $subCategory)
								@if ($subCategory->category_id===$category->id)
								<div class="col-sm-12 col-md-3">
									<h2 class="title">
										<a href="{{route('product.category',['id'=>$subCategory->id,'slug'=>$subCategory->subcategory_slug_en])}}">
											@if (session()->get('language')=='bangla')
												{{$subCategory->subcategory_name_bn}}
											@else
												{{$subCategory->subcategory_name_en}}
											@endif
										</a>
									</h2>
									<ul class="links list-unstyled"> 
										@foreach ($subSubCategories as $subSubCategory)
											@if ($subSubCategory->subcategory_id===$subCategory->id)
											<li>
												<a href="{{route('product.subSubCategory',['id'=>$subSubCategory->id,'slug'=>$subSubCategory->subsubcategory_slug_en])}}">
													@if (Session::get('language')==='bangla')
														{{$subSubCategory->subsubcategory_name_bn}}
													@else
														{{$subSubCategory->subsubcategory_name_en}}
													@endif
												</a>	
											</li>
											
											@endif
										@endforeach	
									</ul>
								</div><!-- /.col -->
								@endif
							@endforeach 
            				
						</div><!-- /.row -->
					</li><!-- /.yamm-content -->                    
				</ul><!-- /.dropdown-menu -->            
			</li><!-- /.menu-item -->
			@endforeach
          
        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->