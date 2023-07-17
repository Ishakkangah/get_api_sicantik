<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Data</title>

    <!-- Fonts -->

    <!-- Fonts -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">


    <style>
        #myTable_length {
            margin-bottom: 20px;
        }


        @media screen and (max-width: 600px) {
            #myTable_filter {
                margin: 20px 0;
            }
        }
    </style>
</head>

<body class="antialiased">
    <div class="container py-5">
        @if ($json->success === true)
        <div class="card my-3 p-3">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered table-striped table-hover displa" id="myTable">
                    <thead class="bg-success text-white">
                        <tr>
                            <th class="text-nowrap align-middle">#</th>
                            <th class="text-nowrap align-middle">Nama</th>
                            <th class="text-nowrap align-middle text-center">No. Identitas</th>
                            <th class="text-nowrap align-middle">No. Permohonan</th>
                            <th class="text-nowrap align-middle">Perkerjaan</th>
                            <th class="text-nowrap align-middle">Tanggal Lahir</th>
                            <th class="text-nowrap align-middle text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $d )
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $d->nama }}</td>
                            <td class="text-nowrap align-middle text-uppercase text-center">{{ $d->no_identitas }}</td>
                            <td class="text-nowrap align-middle text-uppercase">{{ $d->no_permohonan }}</td>
                            <td class="text-nowrap align-middle text-uppercase">{{ $d->pekerjaan }}</td>
                            <td class="text-nowrap align-middle text-uppercase text-center">{{ date('d-m-Y', strtotime($d->tgl_lahir)) }}</td>
                            <td class="text-nowrap align-middle text-uppercase text-center">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $d->no_identitas }}">
                                    Detail
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $d->no_identitas }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-hover table-striped">
                                                    <tbody>
                                                        <tr class="text-start align-middle">
                                                            <td class="text-wrap">Nomor Identitas </td>
                                                            <td class=" text-wrap">: {{ $d->nama }}</td>
                                                        </tr>
                                                        <tr class="text-start align-middle">
                                                            <td class="text-wrap">Nama </td>
                                                            <td>: {{ $d->no_identitas }}</td>
                                                        </tr>
                                                        <tr class=" text-start align-middle">
                                                            <td class="text-wrap">Alamat </td>
                                                            <td class="text-wrap">: {{ $d->alamat }}</td>
                                                        </tr>
                                                        <tr class=" text-start align-middle">
                                                            <td class="text-wrap">Nomor Permohonan </td>
                                                            <td class="text-wrap">: {{ $d->no_permohonan }}</td>
                                                        </tr>
                                                        <tr class="text-start align-middle">
                                                            <td class="text-wrap">Pekerjaan </td>
                                                            <td class="text-wrap">: {{ $d->pekerjaan }}</td>
                                                        </tr>
                                                        <tr class="text-start align-middle">
                                                            <td class="text-wrap">Short Desc </td>
                                                            <td class="text-wrap">: {{ $d->short_desc }}</td>
                                                        </tr>
                                                        <tr class="text-start align-middle">
                                                            <td class="text-wrap">Tanggal Lahir </td>
                                                            <td class="text-wrap">: {{ date('d-m-Y', strtotime($d->tgl_lahir)) }}</td>
                                                        </tr>
                                                        <tr class="text-start align-middle">
                                                            <td class="text-wrap">tgl_pengajuan </td>
                                                            <td class="text-wrap">: {{ $d->no_identitas }}</td>
                                                        </tr>
                                                        <tr class="text-start align-middle">
                                                            <td class="text-wrap">Tipe Pemohon </td>
                                                            <td class="text-wrap">: {{ $d->tipe_pemohon }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger" role="alert">
                            Tidak ada data.
                        </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div class="alert alert-danger" role="alert">
            Gagal load data , Mohon coba beberapa saat
        </div>
        @endif
    </div>

    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>


</html>