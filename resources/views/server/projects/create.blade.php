@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
       <!-- Content Header (Page header) -->
       <section class="content-header">
              <div class="container-fluid">
                     <div class="mb-2 row">
                            <div class="col-sm-6">
                                   <h1>Create project</h1>
                            </div>
                            <div class="col-sm-6">
                                   <ol class="breadcrumb float-sm-right">
                                          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                          <li class="breadcrumb-item active">project</li>
                                   </ol>
                            </div>
                     </div>
              </div><!-- /.container-fluid -->
       </section>
       <!-- Main content -->
       <section class="content">
              <div class="row">
                     <div class="col-md-12">
                            <div class="card card-outline card-info">
                                   <div class="card-header">
                                          <h3 class="card-title">
                                                 <a href="{{route('projects')}}" class="btn btn-success">projects</a>
                                          </h3>
                                          <!-- tools box -->
                                          <div class="card-tools">
                                                 <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                        <i class="fas fa-minus"></i></button>
                                                 <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                                        <i class="fas fa-times"></i></button>
                                          </div>
                                          <!-- /. tools -->
                                   </div>
                                   <!-- /.card-header -->
                                   <div class="card-body pad">
                                          <x-alerts.success />
                                          <form action="{{ route('project-create') }}" method="post" enctype="multipart/form-data">
                                                 @csrf
                                                 <div class="mb-3">
                                                        <label for="exampleInputEmail1">Title</label>
                                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter project title">
                                                        @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                               <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                 </div>
                                                 <div class="mb-3">
                                                        <label for="exampleInputEmail1">Banner Image</label>
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
                                                        <label for="exampleInputEmail1">Body</label>
                                                        <textarea name="post" class="textarea @error('post') is-invalid @enderror" placeholder="Enter project body" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                        @error('post')
                                                        <span class="invalid-feedback" role="alert">
                                                               <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                 </div>
                                                 <p class="mb-0 text-sm">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                 </p>
                                          </form>
                                   </div>
                            </div>
                     </div>
                     <!-- /.col-->
              </div>
              <!-- ./row -->
       </section>
       <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
