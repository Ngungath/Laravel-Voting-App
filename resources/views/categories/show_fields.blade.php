
        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

              @if(Auth::user()->role_id == 4 && $isWithinNominationPeriod == 'yes')
              <li class="active"><a href="#nomination" data-toggle="tab" aria-expanded="true">Nomination</a></li>
               @endif

               @if($isWithinVottingPeriod=='yes' || Auth::user()->role_id < 3)
              <li class=""><a href="#nominee" data-toggle="tab" aria-expanded="false">
               @if(Auth::user()->role_id ==4)
               Vote
               @else
              Nominees
              @endif
             </a></li>
             @endif
            </ul>
            <div class="tab-content">
              @if(Auth::user()->role_id == 4 && $isWithinNominationPeriod == 'yes')
              <div class="tab-pane active" id="nomination">
                <!-- Nomination Code -->
                 @if(!isset($hasNominatedBefore) || $hasNominatedBefore ==0)
                <center><h3>Nominate a candidate</h3></center>
                <hr>
                <div class="row">
                  {!! Form::open(['route' => 'nominations.store','enctype'=>'multipart/form-data']) !!}

                        @include('nominations.fields')

                {!! Form::close() !!}
                </div>
                 @else
            <h3>You have already nominated this person</h3>   
            <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">{!! $nomination->name !!}</h3>
              <h5 class="widget-user-desc">{!! $nomination->business_name  !!}</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="{{asset('storage/upload/images/'.$nomination->image)}}" alt="User Avatar">
            </div>
            <div class="box-footer">
            <div class="row">
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header">Gender</h5>
                    <span class="description-text">MALE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header">Nominations</h5>
                    <span class="description-text">{{$nomination->no_of_nomination}}</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
        
              </div>
              <!-- /.row -->
                <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#"><b>Nomination Reason :</b> <span class="pull-right">{!! $nomination->reason_for_nomination !!}</span></a></li>
                <li><a href="#"><b> Nominated at : </b><span class="pull-right">{!!$nomination->created_at->format('D,M,Y')!!}</span></a></li>
                <li><a href="#"><b> Bussiness Name : </b><span class="pull-right">{!!$nomination->business_name !!}</span></a></li>
                <li><a href="#"><b> Bio : </b><span class="pull-right">{!!$nomination->bio !!}</span></a></li>
                 <li><a href="#"><b> Is Admin Selected : </b>
                  @if($nomination->is_admin_selected == 1)
                  <span class="pull-right">Yes</span>
                  @else
                  <span class="pull-right">Not Selected</span>
                  @endif
                  </a></li>
              </ul>
            </div>

            </div>
          </div>
    
  @endif


                <!-- End Nomination  -->

              </div>

              @endif

<!--Only admin and a voter can see this if it is within the voting period -->
          @if($isWithinVottingPeriod=='yes' || Auth::user()->role_id < 3)
              <div class="tab-pane
                @if(Auth::user()->role_id != 4 || $isWithinVottingPeriod=='yes')
                active
                @endif
              " id="nominee">

                  <h3>Selected Nominees</h3>
                  @if(isset($nomination_selected))
                    <div class="box box-primary">
                      <div class="box-body">
                        @include('nominations.selected_nominees')
                      </div>
                  </div>
                  @else
                  <p>Nominees to be voted have not been selected</p>
                  @endif

               @if(Auth::user()->role_id < 3)
              <!--  All Nominess -->
               <h3>All Nominees</h3>
                    <div class="box box-primary">
                      <div class="box-body">
                        @include('nominations.table')
                      </div>
                  </div>
                @endif
               
              </div>
              @endif
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->

    

