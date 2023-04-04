<div class="card p-2">
    <h2>Data {{$tabel}}</h2>
    <div class="row my-3">
        <div class="col-md-5 my-1">
            <button class="btn btn-primary" onclick="tambah()">Tambah Data</button>
        </div>
        <form id="cariForm" class="col-md-6 row my-1 mr-5" action="/admin/katagori/cetak" method="post">
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
    <div id="dataKatagori">
        
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="formModal"> 
    <div class="modal-dialog">
      <div class="modal-content bg-primary">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="tutup()" aria-label="Close"><i class="icon-close"></i></button>
        </div>
        <form id="iniform">
            {{ csrf_field() }}
        <div class="modal-body">
            <input type="hidden" name="id" id="id" >
            <div class="input-group mb-3">
                <input type="text" id="katagori" class="form-control" placeholder="Katagori" aria-describedby="basic-addon1" name="katagori">
              </div>
              
              <div class="input-group mb-3">
                <input type="text" id="description" class="form-control" placeholder="Description" aria-describedby="basic-addon1" name="description">
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
        $('#iniform')[0].reset();
        showData(tgl,bulan,thn);
    }

    function update(id) {
        
        $.ajax({
            url:"/admin/katagori/edit/"+id,
            method:"GET",
            dataType : 'JSON',
            success: function(data){
                $('#formModal').show(); 
                $('#modalTitle').html('Edit Data');
                $('#btnTambah').hide();
                $('#btnUpdate').show(); 
                $('#id').val(data.id_kata);
                $('#katagori').val(data.katagori);
                $('#description').val(data.description);
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
            url: "/admin/katagori/update",
            method: "POST",
            data: $('#iniform').serialize()
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
            url:'/admin/katagori/data',
            method:'GET',
            data:{
                tgl:tgl,
                bulan:bulan,
                thn:thn
            }
        }).then(function (x) {                   
            console.log(x);
            $('#dataKatagori').html(x);    
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
                    url:'/admin/katagori/hapus/'+id,
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
            url: "/admin/katagori/store",
            method: "POST",
            data: $('#iniform').serialize()
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
