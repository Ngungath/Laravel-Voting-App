@extends('layouts.election-template')
@section('content')

@if($isWithinNominationPeriod=='yes')

@if(isset($hasNominatedBefore) && $hasNominatedBefore !=0) 

<div class="banner-bottom">
        <div class="container text-center">
        <div class="row" style=" margin-top: 30px;">
            <center></center><h1> <span class="glyphicon glyphicon-play" style="color: grey; font-size: 30px;"></span> You nominated <b>{{$nomination->name}}</b></h1>
            <br>
            <small><span class="glyphicon glyphicon-thumbs-up" style="color: grey; font-size: 15px;"> </span>Under the category <b>{{$categories->name}}</b></small>
           </div>
            <div class="wmuSlider example1">
                <div class="wmuSliderWrapper">
                    <article style=""> 
                        <div class="banner-wrap">
                            <div class="about-grids">
                            
                                <div class="col-md-4 about-grid col-md-offset-4">
                                    <br>
                                    <div class="about-grid1">
                                        <figure class="thumb">
                                            <img style="max-height: 250px; min-height: 250px;" src="{{asset('storage/upload/images/'.$nomination->image)}}" alt=" " class="img-responsive" />
                                            <figcaption class="caption">
                                                <h3><a href="#">{{$nomination->name}}</a></h3>
                                                <span>{{$nomination->business_name}}</span>
                                                <p> {{$nomination->reason_for_nomination}}.</p>                    
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>                          
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>

@endif
@if(!isset($hasNominatedBefore) || $hasNominatedBefore ==0)
    <div class="contact">
        <div class="container col-md-offset-3">
            <div class="" style=" margin-top: 30px;">
            <h1>Nominate a candidate in <b>{{$categories->name}}</b></h1>
             </div>
            <div class="contact-grid">
                <div class="col-md-7 contact-right">
                    <form method="post" action="{{route('nominations.store')}}" enctype="multipart/form-data">
    
                        <input type="text" name="name" placeholder="Name" required=" ">
                        <input type="text" name="bio" placeholder="Short Bio" maxlength="100">
                        <input type="text" name="linkedin_url" placeholder="(Optional) Linkedin url">
                        <input type="text" name="business_name" placeholder="Business Name" required="">
                        <div class="clearfix"> </div>
                        <textarea name="reason_for_nomination" placeholder="Reason for nomination........." required=" " maxlength="150" rows="2"></textarea>
                         <input type="hidden" name="category_id" value="{{$categories->id}}">
                         <br>
                        <div class="row">
                        <div class="form-group col-md-6">
                        <label class="control-label">Upload image of candidate :</label>
                        <input type="file" name="image" required="" class="form-control">
                        </div>
                         <div class="form-group col-md-6">
                        <label class="control-label">Gender</label>
                        <select id="gender" name="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>        
                        </select>
                        </div>
                        </div>
                        @if(Auth::user()->role_id==4)
                        <div class="row">
                        <div class="form-group col-md-6">
                        <label class="control-label">Selected ?</label>
                        <input type="checkbox" name="is_admin_selected" value="1" class="form-control">
                        </div>
                         <div class="form-group col-md-6">
                        <label class="control-label">Won ?</label>
                        <input type="checkbox" name="is_won" value="1" class="form-control">
                        </div>
                        </div>
                        @endif
                         {{csrf_field()}}
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
 @endif
@elseif($isWithinVottingPeriod=='yes')

<!-- 
check if admin has selected any candidate for vitting
-->
@if(isset($nomination_selected))


<div class="text-center" style=" margin-top: 30px;">
    <h1>Vote for a candidate</h1>
    @if(isset($checkVotes))
    <br>
    <small>Yo have voted in this category</small>
    @endif
</div>
<div class="banner-bottom">
        <div class="container">
            <div class="wmuSlider example1">
                <div class="wmuSliderWrapper">
                    <article style=""> 
                        <div class="banner-wrap">
                            <div class="about-grids">
                            @foreach($nomination_selected as $nomination)
                                <div class="col-md-4 about-grid">
                                    <br>
                                    <div class="about-grid1">
                                        <figure class="thumb">
                                            <img style="max-height: 250px; min-height: 250px;" src="{{asset('storage/upload/images/'.$nomination->image)}}" alt=" " class="img-responsive" />
                                            <figcaption class="caption">
                                                <h3><a href="#">{{$nomination->name}}</a></h3>
                                                <span>{{$nomination->business_name}}</span>
                                                <p> {{$nomination->reason_for_nomination}}.</p>
                                                @if(!isset($checkVotes))
                                                 <li><a href="{{route('nominations.vote',['category_id'=>$nomination->category_id,'nomination_id'=>$nomination->id])}}" class="btn btn-primary btn-block" style="color: white; font-weight: bold;">Vote</a></li>

                                                 @elseif($checkVotes['nomination_id'] == $nomination->id)
                                                 <li><button class="btn btn-success btn-block" style="color: white; font-weight: bold;">Voted !</button> </li>
                                                 @endif
                                               
                                            
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>

                            @endforeach


                                <div class="clearfix"> </div>

                            </div>
                          
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
<!-- //banner-bottom -->
@endif
@endif
<div class="text-center">
    @if(isset($previousCategory))
    <a href="/categories/{{$previousCategory->id}}" class="col-md-5"><span class="btn btn-default">{{$previousCategory->name}}</span> << Previous Category</a>
    @endif

    @if(isset($nextCategory))
    <a href="/categories/{{$nextCategory->id}}" class="col-md-5">Next Category >> <span class="btn btn-primary">{{$nextCategory->name}}</span></a>
    @endif  
</div>
@endsection
