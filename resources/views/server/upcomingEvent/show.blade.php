@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
       <!-- Content Header (Page header) -->
       <section class="content-header">
              <div class="container-fluid">
                     <div class="col-md-12">
                            <x-alerts.success />
                     </div>
                     <div class="mb-2 row">
                            <div class="col-sm-6">
                                   <h1>Upcoming Event Details</h1>
                            </div>
                            <div class="col-sm-6">
                                   <ol class="breadcrumb float-sm-right">
                                          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                          <li class="breadcrumb-item active">Details</li>
                                   </ol>
                            </div>
                     </div>
              </div><!-- /.container-fluid -->
       </section>

       <!-- Main content -->
       <section class="content">
              <div class="container-fluid">
                     <div class="row">
                            <!-- /.col -->
                            <div class="col-md-12">
                                   <div class="card card-primary card-outline">
                                          <div class="card-header">
                                                 <h3 class="card-title"><a href="{{route('upcomingevents')}}" class="btn btn-success">Upcoming Event Posts</a></h3>
                                                 <div class="card-tools">
                                                        <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
                                                        <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
                                                 </div>
                                          </div>
                                          <!-- /.card-header -->
                                          <div class="p-0 card-body">
                                                 <div class="mailbox-read-info">
                                                        <h5>Upcoming Event Title : {{ $upcomingevent->title}}</h5>
                                                        <h6>written on: {{ $upcomingevent->created_at}}
                                                    <span class="float-right mailbox-read-time">{{ $upcomingevent->created_at->diffForHumans() }}</span></h6>
                                                 </div>
                                                 <h5>Picture:</h5> <img class="profile-user-img img-fluid img-circle"  src="{{asset('storage/uploads/'.$upcomingevent->passport) }}" alt="" >
                                                 <td></td>
                                                 <tr>
                                                 <div class="p-4 mailbox-read-post">
                                                        <p class="text-justify">
                                                               {!! $upcomingevent->post !!}
                                                        </p>
                                                 </div>
                                                 <!-- /.mailbox-read-post -->
                                          </div>
                                          <!-- /.card-body -->
                                          <!-- /.card-footer -->
                                          <div class="card-footer">
                                                 <div class="float-right">
                                                        <a href="" type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModalLong"><i class="fas fa-edit"></i> Edit Upcoming Event</a>
                                                 </div>
                                                 <form action="{{ route('upcomingevents-destroy', $upcomingevent->id) }}" method="POST">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <a title="Delete upcomingEvent" onclick="return confirm('Are you sure you want to delete this...?')" href="#" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</a>
                                                 </form>
                                          </div>
                                          <!-- /.card-footer -->
                                   </div>
                                   <!-- /.card -->
                            </div>
                            <!-- /.col -->
                     </div>
                     <!-- /.row -->
       </section>
       <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div>


       <div class="modal" id="exampleModalLong" style="background: rgba(0,0,0,0.5);" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                     <div class="modal-content">
                            <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLongTitle">Edit UpcomingEvent</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                   </button>
                            </div>
                            <div class="modal-body">
                                   <x-alerts.success />
                                   <form method="post" action="{{ route('upcomingevent-update', $upcomingevent->id) }}">
                                          @csrf
                                          {{ method_field('PATCH') }}
                                          <div class="mb-3">
                                                 <label for="title">Title</label>
                                                 <input type="text" name="title" value="{{ $upcomingevent->title }}" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Event title">
                                                 @error('title')
                                                 <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                 </span>
                                                 @enderror
                                          </div>
 <div class="mb-3">
                                                        <label for="exampleInputEmail1">Image</label>
                                                        <div class="custom-file">
                                                               <input type="file" class="custom-file-input @error('passport') is-invalid @enderror" id="exampleInputFile" name="passport">
                                                               <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                               @error('passport')
                                                               <span class="invalid-feedback" role="alert">
                                                                      <strong>{{ $message }}</strong>
                                                               </span>
                                                               @enderror
                                                        </div>
                                                 </div>

                                          <div class="mb-3">
                                                 <label for="title">Body</label>
                                                 <textarea name="post" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $upcomingevent->post }}</textarea>
                                                 @error('post')
                                                 <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                 </span>
                                                 @enderror
                                          </div>
                                          <div class="modal-footer">
                                                 <button type="submit" class="btn btn-secondary">
                                                        Submit
                                                 </button>
                                          </div>
                                   </form>
                            </div>
                     </div>
              </div>
       </div>
</div>

@endsection

