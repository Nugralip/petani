<div class="card p-2">
    <h2>Data {{$tabel}}</h2>
        <form id="cariForm" class="col-md-6 row my-1 mr-5" action="/admin/berita/cetak" method="post">
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
                <button type="submit" class="btn btn-info mdi mdi-printer"></button>   
                
            </div>
        </form>
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
        <form id="iniForm" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="modal-body">
             <input type="hidden" name="id" id="id" >
            {{--<div class="input-group mb-3">
                <input type="file" id="picture" class="form-control" name="picture">
              </div>
              
              <div class="input-group mb-3">
                <input type="text" id="title" class="form-control" placeholder="Title" aria-describedby="basic-addon1" name="title">
              </div>
              

              <div class="input-group mb-3">
                <textarea  id="isi" class="form-control" placeholder="Isi"  aria-describedby="basic-addon1" name="isi"></textarea>
              </div> --}}

              <div class="input-group mb-3">
                    <select class="form-control" name="status" id="status">
                        <option value=" " selected disabled>Pilih Status</option>
                        <option value="public">Public</option>
                        <option value="hidden">Hidden</option>
                    </select>
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
            url:"/admin/berita/edit/"+id,
            method:"GET",
            dataType : 'JSON',
            success: function(data) {
                    $('#formModal').show(); 
                    $('#modalTitle').html('Edit Data');
                    $('#btnTambah').hide();
                    $('#btnUpdate').show();
                    $('#id').val(data.id_berita);
                    $('#status').val(data.status);
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
            url: "/admin/berita/update",
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
            url:'/admin/berita/data',
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
        Swal.fire({
            title: 'Are you sure?',
            text: "To Delete This User!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url:'/admin/berita/hapus/'+id,
                    method:'GET',
                }).then(function (x){
                    x = JSON.parse(x);
                    if(x.status == "Success"){
                        iziToast.success({
                            title: 'Success',
                            message: 'Data Deleted',
                            position: 'topRight'
                        });
                        showData(search,filter);
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
            url: "/admin/berita/store",
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
                            showData(search,filter);
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
