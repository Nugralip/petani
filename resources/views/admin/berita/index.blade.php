<div class="card p-2">
    <h2>Data {{$tabel}}</h2>
    <div class="row my-3">
        {{-- <div class="col-md-6 my-1">
            <button class="btn btn-primary" onclick="tambah()">Tambah Data</button>
        </div> --}}
        <div class="col-md-3 my-1">
            <input id="search" type="text" class="form-control" placeholder="Search">
        </div>
        <div class="col-md-2 my-1">
            <select name="" id="" class="form-control">
                <option value=" "> Select Option </option>
            </select>
        </div>
        <div class="col-md-1 my-1">
            <a href="produk/cetak" onclick="confirm('Apakah Kamu Ingin Mencetak Laporan Produk?')" class="btn btn-info"><i class="mdi mdi-printer"></i></a>
            
        </div>
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
        showData(search,filter);
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
    
    let search = '';
    let filter = '';
    showData(search,filter);
    function showData(search,filter){
        $.ajax({
            url:'/admin/berita/data',
            method:'GET',
            data:{
                search:search,
                filter:filter
            }
        }).then(function (x) {                   
            console.log(x);
            $('#dataProduk').html(x);    
            })
        }

    $('#search').keyup(()=>{
            search = $('#search').val();
            showData(search,filter);
        }
    )
    $('#kata').change(()=>{
            filter = $('#kata').val();
            showData(search,filter);
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
