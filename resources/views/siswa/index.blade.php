<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('siswa.create') }}" class="btn btn-md btn-primary mb-3">+ Tambah Siswa</a>
                        <table class="table table-bordered">
                            <thead  class="text-center">
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">NISN</th>
                                <th scope="col">NIS</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No Telpon</th>
                                <th scope="col">ID SPP</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($siswas as $siswa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $siswa->nisn }}</td>
                                    <td>{{ $siswa->nis }}</td>
                                    <td>{{ $siswa->nama_siswa }}</td>
                                    <td>{{ $siswa->id_kelas }}</td>
                                    <td>{{ $siswa->alamat }}</td>
                                    <td>{{ $siswa->no_tlp }}</td>
                                    <td>{{ $siswa->id_spp }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                                            <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-success">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Siswa belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>