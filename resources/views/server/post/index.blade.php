@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
       <!-- Content Header (Page header) -->
       <section class="content-header">
              <div class="container-fluid">
                     <div class="mb-2 row">
                            <div class="col-sm-6">
                                   <h1>Blog Post and Events</h1>
                            </div>
                            <div class="col-sm-6">
                                   <ol class="breadcrumb float-sm-right">
                                          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                          <li class="breadcrumb-item active">Blogs</li>
                                   </ol>
                            </div>
                     </div>
              </div><!-- /.container-fluid -->
       </section>

       <!-- Main content -->
       <section class="content">
              <div class="container-fluid">
                     <div class="row">
                            <div class="col-12">
                                   <div class="card">
                                          <div class="card-header">
                                                 <h3 class="card-title"><a href="{{route('post')}}" class="btn btn-success">Create</a></h3>
                                          </div>
                                          <!-- /.card-header -->
                                          <div class="container">
                                                 <x-alerts.success />
                                          </div>
                                          <div class="card-body">
                                                 <table id="example2" class="table table-bordered table-hover">
                                                        <thead>
                                                               <tr>
                                                                      <th>No..</th>
                                                                      <th>Image</th>
                                                                      <th>Title</th>
                                                                      <th>Date</th>
                                                                      <th>Action</th>
                                                               </tr>
                                                        </thead>
                                                        <tbody>
                                                               @php
                                                               $i = 1;
                                                               @endphp
                                                               @foreach($posts as $post)
                                                               <tr>
                                                                      <td>{{ $i++ }}</td>
                                                                      <td><img class="profile-user-img img-fluid img-circle"  src="{{asset('/'.$post->banner_image) }}" alt="" ></td>
                                                                      <td>{{ $post->title }}</td>
                                                                      <td>{{ $post->created_at->diffForHumans() }}</td>
                                                                      <td>
                                                                             <div class="btn-group">
                                                                                    <form action="{{ route('post-destroy', $post->id) }}" method="POST">
                                                                                           @csrf
                                                                                           {{ method_field('DELETE') }}
                                                                                           <a class="btn btn-primary" title="Respond to post" href="{{ route('post-show', $post->id) }}"><i class="fa fa-eye"></i></a>
                                                                                           <button title="Delete post" onclick="return confirm('Are you sure you want to delete this...?')" class="btn btn-danger" href="#"><i class="fa fa-trash"></i></button>
                                                                                    </form>
                                                                             </div>
                                                                      </td>
                                                               </tr>
                                                               @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                               <tr>
                                                                      <th>No..</th>
                                                                      <th>Image</th>
                                                                      <th>Title</th>
                                                                      <th>Date</th>
                                                                      <th>Action</th>
                                                               </tr>
                                                        </tfoot>
                                                 </table>
                                                 {{ $posts->links() }}
                                          </div>
                                          <!-- /.card-body -->
                                   </div>
                                   <!-- /.card -->
                            </div>
                            <!-- /.col -->
                     </div>
                     <!-- /.row -->
              </div>
              <!-- /.container-fluid -->
       </section>
       <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
