<div class="card p-2">
    <h2>Data {{$tabel}}</h2>
    <div class="row my-3">
        <div class="col-md-5 my-1">
            <button class="btn btn-primary" onclick="tambah()">Tambah Data</button>
        </div>
        <form id="cariForm" class="col-md-6 row my-1 mr-5" action="/admin/produk/cetak" method="post">
        {{ csrf_field() }}
            <div class="col-md-3 my-1">
            <input id="tgl" name="tgl" type="number" class="form-control" placeholder="Tgl">
        </div>
        <div class="col-md-4 my-1">
            <input id="bulan" name="bulan" type="number" class="form-control" placeholder="Bulan">
        </div>
        <div class="col-md-4 my-1">
            <input id="thn" name="thn" type="number" class="form-control" placeholder="Thn">
        </div>
        <div class="col-md-1 my-1">
            <button type="submit" class="btn btn-info"><i class="mdi mdi-printer"></i> </button>   
            
        </div>
        </form>
    </div>
    <div id="dataProduk">
        
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="formModal"> 
    <div class="modal-dialog">
      <div class="modal-content bg-primary">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="tutup()" aria-label="Close"><i class="icon-close"></i></button>
        </div>
        <form id="iniForm">
            {{ csrf_field() }}
        <div class="modal-body">
            <input type="hidden" name="id" id="id" >
            <div class="input-group mb-3">
                <input type="text" id="produk" class="form-control" placeholder="Produk" aria-describedby="basic-addon1" name="produk">
              </div>
              
              <div class="input-group mb-3">
                <input type="number" id="price" class="form-control" placeholder="Price" aria-describedby="basic-addon1" name="price">
              </div>
              
              <div class="input-group mb-3">
                <select name="kata" id="kata" class="form-control" >
                <option value="" selected disabled>Silahkan Pilih Katagori</option>
                @foreach ($katagori as $katagori)
                    <option value="{{$katagori->id_kata}}">{{$katagori->katagori}}</option>
                @endforeach
                </select>
              </div>

              <div class="input-group mb-3">
                <textarea  id="description" class="form-control" placeholder="Description"  aria-describedby="basic-addon1" name="description"></textarea>
              </div>

              <div class="input-group mb-3">
                <textarea  id="procedur" class="form-control" placeholder="Procedur"  aria-describedby="basic-addon1" name="procedur"></textarea>
              </div>

              <div class="input-group mb-3">
                <textarea  id="superiority" class="form-control" placeholder="Superiority"  aria-describedby="basic-addon1" name="superiority"></textarea>
              </div>

              <div class="input-group mb-3">
                <textarea  id="deficiency" class="form-control" placeholder="Deficiency"  aria-describedby="basic-addon1" name="deficiency"></textarea>
              </div>
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="tutup()">Close</button>
          <button type="button" id="btnTambah" class="btn btn-success" onclick="tambahuser()"> Save changes</button>
          <button type="button" id="btnUpdate" class="btn btn-warning" onclick="updateuser()"> Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>

<script>
    function tambah() {
        $('#formModal').show(); 
        $('#modalTitle').html('Tambah Data');
        $('#btnUpdate').hide();
        $('#btnTambah').show();
    }

    function tutup() {
        $('#formModal').hide();
        $('#iniForm')[0].reset();
        showData(tgl,bulan,thn);
    }

    function update(id) {
         
        $.ajax({
            url:"/admin/produk/edit/"+id,
            method:"GET",
            dataType : 'JSON',
            success: function(data) {
                    $('#formModal').show(); 
                    $('#modalTitle').html('Edit Data');
                    $('#btnTambah').hide();
                    $('#btnUpdate').show();
                    $('#id').val(data.id_produk);
                    $('#produk').val(data.produk);
                    $('#price').val(data.price);
                    $('#kata').val(data.id_kata);
                    $('#description').val(data.description);
                    $('#procedur').val(data.procedur);
                    $('#superiority').val(data.superiority);
                    $('#deficiency').val(data.deficiency);
                },
                error: function() {
                    iziToast.error({
                        title: 'Failed,',
                        message: 'Unable to display data!',
                        position: 'topRight'
                    });
                }
        })
    }

    function updateuser() {
        $.ajax({
            url: "/admin/produk/update",
            method: "POST",
            data: $('#iniForm').serialize()
        }).then(function (x){
                    x = JSON.parse(x);
                    if(x.status == "Success"){
                        iziToast.success({
                            title: 'Success',
                            message: 'Data Update',
                            position: 'topRight'
                        });
                        tutup();
                    }else{
                        iziToast.error({
                            title: 'Error',
                            message: 'Data Not Update',
                            position: 'topRight'
                        });
                    }
                    
                })
    }
    
    let tgl = '';
    let bulan = '';
    let thn = '';
    showData(tgl,bulan,thn);
    function showData(tgl,bulan,thn){
        $.ajax({
            url:'/admin/produk/data',
            method:'GET',
            data:{
                tgl:tgl,
                bulan:bulan,
                thn:thn
            }
        }).then(function (x) {                   
            console.log(x);
            $('#dataProduk').html(x);    
            })
        }

    $('#tgl').keyup(()=>{
            tgl = $('#tgl').val();
            showData(tgl,bulan,thn);
        }
    )
    $('#thn').keyup(()=>{
            thn = $('#thn').val();
            showData(tgl,bulan,thn);
        }
    )

    $('#bulan').keyup(()=>{
            bulan = $('#bulan').val();
            showData(tgl,bulan,thn);
        }
    )

    function hapus(id){
        swal.fire({
            title: 'Are you sure?',
            text: "To Deleted This Data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url:'/admin/produk/hapus/'+id,
                    method:'GET',
                }).then(function (x){
                    x = JSON.parse(x);
                    if(x.status == "Success"){
                        iziToast.success({
                            title: 'Success',
                            message: 'Data Deleted',
                            position: 'topRight'
                        });
                        showData(tgl,bulan,thn);
                    }else{
                        iziToast.error({
                            title: 'Error',
                            message: 'Data Not Deleted',
                            position: 'topRight'
                        });
                    }
                })
            }
        })
    }


    function tambahuser() {
        $.ajax({
            url: "/admin/produk/store",
            method: "POST",
            data: $('#iniForm').serialize()
        }).then(function(x) {
                x = JSON.parse(x);
                if(x.status == "Success"){
                            iziToast.success({
                                title: 'Success',
                                message: 'Data Tambah',
                                position: 'topRight'
                            });
                            showData(tgl,bulan,thn);
                            tutup();
                        }else{
                            iziToast.error({
                                title: 'Error',
                                message: 'Data Not Tambah',
                                position: 'topRight'
                            });
                        }
            })
    }
</script>
