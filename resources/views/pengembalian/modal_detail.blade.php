<div class="modal fade" id="showdetail">
         <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail barang peminjaman</h4>
              </div>
              <div class="modal-body">
              <div class="box-body table-responsive">
        <table id="example" class="table table-responsive table-striped">
        <thead>
            <tr>
                <th>no peminjaman</th>
                <th>id_barang</th>
                <th>nama barang</th>
                <th>jumlah barang yang dipinjam</th>
                <th>satuan</th>
            </tr>
        </thead>
        <tbody>
            @php
  $i=1;
@endphp
      @foreach($detailpeminjaman as $data)
          <tr>
              <td style="vertical-align: middle;text-align: center">{{$data->no_peminjaman}}</td>
              <td style="vertical-align: middle">{{ $data->nama_barang }}</td>
              <td style="vertical-align: middle">{{ $data->quantity}}</td>
              <td style="vertical-align: middle">
              {{ $data->satuan}}
              </td>
              @endforeach
          </tr>                                         
        </tbody>
    </table>
        </div>
              </div>
              <div class="modal-footer">
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
     </div>
        <!-- /.modal -->