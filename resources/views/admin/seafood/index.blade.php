@extends('layouts.app-master')

@section('title')
Kelola Seafood
@endsection


@section('content')

<!-- Page-header start --> 

@if (session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
<section class="section">
  <div class="row">
   <div class="col-lg-12  ">
    <div class="card card-statistic-2">


      <div class="card-wrap">
        <div class="card-header">
          <div class="section-title mt-0 mb-0">Data Ikan</div>
          <button data-toggle="modal" data-target="#modalCreate" class="btn btn-success fas fa-plus fa-2x"
          title="Tambahkan disini" style="margin-left: auto;"></button>

        </div>
      </div>
      <div class="card-body">
        <div class="card-body table-responsive">
          <table id="dataTable" class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis Ikan</th>
                <th scope="col">harga Jual</th>
              </tr>
            </thead>
            <tbody>
              @php $no=1 @endphp
              @foreach ($data as $data)
              <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $data->jenis_ikan }}</td>
                <td>Rp. <?=number_format($data->harga_jual, 0, ".", ".")?>,00</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section>


<div class="modal fade" tabindex="-1" role="dialog" id="modalCreate">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambahkan Ikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate="" action="{{ route('admin-kelola_seafood_add') }}"
                            method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                    
                            <div class="form-group">
                                <label for="jenis_ikan">Jenis Ikan</label>
                                <div class="input-group">
                                    <input name="jenis_ikan" type="text" class="form-control" placeholder="jenis_ikan" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="harga_jual">Harga Jual</label>
                                <div class="input-group">
                                    <input name="harga_jual" type="text" class="form-control" placeholder="harga_jual" required>
                                </div>
                            </div>
        
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Tambah</button>
                                <button type="button" class="btn btn-secondary float-right"
                                    data-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection