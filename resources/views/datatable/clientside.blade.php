@extends('layout.main')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" />
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Data User(Client Side)</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('user.create')}}" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Responsive Hover Table</h3>
      
                      {{-- <div class="card-tools">
                        <form action="{{route('index')}}" method="GET">
                          <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{$request->get('search')}}">
        
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>

                        </form>
                      </div> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap" id="clientside">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Fhoto</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td><img src="{{asset('storage/photo-user/'.$d->image)}}" alt="" style="width:5rem; height:5rem"></td>
                              {{-- untuk menjalankan nya harus pake syntak php artisan storage:link --}}
                              <td>{{$d->name}}</td>
                              <td>{{$d->email}}</td>
                              <td>
                                <a href="{{route('user.edit',['id' => $d->id])}}" class="btn btn-primary"><i class="fas fa-pen"></i>Edit</a>
                                <a href="#"  data-toggle="modal" data-target="#modal-hapus{{$d->id}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</a>
                              </td>
                            </tr>
                            <div class="modal fade" id="modal-hapus{{$d->id}}">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Kofirmasi Hapus Data</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Apakah anda yakin ingin menghapus data user <b>{{$d->name}}</b></p>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <form action="{{route('user.delete', ['id' => $d->id])}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Ya, Hapus data</button>
                                    </form>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            
                            @endforeach
                        </tbody>  
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
              <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
  </div>
@endsection
@section('script')
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script>
    $(document).ready( function () {
    $('#clientside').DataTable();
} );
</script>
@endsection