<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Desea Terminar la sesi&oacute;n ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Presione "Logout" si desea finalizar la sesi&oacute;n actual.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿ Desea eliminar el registro ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Seleccione "Eliminar" para borrar el registro permanentemente.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary" onclick="document.getElementById('deleteForm_' + formId).submit();">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Custom Block Modal-->
<div class="modal fade" id="addCustomBlockModal" tabindex="-1" role="dialog" aria-labelledby="addCustomBlockLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCustomBlockLabel">Agregar Bloque</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="custom_block_modal_item" data-type="1" data-toggle="tooltip" data-placement="right" title="Texto">
                    <i class="fas fa-align-justify"></i>
                </div>

                <div class="custom_block_modal_item" data-type="2" data-toggle="tooltip" data-placement="right" title="Imagen">                 
                    <i class="far fa-image"></i>           
                </div>

                <div class="custom_block_modal_item" data-type="3" data-toggle="tooltip" data-placement="right" title="Video">       
                    <i class="fas fa-video"></i>       
                </div>

                <div class="custom_block_modal_item" data-type="4" data-toggle="tooltip" data-placement="right" title="Texto > Imagen">
                    <i class="fas fa-align-justify"></i><span class="divider"></span><i class="far fa-image"></i> 
                </div>

                <div class="custom_block_modal_item" data-type="5" data-toggle="tooltip" data-placement="right" title="Imagen > Texto">
                    <i class="far fa-image"></i><span class="divider"></span><i class="fas fa-align-justify"></i>
                </div>

                <div class="custom_block_modal_item" data-type="6" data-toggle="tooltip" data-placement="right" title="Texto > Video">
                    <i class="fas fa-align-justify"></i><span class="divider"></span><i class="fas fa-video"></i> 
                </div>

                <div class="custom_block_modal_item" data-type="7" data-toggle="tooltip" data-placement="right" title="Video > Texto">
                    <i class="fas fa-video"></i><span class="divider"></span><i class="fas fa-align-justify"></i>
                </div>

                <div class="custom_block_modal_item" data-type="8" data-toggle="tooltip" data-placement="right" title="Imagen > Video">
                    <i class="far fa-image"></i><span class="divider"></span><i class="fas fa-video"></i> 
                </div>

                <div class="custom_block_modal_item" data-type="9" data-toggle="tooltip" data-placement="right" title="Video > Imagen">
                    <i class="fas fa-video"></i><span class="divider"></span><i class="far fa-image"></i>
                </div>

                <div class="custom_block_modal_item" data-type="10" data-toggle="tooltip" data-placement="right" title="Imagen > Imagen">
                    <i class="far fa-image"></i><span class="divider"></span><i class="far fa-image"></i> 
                </div>

                <div class="custom_block_modal_item" data-type="11" data-toggle="tooltip" data-placement="right" title="Video > Video">
                    <i class="fas fa-video"></i><span class="divider"></span><i class="fas fa-video"></i>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal-->
<div class="modal fade" id="deleteBlockModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿ Desea eliminar el bloque ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Seleccione "Eliminar" para borrar el bloque permanentemente.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary" onclick="deleteCustomBlock(delBlockButtonId);">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<!-- Article Visible Modal-->
<div class="modal fade" id="articleVisibleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Acción no permitida</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">El artículo debe poseer pastilla y preview.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>