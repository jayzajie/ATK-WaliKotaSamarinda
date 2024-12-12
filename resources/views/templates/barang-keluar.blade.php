<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ATK - Barang Keluar</title>

    <!-- Custom fonts -->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles -->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('img/Logokaltim.png') }}" alt="Logo" class="img-fluid">
                </div>
                <div class="sidebar-brand-text mx-3">Pendataan ATK</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('barang-masuk') }}">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Barang Masuk</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('barang-keluar') }}">
                    <i class="fas fa-fw fa-dolly"></i>
                    <span>Barang Keluar</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('stok-opname') }}">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Stok Opname</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Barang Keluar</h1>
                        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addModal">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Barang Keluar
                        </button>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Barang Keluar</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Tanggal</th>
                                            <th>Satuan</th>
                                            <th>Sisa</th>
                                            <th>Nama Penerima</th>
                                            <th>Sub Bagian</th>
                                            <th>Sub TU</th>
                                            <th>Sub Pegawaian</th>
                                            <th>Sub Perencanaan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($barangKeluar as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->nama_barang }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->satuan }}</td>
                                            <td>{{ $item->sisa }}</td>
                                            <td>{{ $item->nama_penerima }}</td>
                                            <td>{{ $item->sub_bagian }}</td>
                                            <td>{{ $item->sub_tu }}</td>
                                            <td>{{ $item->sub_pegawaian }}</td>
                                            <td>{{ $item->sub_perencanaan }}</td>
                                            <td>
                                                <button class="btn btn-warning btn-sm edit-btn" data-id="{{ $item->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $item->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ATK Biro Adpim 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Barang Keluar</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('barang-keluar.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal" required>
                                </div>
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <input type="text" class="form-control" name="satuan" required>
                                </div>
                                <div class="form-group">
                                    <label>Sisa</label>
                                    <input type="number" class="form-control" name="sisa" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Penerima</label>
                                    <input type="text" class="form-control" name="nama_penerima" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sub Bagian</label>
                                    <input type="text" class="form-control" name="sub_bagian">
                                </div>
                                <div class="form-group">
                                    <label>Sub TU</label>
                                    <input type="text" class="form-control" name="sub_tu">
                                </div>
                                <div class="form-group">
                                    <label>Sub Pegawaian</label>
                                    <input type="text" class="form-control" name="sub_pegawaian">
                                </div>
                                <div class="form-group">
                                    <label>Sub Perencanaan</label>
                                    <input type="text" class="form-control" name="sub_perencanaan">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Barang Keluar</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" id="edit_nama_barang" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal" id="edit_tanggal" required>
                                </div>
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <input type="text" class="form-control" name="satuan" id="edit_satuan" required>
                                </div>
                                <div class="form-group">
                                    <label>Sisa</label>
                                    <input type="number" class="form-control" name="sisa" id="edit_sisa" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Penerima</label>
                                    <input type="text" class="form-control" name="nama_penerima" id="edit_nama_penerima" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sub Bagian</label>
                                    <input type="text" class="form-control" name="sub_bagian" id="edit_sub_bagian">
                                </div>
                                <div class="form-group">
                                    <label>Sub TU</label>
                                    <input type="text" class="form-control" name="sub_tu" id="edit_sub_tu">
                                </div>
                                <div class="form-group">
                                    <label>Sub Pegawaian</label>
                                    <input type="text" class="form-control" name="sub_pegawaian" id="edit_sub_pegawaian">
                                </div>
                                <div class="form-group">
                                    <label>Sub Perencanaan</label>
                                    <input type="text" class="form-control" name="sub_perencanaan" id="edit_sub_perencanaan">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable();

        // Handle Edit Button Click
        $('.edit-btn').click(function() {
            let id = $(this).data('id');
            $('#editForm').attr('action', `/barang-keluar/${id}`);
            
            $.get(`/barang-keluar/${id}`, function(data) {
                $('#edit_nama_barang').val(data.nama_barang);
                $('#edit_tanggal').val(data.tanggal);
                $('#edit_satuan').val(data.satuan);
                $('#edit_sisa').val(data.sisa);
                $('#edit_nama_penerima').val(data.nama_penerima);
                $('#edit_sub_bagian').val(data.sub_bagian);
                $('#edit_sub_tu').val(data.sub_tu);
                $('#edit_sub_pegawaian').val(data.sub_pegawaian);
                $('#edit_sub_perencanaan').val(data.sub_perencanaan);
                $('#editModal').modal('show');
            });
        });

        // Handle Delete Button Click
        $('.delete-btn').click(function() {
            let id = $(this).data('id');
            if(confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    url: `/barang-keluar/${id}`,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function() {
                        location.reload();
                    }
                });
            }
        });
    });

    @if(session('success'))
        alert("{{ session('success') }}");
    @endif
    </script>
</body>
</html>