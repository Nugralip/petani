<div class="card p-2">
    <h2>Data {{$tabel}}</h2>
    <div class="row my-3">
        <div class="col-md-5 my-1">
            <button class="btn btn-primary" onclick="tambah()">Tambah Data</button>
        </div>
        <form id="cariForm" class="col-md-6 row my-1 mr-5" action="/admin/tanah/cetak" method="post">
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
    <div id="dataTanah">
        
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
        <div class="modal-body">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" id="id" >
              <div class="input-group mb-3">
                <input type="text" id="tanah" class="form-control" placeholder="Tanah" aria-describedby="basic-addon1" name="tanah">
              </div>
              <div class="input-group mb-3">
                <input type="file" id="image" class="form-control" placeholder="Picture" aria-describedby="basic-addon1" name="image">
              </div>
              
              <div class="input-group mb-3">
                <input type="text" id="texture" class="form-control" placeholder="Texture" aria-describedby="basic-addon1" name="texture">
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
                <textarea  id="recomendation" class="form-control" placeholder="recomendation"  aria-describedby="basic-addon1" name="recomendation"></textarea>
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
            url:"/admin/tanah/edit/"+id,
            method:"GET",
            typeData : 'JSON',
            success: function(data){
                $('#formModal').show(); 
                $('#modalTitle').html('Edit Data');
                $('#btnTambah').hide();
                $('#btnUpdate').show(); 
                $('#id').val(data.id_tanah);
                $('#tanah').val(data.tanah);
                $('#texture').val(data.texture);
                $('#description').val(data.description);
                $('#procedur').val(data.procedur);
                $('#superiority').val(data.superiority);
                $('#recomendation').val(data.recomendation);
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
        let formData = new FormData(iniForm);
        formData.append('image', image);
        $.ajax({
            url: "/admin/tanah/update",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
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
            url:'/admin/tanah/data',
            method:'GET',
            data:{
                tgl:tgl,
                bulan:bulan,
                thn:thn
            }
        }).then(function (x) {                   
            console.log(x);
            $('#dataTanah').html(x);    
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
                    url:'/admin/tanah/hapus/'+id,
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
        let formData = new FormData(iniForm);
        formData.append('image', image);
        $.ajax({
            url: "/admin/tanah/store",
            type: "POST",
            data: formData,
            processData:false,
            contentType: false,
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
