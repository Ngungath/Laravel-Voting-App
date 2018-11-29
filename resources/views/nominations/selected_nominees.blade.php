
    @foreach($nomination_selected as $nomination)

<div class="col-md-4">
<div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">{!! $nomination->name !!} ({{$nomination->no_of_votes}} Votes)</h3>
              <h5 class="widget-user-desc">{!! $nomination->business_name !!}</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="{{asset('images/profile.jpg')}}" alt="User Avatar">
            </div>
            <div class="box-footer">
            <div class="row">
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header">Gender</h5>
                    <span class="description-text">{!! $nomination->gender !!}</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header">Role</h5>
                    <span class="description-text">{{$nomination->role['name']}}</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
        
              </div>
              <!-- /.row -->
                <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="www.facebook.com" target="blank"><b>Linkedin Profile :</b><span class="pull-right badge bg-blue">View</span></a></li>
                <li><a href="#"" ><b>Category Name :</b>  <span class="pull-right">{!! $nomination->category['name'] !!}</span></a></li>
                <li><a href="#"><b>Bio : </b><span class="pull-right">{!! $nomination->bio !!}</span></a></li>
                
                <li><a href="#"><b>Is Won :</b><span class="pull-right">
                @if($nomination->is_won==1)
                   Yes
                   @else
                    No
                    @endif
                 </span></a></li>
                 @if(!isset($checkVotes))
                 <li><a href="{{route('nominations.vote',['category_id'=>$nomination->category_id,'nomination_id'=>$nomination->id])}}" class="btn btn-primary" style="color: white; font-weight: bold;">Vote</a></li>

                 @else
                 <li><button class="btn btn-success btn-block" style="color: white; font-weight: bold;">Voted !</button> </li>
                 @endif
                @if(Auth::user()->role_id < 3) <!-- Start Admin And Moderator roles -->
                <li><a href="#"><b>Reason for nomination :</b><span class="pull-right">{!! $nomination->reason_for_nomination !!}</span></a></li>
                <li><a href="#"><b>Number of nomination :</b><span class="pull-right">{!! $nomination->no_of_nomination !!}</span></a></li>
                <li><a href="#"" ><b>Nominated On :</b>  <span class="pull-right">{!!$nomination->created_at->format('D,M,Y')!!}</span></a></li>
                  <li><a href="#"" target="blank"><b>Is Admin Selected :</b><span class="pull-right">
                 @if($nomination->is_admin_selected == 1)
                   Yes
                   @else
                    No
                 @endif
                </span></a></li>
                @if(Auth::user()->role_id == 1)
                <li><a href="#"><b>Nominated By :</b><span class="pull-right">{!! $nomination->user['name'] !!}</span></a></li>
                @endif

                 @endif<!-- End Admin And Moderator roles -->
              </ul>

            </div>

            </div>
          </div>
       
      </div>






    @endforeach
