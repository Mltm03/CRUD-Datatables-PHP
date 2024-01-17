<?php echo $this->extend('plantilla/sidebar');?>
<?php echo $this->section('contenido');?>

<div class="container my-5">
    <div class="row">
            <div class="col-md-12 mt-2">
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Añadir nuevo 
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir nuevo registro</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- formulario modal de añadir  -->
                    <div class="modal-body">
                        <!-- maquetar formulario  -->
                        <form action="<?php echo base_url()?>/crear" method="post">
                            <div class= "form-group">
                                <label for="" >ID</label>
                                <input  type="text" name="ID_comparable" id="id" class="form-control" required>
                            </div>
                            <div class= "form-group">
                                <label for="" >Clave</label>
                                <input  type="text" name="Clave_comparable" id="clave" class="form-control" required>
                            </div>
                            <div class= "form-group">
                                <label for="">Fecha</label>
                                <input  type="date" name="fecha" id="fecha" class="form-control" required> 
                            </div>
                            <div class= "form-group">
                                <label for="">Vigencia</label>
                                <input type="text" name="Vigencia" id="vigencia" class="form-control" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" id="add">Añadir</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
    </div>
    <div clas="row">
    <div class="col-md-12 mt-4">
        <table id="example" class="table table-striped" style="width:100%">
        
            <thead>
                <tr task-id= 'id'>
                    <th class="id">ID</th>
                    <th>Clave</th>
                    <th>Fecha</th>
                    <th>Vigencia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Clave</th>
                    <th>Fecha</th>
                    <th>Vigencia</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        </div>


    </div>
</div>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- script--Datatables -->
    <script src="public/plugins/JSZip-3.10.1/jszip.min.js"></script>
    <script src="public/plugins/pdfmake-0.2.7/pdfmake.min.js"></script>
    <script src="public/plugins/pdfmake-0.2.7/vfs_fonts.js"></script>
    <script src="public/plugins/DataTables-1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="public/plugins/DataTables-1.13.8/js/dataTables.bootstrap5.min.js"></script>
    <script src="public/plugins/Buttons-2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="public/plugins/Buttons-2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="public/plugins/Buttons-2.4.2/js/buttons.colVis.min.js"></script>
    <script src="public/plugins/Buttons-2.4.2/js/buttons.html5.min.js"></script>
    <script src="public/plugins/Buttons-2.4.2/js/buttons.print.min.js"></script>
    <!-- bootstrap5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
       
           var table= $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                            {
                                extend:"excelHtml5",
                                text:"<i class='fa-regular fa-file-excel'></i>",
                                titleAttr:"Exportar a Excel",
                                class:'btn btn-succes',
                            },
                            {
                                extend:"pdfHtml5",
                                text:"<i class='fa-solid fa-file-pdf'></i>",
                                titleAttr:"Exportar a PDF",
                                class:'btn btn-danger'
                            },
                            {
                            extend: 'pageLength',    
                            },  
                    ],
                ajax: {
                    url: '<?php echo base_url()?>/list',
                    type: 'POST'
                },
                columns: [
                    { data: 'id' },
                    { data: 'clave' },
                    { data: 'fecha_captura' },
                    { data: 'vigencia' },
                    {defaultContent:"<a type='button' href='<?=base_url()?>/' id='Editar' tittle='Editar' class='Editar btn btn-primary' onClick='edit_data()'><i  class='fa-solid fa-pencil'></i></a>   <a type='button' tittle='Eliminar' class='Eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar'><i class='fa-solid fa-trash'></i></a>"}
                    
                ],
            } );
            
 
       
    
        edit_data=function(){
            console.log("hola")
        }

        $(document).on('click', '.Eliminar', function(){
            let data=$(this)[0].parentElement.parentElement;
            let td= data.getElementsByTagName("td")
            let id =parseInt(td[0].innerHTML)
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                if (result.isConfirmed) {
            
                    $.post('<?php echo base_url()?>/delete', {
                        id
                    })
                    .done(function(res){
                        if (data['estado'] == 'error') {
                            console.log('error', data['salida']);
                            } else {
                            console.log('exito', data['salida']);
                            table.ajax.reload();
                                }
                            })
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                                });
                            }
                        });
                    
                })
        


    </script>
<?php echo $this->endSection();?>
</body>
</html>